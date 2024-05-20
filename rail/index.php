<?php

/**
 * Bootstrap page
 * Require file autoload dari vendor
 */
require_once __DIR__ . '/vendor/autoload.php';

use Controllers\MainController;
use Controllers\AdminController;

/**
 * Buat objek dari kelas MainController
 */
$controller = new MainController();
$Admincontroller = new AdminController();

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

		case 'contact':
			$controller->contact();
			break;

		case 'contactStore':
			$controller->contactStore();
			break;

		case 'download-pass':
			$controller->download_pass();
			break;

		case 'login':
			$Admincontroller->login();
			break;

		case 'logout':
			$Admincontroller->logout();
			break;

		case 'dashboard':
			$Admincontroller->dashboard();
			break;

		case 'add_category':
			$Admincontroller->add_category();
			break;

		case 'manage_category':
			$Admincontroller->manage_category();
			break;

		case 'edit_category_detail':
			$Admincontroller->edit_category_detail();
			break;


		case 'add_pass':
			$Admincontroller->add_pass();
			break;

		case 'manage_pass':
			$Admincontroller->manage_pass();
			break;

		case 'edit_pass_detail':
			$Admincontroller->edit_pass_detail();
			break;

		case 'view_pass_detail':
			$Admincontroller->view_pass_detail();
			break;

		case 'changeimage':
			$Admincontroller->changeimage();
			break;

		case 'edit_about_us':
			$Admincontroller->edit_about_us();
			break;


		case 'edit_contact_us':
			$Admincontroller->edit_contact_us();
			break;

		case 'readenq':
			$Admincontroller->readenq();
			break;

		case 'unreadenq':
			$Admincontroller->unreadenq();
			break;

		case 'view_enquiry':
			$Admincontroller->view_enquiry();
			break;


		case 'search_pass':
			$Admincontroller->search_pass();
			break;

		case 'pass_bwdates_reports_details':
			$Admincontroller->pass_bwdates_reports_details();
			break;

		case 'pass_bwdates_report':
			$Admincontroller->pass_bwdates_report();
			break;


		case 'admin_profile':
			$Admincontroller->admin_profile();
			break;

		case 'change_password':
			$Admincontroller->change_password();
			break;
		default:
			$controller->index();
			break;
	}
}
