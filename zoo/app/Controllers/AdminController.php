<?php

namespace Controllers;

use Models\Admin;
use Models\Animal;

class AdminController
{
    public $admin, $animal;
    public function __construct()
    {
        $this->admin = new Admin();
        $this->animal = new Animal();
    }

    public function index()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/index.php';
    }


    public function dashboard()
    {
        $data = $this->admin;
        $count = $this->animal->getTotalAnimal();
        $countAdult = $this->animal->getAdultVisitor();
        $countChild = $this->animal->getChildVisitor();
        require_once 'app/Views/admin/dashboard.php';
    }

    public function add_animals()
    {
        $data = $this->admin;
        $this->animal->addAnimal();
        require_once 'app/Views/admin/add-animals.php';
    }

    public function manage_animals()
    {
        $data = $this->admin;
        $animals = $this->animal->getAllAnimals();
        require_once 'app/Views/admin/manage-animals.php';
    }

    public function manage_ticket()
    {
        $data = $this->admin;
        $ticketTypes  = $this->animal->getAllAnimals();
        require_once 'app/Views/admin/manage-ticket.php';
    }

    public function add_normal_ticket()
    {
        $data = $this->admin;
        if (isset($_POST['submit'])) {
            $vname = $_POST['visitorname'];
            $noadult = $_POST['noadult'];
            $nochildren = $_POST['nochildren'];
            $aprice = $_POST['aprice'];
            $cprice = $_POST['cprice'];
            $ticketid = mt_rand(100000000, 999999999);

            $data = [
                'visitorName' => $vname,
                'ticketID' => $ticketid,
                'noAdult' => $noadult,
                'noChildren' => $nochildren,
                'adultUnitPrice' => $aprice,
                'childUnitPrice' => $cprice,
            ];

            if ($this->admin->addTicket($data)) {
                echo '<script>alert("Ticket has been generated")</script>';
                echo "<script>window.location.href='index.php?act=view-normal-ticket&viewid=$ticketid'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again.")</script>';
            }
        }
        require_once 'app/Views/admin/add-normal-ticket.php';
    }


    public function manage_normal_ticket()
    {
        $data = $this->admin;
        if (isset($_GET['id']) && isset($_GET['del']) && $_GET['del'] == 'delete') {
            $id = $_GET['id'];
            if ($this->admin->deleteTicket($id)) {
                echo '<script>alert("Ticket has been deleted.")</script>';
            } else {
                echo '<script>alert("Something went wrong. Please try again.")</script>';
            }
        }
        $tickets = $this->admin->getAllTickets();
        require_once 'app/Views/admin/manage-normal-ticket.php';
    }

    public function add_foreigners_ticket()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/add-foreigners-ticket.php';
    }


    public function manage_foreigners_ticket()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/manage-foreigners-ticket.php';
    }


    public function contactus()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/contactus.php';
    }

    public function aboutus()
    {
        $data = $this->admin;
        $about = $this->admin->getAbout();
        require_once 'app/Views/admin/aboutus.php';
    }


    public function between_dates_normalreports()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/between-dates-normalreports.php';
    }

    public function between_dates_foreignerreports()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/between-dates-foreignerreports.php';
    }

    public function normal_search()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/normal-search.php';
    }

    public function foreigner_search()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/foreigner-search.php';
    }

    public function profile()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/profile.php';
    }

    public function change_password()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/change-password.php';
    }

    public function edit_animal_details()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/edit-animal-details.php';
    }

    public function edit_ticket()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/edit-ticket.php';
    }

    public function changeimage()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/changeimage.php';
    }


    public function view_foreigner_ticket()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/view-foreigner-ticket.php';
    }

    public function view_normal_ticket()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/view-normal-ticket.php';
    }

    public function normal_bwdates_reports_details()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/normal-bwdates-reports-details.php';
    }

    public function foreigner_bwdates_reports_details()
    {
        $data = $this->admin;
        require_once 'app/Views/admin/foreigner-bwdates-reports-details.php';
    }

    public function animal_detail()
    {
        $data = $this->admin;
        require_once 'app/Views/animal-detail.php';
    }
}
