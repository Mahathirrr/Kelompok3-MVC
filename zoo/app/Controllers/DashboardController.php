<?php

namespace Controllers;

use Models\Admin;

class DashboardController
{
    public $model;
    public function __construct()
    {
        $this->model = new Admin();
    }

    public function index()
    {
        $data = $this->model;
        require_once 'app/Views/index.php';
    }


    public function contact()
    {
        $data = $this->model;
        require_once 'app/Views/contact.php';
    }

    public function about()
    {
        $data = $this->model;
        require_once 'app/Views/about.php';
    }

    public function animal_detail()
    {
        $data = $this->model;
        require_once 'app/Views/animal-detail.php';
    }

    public function animal()
    {
        $data = $this->model;
        require_once 'app/Views/animals.php';
    }
}
