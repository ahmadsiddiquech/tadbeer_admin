<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

// User Constants
////////////////// ADMIN ///////////////
if($_SERVER['HTTP_HOST'] == 'ds-pc' || $_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '192.168.100.13'){
	// ************** FOR LOCAL SERVER
	define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/');
	define('HTTPS_BASE_URL', 'https://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/');
	define('BASE_URL_NEWS_LISTING', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/front/');
	define('FOOTER_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/template/');
	define('IMAGE_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/uploads/');
	define('CAPTCHA_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/captcha/');
	define('ADMIN_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/admin/');
	define('STATIC_ADMIN_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/admin/theme1/css/');
	define('STATIC_ADMIN_JS', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/admin/theme1/js/');
	define('STATIC_ADMIN_IMAGE', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/admin/theme1/images/');
	///////////////////FRONT///////////////////////////////
	define('STATIC_FRONT_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/front/tadbeer_admin/css/');
	define('STATIC_FRONT_JS', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/front/tadbeer_admin/js/');
	define('STATIC_FRONT_IMAGE', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/front/tadbeer_admin/images/');
}
else{
	// ************** FOR LIVE SERVER
	define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/');
	define('HTTPS_BASE_URL', 'https://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/');
	define('BASE_URL_NEWS_LISTING', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/front/');
	define('FOOTER_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/template/');
	define('CAPTCHA_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/captcha/');
	define('IMAGE_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/uploads/');
	define('ADMIN_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/admin/');
	define('STATIC_ADMIN_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/admin/theme1/css/');
	define('STATIC_ADMIN_JS', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/admin/theme1/js/');
	define('STATIC_ADMIN_IMAGE', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/admin/theme1/images/');
	define('STATIC_FRONT_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/front/tadbeer_admin/css/');
	define('STATIC_FRONT_JS', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/front/tadbeer_admin/js/');
	define('STATIC_FRONT_IMAGE', 'http://'.$_SERVER['HTTP_HOST'].'/tadbeer_admin/static/front/tadbeer_admin/images/');
	define('STATIC_FRONT_NOTIFICATION', '../tadbeer_admin/static/front/tadbeer_admin/notification/');

	// define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/');
	// define('HTTPS_BASE_URL', 'https://'.$_SERVER['HTTP_HOST'].'/');
	// define('BASE_URL_NEWS_LISTING', 'http://'.$_SERVER['HTTP_HOST'].'/front/');
	// define('FOOTER_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/template/');
	// define('CAPTCHA_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/captcha/');
	// define('IMAGE_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/uploads/');
	// define('ADMIN_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/admin/');
	// define('STATIC_ADMIN_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/static/admin/theme1/css/');
	// define('STATIC_ADMIN_JS', 'http://'.$_SERVER['HTTP_HOST'].'/static/admin/theme1/js/');
	// define('STATIC_ADMIN_IMAGE', 'http://'.$_SERVER['HTTP_HOST'].'/static/admin/theme1/images/');
	// define('STATIC_FRONT_CSS', 'http://'.$_SERVER['HTTP_HOST'].'/static/front/tadbeer_admin/css/');
	// define('STATIC_FRONT_JS', 'http://'.$_SERVER['HTTP_HOST'].'/static/front/tadbeer_admin/js/');
	// define('STATIC_FRONT_IMAGE', 'http://'.$_SERVER['HTTP_HOST'].'/static/front/tadbeer_admin/images/');
}

define('ACTUAL_SERVICES_IMAGE_PATH', 'uploads/services/actual_images/');
define('LARGE_SERVICES_IMAGE_PATH', 'uploads/services/large_images/');
define('MEDIUM_SERVICES_IMAGE_PATH', 'uploads/services/medium_images/');
define('SMALL_SERVICES_IMAGE_PATH', 'uploads/services/small_images/');

define('ACTUAL_GALLERY_IMAGE_PATH', 'uploads/gallery/actual_images/');
define('LARGE_GALLERY_IMAGE_PATH', 'uploads/gallery/large_images/');
define('MEDIUM_GALLERY_IMAGE_PATH', 'uploads/gallery/medium_images/');
define('SMALL_GALLERY_IMAGE_PATH', 'uploads/gallery/small_images/');

define('ACTUAL_NEWS_IMAGE_PATH', 'uploads/news/actual_images/');
define('LARGE_NEWS_IMAGE_PATH', 'uploads/news/large_images/');
define('MEDIUM_NEWS_IMAGE_PATH', 'uploads/news/medium_images/');
define('SMALL_NEWS_IMAGE_PATH', 'uploads/news/small_images/');

define('ACTUAL_ABOUT_US_IMAGE_PATH', 'uploads/about_us/actual_images/');
define('LARGE_ABOUT_US_IMAGE_PATH', 'uploads/about_us/large_images/');
define('MEDIUM_ABOUT_US_IMAGE_PATH', 'uploads/about_us/medium_images/');
define('SMALL_ABOUT_US_IMAGE_PATH', 'uploads/about_us/small_images/');

define('ACTUAL_SLIDER_IMAGE_PATH', 'uploads/slider/actual_images/');
define('LARGE_SLIDER_IMAGE_PATH', 'uploads/slider/large_images/');
define('MEDIUM_SLIDER_IMAGE_PATH', 'uploads/slider/medium_images/');
define('SMALL_SLIDER_IMAGE_PATH', 'uploads/slider/small_images/');

define('ACTUAL_TEAM_IMAGE_PATH', 'uploads/our_team/actual_images/');
define('LARGE_TEAM_IMAGE_PATH', 'uploads/our_team/large_images/');
define('MEDIUM_TEAM_IMAGE_PATH', 'uploads/our_team/medium_images/');
define('SMALL_TEAM_IMAGE_PATH', 'uploads/our_team/small_images/');

define('DATA_SAVED', 'saved successfully');
define('DATA_UPDATED', 'updated successfully');

//****Form Validations****//
define('TEXT_BOX_RANGE',5000);
define('TEXT_AREA_RANGE',255);
//****Form Validations****//
define('RADIO_BUTTON',1);
define('CHECK_BOX',2);
define('DROPDOWN',3);
//define('MULTI_DROPDOWN',4);
define('TEXTBOX',5);
define('NUMBER_BOX',6);
define('DATE_BOX',7);
define('YEAR_BOX',8);
define('CURRENCY_BOX',9);
define('MILEAGE_BOX',10);
define('CC_BOX',11);
////////////////// Pagination constants ///////////////
define('PRE_POST',0);
define('FREE_POST',1);
define('PAID_POST',2);
define('EXPIRED_POST',3);
define('REJECTED_POST',4);

define('UN_PUBLISHED',0);
define('PUBLISHED',1);

define('LIMIT',5);
define('NUM_LINKS',3);
define('OUTLET',$_SERVER['HTTP_HOST']);


/******************************/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */

/* Location: ./application/config/constants.php */
?>