<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;

use Libraries\Database;
use PDO;

class Admin
{
    private $dbh;
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    public function doLogin($username, $password)
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

   

    public function menu()
    {
        $aid = $_SESSION['bpmsaid'];
        $sql = "SELECT AdminName from  tbladmin where ID=:aid";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':aid', $aid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

  

   

   


 

    public function CountUnread()
    {
        $sql1 = "SELECT * from tblcontact where IsRead is null ";
        $query1 = $this->dbh->prepare($sql1);
        $query1->execute();
        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
        return $query1->rowCount();
    }

    public function CountRead()
    {
        $sql1 = "SELECT * from tblcontact where IsRead='1'";
        $query1 = $this->dbh->prepare($sql1);
        $query1->execute();
        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
        return   $query1->rowCount();
    }

    public function editAbout()
    {
        if (isset($_POST['submit'])) {

            $bpmsaid = $_SESSION['bpmsaid'];
            $pagetitle = $_POST['pagetitle'];
            $pagedes = $_POST['pagedes'];
            $sql = "update tblpage set PageTitle=:pagetitle,PageDescription=:pagedes where  PageType='aboutus'";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':pagetitle', $pagetitle, PDO::PARAM_STR);
            $query->bindParam(':pagedes', $pagedes, PDO::PARAM_STR);

            $query->execute();
            echo '<script>alert("About us has been updated")</script>';
            echo "<script>window.location.href ='index.php?act=edit_about_us'</script>";
        }
    }

    public function getAbout()
    {
        $sql = "SELECT * from  tblpage where PageType='aboutus'";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

    public function getContact()
    {

        $sql = "SELECT * from  tblpage where PageType='contactus'";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

    public function editContact()
    {
        if (isset($_POST['submit'])) {


            $pagetitle = $_POST['pagetitle'];
            $pagedes = $_POST['pagedes'];
            $mobnum = $_POST['mobnum'];
            $email = $_POST['email'];
            $sql = "update tblpage set PageTitle=:pagetitle,PageDescription=:pagedes,Email=:email,MobileNumber=:mobnum where  PageType='contactus'";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':pagetitle', $pagetitle, PDO::PARAM_STR);
            $query->bindParam(':pagedes', $pagedes, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
            $query->execute();
            echo '<script>alert("Contact us has been updated")</script>';
        }
    }


    function getReadMsg()
    {
        $sql = "SELECT * from tblcontact where IsRead='1'";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

    function getUnReadMsg()
    {
        $sql = "SELECT * from tblcontact where IsRead is null";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

    function updateMsg()
    {
        $vid = $_GET['viewid'];
        $isread = 1;
        $sql = "update tblcontact set IsRead=:isread where ID=:vid";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':isread', $isread, PDO::PARAM_STR);
        $query->bindParam(':vid', $vid, PDO::PARAM_STR);
        $query->execute();
    }


    function getMsgByID()
    {
        $vid = $_GET['viewid'];
        $sql = "SELECT * from  tblcontact where ID=$vid";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

 

    function searchPass()
    {
        $sdata = $_POST['searchdata'];
        $sql = "SELECT * from tblpass where PassNumber like '$sdata%'|| ContactNumber like '$sdata%' || FullName like '$sdata%'";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return [
            'results' => $results,
            'query' => $query
        ];
    }

    function updateProfile()
    {
        if (isset($_POST['submit'])) {
            $adminid = $_SESSION['bpmsaid'];
            $AName = $_POST['adminname'];
            $mobno = $_POST['mobilenumber'];
            $email = $_POST['email'];
            $sql = "update tbladmin set AdminName=:adminname,MobileNumber=:mobilenumber,Email=:email where ID=:aid";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':adminname', $AName, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':mobilenumber', $mobno, PDO::PARAM_STR);
            $query->bindParam(':aid', $adminid, PDO::PARAM_STR);
            $query->execute();
            echo '<script>alert("Profile has been updated.")</script>';
        }
    }


    function updatePassword()
    {
        if (isset($_POST['submit'])) {
            $adminid = $_SESSION['bpmsaid'];
            $cpassword = md5($_POST['currentpassword']);
            $newpassword = md5($_POST['newpassword']);
            $sql = "SELECT ID FROM tbladmin WHERE ID=:adminid and Password=:cpassword";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':adminid', $adminid, PDO::PARAM_STR);
            $query->bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            if ($query->rowCount() > 0) {
                $con = "update tbladmin set Password=:newpassword where ID=:adminid";
                $chngpwd1 = $this->dbh->prepare($con);
                $chngpwd1->bindParam(':adminid', $adminid, PDO::PARAM_STR);
                $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
                $chngpwd1->execute();

                echo '<script>alert("Your password successully changed")</script>';
                echo "<script>window.location.href ='index.php?act=change_password'</script>";
            } else {
                echo '<script>alert("Your current password is wrong")</script>';
            }
        }
    }

    function getUserByID()
    {
        $sql = "SELECT * from  tbladmin";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return [
            'results' => $results,
            'query' => $query
        ];
    }
}
