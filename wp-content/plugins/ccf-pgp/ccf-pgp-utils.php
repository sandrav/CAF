<?php
/*
	CCF PGP Plugin
	By Taylor Lovett - http://www.taylorlovett.com
	Plugin URL: http://www.taylorlovett.com/wordpress-plugins
*/
if (!class_exists('ccfpgp_utils')) {
	class ccfpgp_utils {
		function ccfpgp_utils() {
			$this->defineConstants();
		}
		
		function redirect($location) {
			if (!empty($location)) {
				wp_redirect($location);
				exit();
			}
		}
		
		function load_module($path, $required = true) {
			if (empty($path)) return false;
			if ($required) require_once('modules/' . $path);
			else include_once('modules/' . $path);
			return true;
		}
		
		function encodeOption($option) {
			return htmlspecialchars(stripslashes($option), ENT_QUOTES);
		}
		
		function startSession() {
			if (!@session_id()) @session_start();
		}
		
		function getWPTablePrefix() {
			global $wpdb;
			return $wpdb->prefix;
		}
		
		function encodeOptionArray($option_array) {
			foreach ($option_array as $option) {
				if (is_array($option))
					$option = ccfpgp_utils::encodeOptionArray($option);
				else
					$option = ccfpgp_utils::encodeOption($option);
			}
			return $option_array;
		}
		
		function decodeOption($option, $strip_slashes = 1, $decode_html_chars = 1) {
			if ($strip_slashes == 1) $option = stripslashes($option);
			if ($decode_html_chars == 1) $option = html_entity_decode($option);
			return $option;
		}
		
		function defineConstants() {
			$prefix = ccfpgp_utils::getWPTablePrefix();
			//pgpchk
			define('CCF_PRIVATE', 'pgpchk_private');
			define('CCF_AJAX_URL', admin_url('admin-ajax.php'));
			define('CCF_FORMS_TABLE', $prefix . 'ccfpgp_forms');
			define('CCF_FIELDS_TABLE', $prefix . 'ccfpgp_fields');
			define('CCF_STYLES_TABLE', $prefix . 'ccfpgp_styles');
			define('CCF_USER_DATA_TABLE', $prefix . 'ccfpgp_user_data');
			define('CCF_FIELD_OPTIONS_TABLE', $prefix . 'ccfpgp_field_options');
			define('CCF_BASE_PATH', ABSPATH . 'wp-content/plugins/ccf-pgp/');
			define('CCF_DEAD_STATE_VALUE', 'ccf-dead-state');
			$GLOBALS['ccf_tables_array'] = array(CCF_FORMS_TABLE, CCF_FIELDS_TABLE, CCF_STYLES_TABLE, CCF_USER_DATA_TABLE, CCF_FIELD_OPTIONS_TABLE);
			$GLOBALS['ccf_fixed_fields'] = array('ccfpgp_submit' => '', 
							'fid' => '', 
							'fixedEmail' => __("Use this field if you want the plugin to throw an error on fake emails.", 'ccf-pgp'), 
							'fixedWebsite' => __("This field will throw an error on invalid website addresses.", 'ccf-pgp'), 
							'emailSubject' => __("This field lets users specify the subject of the email sent to you on submission.", 'ccf-pgp'), 
							'form_page' => '', 
							'form_page_name'=>'',
							'captcha' => __("This field requires users to type numbers in an image preventing spam.", 'ccf-pgp'), 
							'ishuman' => __("This field requires users to check a box to prove they aren't a spam bot.", 'ccf-pgp'),
							'usaStates' => __("This is a dropdown field showing each state in the US. If you want a state initially selected, enter it in 'Initial Value.'", 'ccf-pgp'),
							'datePicker' => __("This field displays a text box that when clicked pops up an interactive calender.'", 'ccf-pgp'),
							'allCountries' => __("This is a dropdown field showing countries. If you want a country initially selected, enter it in 'Initial Value.'", 'ccf-pgp'),
							'resetButton' => __("This field lets users reset all form fields to their initial values. This will be inserted next to the submit button.", 'ccf-pgp'),
							'MAX_FILE_SIZE' => ''
							);
		}
	}
}
?>