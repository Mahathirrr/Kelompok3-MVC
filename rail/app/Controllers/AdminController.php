<?php

namespace Controllers;

use Models\Admin;
use Models\Category;
use Models\Passes;
use PDO;

class AdminController
{
    private $admin, $category, $passes;
    public function __construct()
    {
        session_start();
        $this->admin = new Admin();
        $this->category = new Category();
        $this->passes = new Passes();
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $rs = $this->admin->doLogin($_POST['username'], $_POST['password']);
            $results = $rs['results'];
            $query = $rs['query'];

            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                    $_SESSION['bpmsaid'] = $result->ID;
                }

                if (!empty($_POST["remember"])) {
                    //COOKIES for username
                    setcookie("user_login", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
                    //COOKIES for password
                    setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    if (isset($_COOKIE["user_login"])) {
                        setcookie("user_login", "");
                        if (isset($_COOKIE["userpassword"])) {
                            setcookie("userpassword", "");
                        }
                    }
                }
                $_SESSION['login'] = $_POST['username'];
                echo "<script type='text/javascript'> document.location ='index.php?act=dashboard'; </script>";
            } else {
                echo "<script>alert('Invalid Details');</script>";
            }
        }
        require_once 'app/Views/admin/index.php';
    }


    public function dashboard()
    {
        $menu = $this->admin->menu();
        $totalcat = $this->category->getCountCategory();
        $totalpass = $this->passes->getCountPass();
        $today_pass = $this->passes->toDayPass();
        $yes_pass = $this->passes->yesPass();
        $seven_pass = $this->passes->sevenPass();
        $totalunreadquery = $this->admin->CountUnread();
        $totalreadquery = $this->admin->CountRead();
        require_once 'app/Views/admin/dashboard.php';
    }

    function add_category()
    {
        $menu = $this->admin->menu();
        $this->category->storeCategory();
        require_once 'app/Views/admin/add_category.php';
    }

    function manage_category()
    {
        $menu = $this->admin->menu();
        $this->category->deleteCategory();
        $rs = $this->category->getCategoty();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/manage_category.php';
    }

    function edit_category_detail()
    {
        $menu = $this->admin->menu();
        $this->category->editCategory();
        $rs = $this->category->getCategotyByID();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/edit_category_detail.php';
    }


    function add_pass()
    {
        $menu = $this->admin->menu();
        $this->passes->storePass();
        $result2 = $this->category->getCategory();
        require_once 'app/Views/admin/add_pass.php';
    }

    function manage_pass()
    {
        $menu = $this->admin->menu();
        $this->category->deleteCategory();
        $rs = $this->passes->getPass();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/manage_pass.php';
    }

    function view_pass_detail()
    {
        $menu = $this->admin->menu();;
        $rs = $this->passes->getPassByID();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/view_pass_detail.php';
    }


    function edit_pass_detail()
    {
        $menu = $this->admin->menu();
        $this->passes->editPass();
        $rs = $this->passes->getPassByID();
        $results = $rs['results'];
        $query = $rs['query'];
        $result2 = $this->category->getCategory();
        require_once 'app/Views/admin/edit_pass_detail.php';
    }


    function changeimage()
    {
        $menu = $this->admin->menu();
        $rs = $this->passes->getPassByID();
        $results = $rs['results'];
        $query = $rs['query'];
        $this->passes->updateImage();
        require_once 'app/Views/admin/changeimage.php';
    }


    function edit_contact_us()
    {
        $menu = $this->admin->menu();
        $this->admin->editContact();
        $rs = $this->admin->getContact();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/contactus.php';
    }


    function edit_about_us()
    {
        $menu = $this->admin->menu();
        $this->admin->editAbout();
        $rs = $this->admin->getAbout();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/aboutus.php';
    }


    
    function readenq()
    {
        $menu = $this->admin->menu();
        $rs = $this->admin->getReadMsg();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/readenq.php';
    }

    function unreadenq()
    {
        $menu = $this->admin->menu();
        $rs = $this->admin->getUnReadMsg();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/unreadenq.php';
    }


    function view_enquiry()
    {
        $menu = $this->admin->menu();
        $rs = $this->admin->getMsgByID();
        $results = $rs['results'];
        $query = $rs['query'];
        $this->admin->updateMsg();
        require_once 'app/Views/admin/view_enquiry.php';
    }

    function search_pass()
    {
        $menu = $this->admin->menu();
        $rs = $this->admin->searchPass();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/search_pass.php';
    }

    function pass_bwdates_report()
    {
        $menu = $this->admin->menu();
      
        require_once 'app/Views/admin/pass_bwdates_report.php';
    }

    function pass_bwdates_reports_details()
    {
        $menu = $this->admin->menu();
        $rs = $this->passes->getPassDate();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/pass_bwdates_reports_details.php';
    }


    function admin_profile()
    {
        $menu = $this->admin->menu();
        $this->admin->updateProfile();
        $rs = $this->admin->getUserByID();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/admin/admin_profile.php';
    }


    function change_password()
    {
        $menu = $this->admin->menu();
        $this->admin->updatePassword();
        require_once 'app/Views/admin/change_password.php';
    }
    

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location:index.php?act=login');
    }
}
