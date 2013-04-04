<?php
/*
	CCF PGP Plugin
	By Taylor Lovett - http://www.taylorlovett.com
	Plugin URL: http://www.taylorlovett.com/wordpress-plugins
*/
if (!class_exists('ccfpgpWidget')) {
	class ccfpgpWidget extends WP_Widget {
		function ccfpgpWidget() {
			$widget_ops = array('description' => __('Add a customized CCF PGP form to your sidebar.', 'ccf-pgp'));
			$this->WP_Widget('ccf-pgp', 'CCF PGP', $widget_ops);
		}

	
		function widget($args, $instance) {
			global $ccf_pgp_front;
			$admin_option = $ccf_pgp_front->getAdminOptions();
			$form_id = intval($instance['form_id']);
			if ((is_front_page() and $admin_option['show_widget_home'] != 1) or (is_single() and $admin_option['show_widget_singles'] != 1) or 
				(is_page() and $admin_option['show_widget_pages'] != 1) or (is_category() and $admin_option['show_widget_categories'] != 1) or 
				(is_archive() and $admin_option['show_widget_archives'] != 1))
				return false;
			if (empty($form_id) or $form_id < 1) return false;
			extract($args);
			$form_object = $ccf_pgp_front->selectForm($form_id);
			echo $before_widget . $before_title . $form_object->form_title . $after_title;
			echo $ccf_pgp_front->getFormCode($form_object, true);
			echo $after_widget;

		}
		
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['form_id'] = $new_instance['form_id'];
			return $instance;
		}
		
		function form($instance) {				
			global $ccf_pgp_admin;
			$forms = $ccf_pgp_admin->selectAllForms();
			$form_id = (isset($instance['form_id'])) ? esc_attr($instance['form_id']) : 0;
			?>
			<p><label for="<?php echo $this->get_field_id('form_id'); ?>">
			<?php _e('Choose a Form:', 'ccf-pgp'); ?><br />
			<select id="<?php echo $this->get_field_id('form_id'); ?>" name="<?php echo $this->get_field_name('form_id'); ?>">
				<?php
				foreach ($forms as $form) {
					?>
					<option <?php if ($form_id == $form->id) echo 'selected="selected"'?> value="<?php echo $form->id; ?>"><?php echo $form->form_slug; ?></option>
					<?php
				}
				?>
			</select>
			</label></p>
            <p><a href="options-general.php?page=ccf-pgp#forms"><?php _e('Create a Form', 'ccf-pgp'); ?></a></p>
			<?php 
    	}
	}
}
?>