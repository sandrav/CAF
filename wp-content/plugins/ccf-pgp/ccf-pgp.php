<?php
/*
	Plugin Name: CCF PGP
	Plugin URI: 
	Description: Based on Custom Contact Form v. 5.0.0.1 by Author Taylor Lovett & PGPCheckout by Gabriel Jurgens
	Version: 1.0.0
	Author: Sandra Vega
	Author URI: http://www.sandravega.com.ar
*/

$old_error_settings = error_reporting();
//error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_USER_DEPRECATED);
require_once('ccf-pgp-utils.php');
require_once('lib/tinypgp.php');
//require_once(ABSPATH.'FirePHPCore/FirePHP.class.php');
//$mifirePHP = FirePHP::getInstance(true);

//$mifirePHP->setEnabled(false); 
new ccfpgp_utils();

ccfpgp_utils::load_module('db/ccf-pgp-db.php');
if (!class_exists('ccfpgp')) {
	class ccfpgp extends ccfpgpDB {
		var $adminOptionsName = 'ccfpgpAdminOptions';
		
		function activatePlugin() {
			$admin_options = $this->getAdminOptions();
			$admin_options['show_install_popover'] = 1;
			update_option($this->getAdminOptionsName(), $admin_options);
			ccfpgp_utils::load_module('db/ccf-pgp-activate-db.php');
			new ccfpgpActivateDB();
		}
		
		function getAdminOptionsName() {
			return $this->adminOptionsName;
		}
		
		function getAdminOptions() {
			$admin_email = get_option('admin_email');
			$ccfpgpAdminOptions = array('show_widget_home' => 1, 'show_widget_pages' => 1, 'show_widget_singles' => 1, 'show_widget_categories' => 1, 'show_widget_archives' => 1, 'default_to_email' => $admin_email, 'default_from_email' => $admin_email, 'default_from_name' => 'CCF PGP', 'default_form_subject' => __('Someone Filled Out Your Contact Form!', 'ccf-pgp'), 
			'remember_field_values' => 0, 'enable_widget_tooltips' => 1, 'mail_function' => 'default', 'form_success_message_title' => __('Successful Form Submission', 'ccf-pgp'), 'form_success_message' => __('Thank you for filling out our web form. We will get back to you ASAP.', 'ccf-pgp'), 'enable_jquery' => 1, 'code_type' => 'XHTML',
			'show_install_popover' => 0, 'email_form_submissions' => 1, 'enable_dashboard_widget' => 1, 'admin_ajax' => 1, 'smtp_host' => '', 'smtp_encryption' => 'none', 'smtp_authentication' => 0, 'smtp_username' => '', 'smtp_password' => '', 'smtp_port' => '', 'default_form_error_header' => __('You filled out the form incorrectly.', 'ccf-pgp'), 
			'default_form_bad_permissions' => __("You don't have the proper permissions to view this form.", 'ccf-pgp'), 'enable_form_access_manager' => 0, 'dashboard_access' => 2, 'form_page_inclusion_only' => 0, 'max_file_upload_size' => 10); // default general settings
			$ccfpgpOptions = get_option($this->getAdminOptionsName());
			if (!empty($ccfpgpOptions)) {
				foreach ($ccfpgpOptions as $key => $option)
					$ccfpgpAdminOptions[$key] = $option;
			}
			update_option($this->getAdminOptionsName(), $ccfpgpAdminOptions);
			return $ccfpgpAdminOptions;
		}
	}
}
$ccf_pgp_forms = new ccfpgp();


/* general plugin stuff */


if (isset($ccf_pgp_forms)) {
	register_activation_hook(__FILE__, array(&$ccf_pgp_forms, 'activatePlugin'));
}


if (!is_admin()) { /* is front */
	require_once('ccf-pgp-front.php');
	$ccf_pgp_front = new ccfpgpFront();
	if (!function_exists('serveccfpgp')) {
		function serveccfpgp($fid) {
			global $ccf_pgp_front;
			echo $ccf_pgp_front->getFormCode($ccf_pgp_front->selectForm($fid));

		}
	}
	add_action('init', array(&$ccf_pgp_front, 'frontInit'), 1);
	add_action('template_redirect', array(&$ccf_pgp_front, 'includeDependencies'), 1);
	

	//add_action('wp_enqueue_scripts', array(&$ccf_pgp_front, 'insertFrontEndScripts'), 1);
	//add_action('wp_print_styles', array(&$ccf_pgp_front, 'insertFrontEndStyles'), 1);
	add_shortcode('ccfpgp', array(&$ccf_pgp_front, 'shortCodeToForm'));
	
	add_filter('the_content', array(&$ccf_pgp_front, 'contentFilter'));
} else { /* is admin */
	$GLOBALS['ccf_current_page'] = (isset($_GET['page'])) ? $_GET['page'] : '';
	require_once('ccf-pgp-admin.php');
	$ccf_pgp_admin = new ccfpgpAdmin();
	if (!function_exists('ccfpgp_ap')) {
		function ccfpgp_ap() {
			global $ccf_pgp_admin;
			if (!isset($ccf_pgp_admin)) return;
			if (function_exists('add_menu_page')) {
				add_menu_page(__('CCF PGP', 'ccf-pgp'), __('CCF PGP', 'ccf-pgp'), 'manage_options', 'ccf-pgp', array(&$ccf_pgp_admin, 'printAdminPage'));
				add_submenu_page('ccf-pgp', __('CCF PGP', 'ccf-pgp'), __('CCF PGP', 'ccf-pgp'), 'manage_options', 'ccf-pgp', array(&$ccf_pgp_admin, 'printAdminPage'));
				add_submenu_page('ccf-pgp', __('Saved Form Submissions', 'ccf-pgp'), __('Saved Form Submissions', 'ccf-pgp'), 'manage_options', 'ccf-saved-form-submissions', array(&$ccf_pgp_admin, 'printFormSubmissionsPage'));
				add_submenu_page('ccf-pgp', __('General Settings', 'ccf-pgp'), __('General Settings', 'ccf-pgp'), 'manage_options', 'ccf-settings', array(&$ccf_pgp_admin, 'printSettingsPage'));
                //pgpchk
                add_submenu_page('ccf-pgp', __('Initial PGP settings', 'ccf-pgp'), __('Initial Private Settings', 'ccf-pgp'), 'manage_options', 'ccf-PGPsettings', array(&$ccf_pgp_admin, 'printPGPSettingsPage'));
			}
		}
	}
	$admin_options = $ccf_pgp_admin->getAdminOptions();
	if (isset($admin_options['enable_dashboard_widget']) && $admin_options['enable_dashboard_widget'] == 1) {
		ccfpgp_utils::load_module('widget/ccf-pgp-dashboard.php');
		$ccf_dashboard = new ccfpgpDashboard();
		if ($ccf_dashboard->isDashboardPage()) {
			add_action('admin_print_styles', array(&$ccf_dashboard, 'insertDashboardStyles'), 1);
			add_action('admin_enqueue_scripts', array(&$ccf_dashboard, 'insertDashboardScripts'), 1);
		}
		add_action('wp_dashboard_setup', array(&$ccf_dashboard, 'install'));
	}
	add_action('init', array(&$ccf_pgp_admin, 'adminInit'), 1);
	if ($ccf_pgp_admin->isPluginAdminPage()) {
		add_action('admin_print_styles', array(&$ccf_pgp_admin, 'insertBackEndStyles'), 1);
		add_action('admin_enqueue_scripts', array(&$ccf_pgp_admin, 'insertAdminScripts'), 1);
	}
	add_action('wp_ajax_ccf-ajax', array(&$ccf_pgp_admin, 'handleAJAX'));
	add_action('wp_ajax_nopriv_ccf-ajax', array(&$ccf_pgp_admin, 'handleAJAX'));
	add_filter('plugin_action_links', array(&$ccf_pgp_admin,'appendToActionLinks'), 10, 2);
	add_action('admin_menu', 'ccfpgp_ap');
}
/* languages stuff*/
function ccfpgp_lang_init() {
   if (function_exists('load_plugin_textdomain')) {
      load_plugin_textdomain('ccf-pgp', false, dirname(plugin_basename(__FILE__)).'/languages/' );
   }

} 
add_action('plugins_loaded' ,'ccfpgp_lang_init');

/* widget stuff */
ccfpgp_utils::load_module('widget/ccf-pgp-widget.php');
if (!function_exists('CCFPGPWidgetInit')) {
	function CCFPGPWidgetInit() {
		register_widget('ccfpgpWidget');
	}
}


add_action('widgets_init', 'CCFPGPWidgetInit');
error_reporting($old_error_settings);



?>
