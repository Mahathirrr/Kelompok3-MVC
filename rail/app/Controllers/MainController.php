<?php

namespace Controllers;

use Models\Contact;
use Models\Passes;

class MainController
{
    private $about,$pass;
    public function __construct()
    {
        $this->about = new Contact();
        $this->pass = new Passes();
    }

    public function index()
    {
        require_once 'app/Views/index.php';
    }

    public function about()
    {
        $rs = $this->about->about();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/about.php';
    }

    public function contact()
    {
        $rs = $this->about->contactUs();
        $results = $rs['results'];
        $query = $rs['query'];
        require_once 'app/Views/contact.php';
    }

    public function contactStore()
    {
        $rs = $this->about->contactUsStore();
    }

    public function download_pass()
    {
        if (isset($_POST['search'])) {
            $rs = $this->pass->SearchPass($_POST['search']);
            $results = $rs['results'];
            $query = $rs['query'];
        }
        require_once 'app/Views/download-pass.php';
    }
}
