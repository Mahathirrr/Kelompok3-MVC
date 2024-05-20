<?php

/**
 * Bootstrap page
 * Require file autoload dari vendor
 */
require_once __DIR__ . '/vendor/autoload.php';

use Controllers\DashboardController;
use Controllers\AdminController;

/**
 * Buat objek dari kelas Mahasiswa
 */
$controller = new DashboardController();
$admin = new AdminController();

//tentukan bagaimana halaman akan di-load
if (!isset($_GET['act'])) {
	//pemanggilan method yang akan di-run
	$controller->index();
} else {
	switch ($_GET['act']) {

		case 'home':
			$controller->index();
			break;

		case 'about':
			$controller->about();
			break;
		case 'animals':
			$controller->animal();
			break;
		case 'contact':
			$controller->contact();
			break;

		case 'animal_detail':
			$controller->animal_detail();
			break;

		case 'login':
			$admin->index();
			break;

		case 'dashboard':
			$admin->dashboard();
			break;

		case 'add-animals':
			$admin->add_animals();
			break;

		case 'manage-animals':
			$admin->manage_animals();
			break;

		case 'manage-ticket':
			$admin->manage_ticket();
			break;

		case 'add-normal-ticket':
			$admin->add_normal_ticket();
			break;

		case 'manage-normal-ticket':
			$admin->manage_normal_ticket();
			break;

		case 'add-foreigners-ticket':
			$admin->add_foreigners_ticket();
			break;

		case 'manage-foreigners-ticket':
			$admin->manage_foreigners_ticket();
			break;


		case 'contactus':
			$admin->contactus();
			break;

		case 'aboutus':
			$admin->aboutus();
			break;


		case 'between-dates-normalreports':
			$admin->between_dates_normalreports();
			break;


		case 'between-dates-foreignerreports':
			$admin->between_dates_foreignerreports();
			break;

		case 'normal-search':
			$admin->normal_search();
			break;

		case 'foreigner-search':
			$admin->foreigner_search();
			break;

		case 'profile':
			$admin->profile();
			break;


		case 'change-password':
			$admin->change_password();
			break;


		case 'edit-animal-details':
			$admin->edit_animal_details();
			break;

		case 'edit-ticket':
			$admin->edit_ticket();
			break;

		case 'changeimage':
			$admin->changeimage();
			break;

		case 'view-foreigner-ticket':
			$admin->view_foreigner_ticket();
			break;

		case 'view-normal-ticket':
			$admin->view_normal_ticket();
			break;

		case 'normal-bwdates-reports-details':
			$admin->normal_bwdates_reports_details();
			break;

		case 'foreigner-bwdates-reports-details':
			$admin->foreigner_bwdates_reports_details();
			break;

		case 'animal-detail':
			$admin->animal_detail();
			break;

		default:
			$controller->index();
			break;
	}
}
