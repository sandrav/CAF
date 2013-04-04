<?php
		
		function printFormSubmissionsPage() {
			$this->handleAdminPostRequests();
			if (isset($admin_options['show_install_popover']) && $admin_options['show_install_popover'] == 1) {
				$admin_options['show_install_popover'] = 0;
				?>
                <script type="text/javascript" language="javascript">
					$j(document).ready(function() {
						showCCFUsagePopover();
					});
				</script>
                <?php
				update_option(parent::getAdminOptionsName(), $admin_options);
			} /*if ($_POST['form_submission_delete']) {
				if (parent::deleteUserData($_POST['uid']) != false)
					$this->action_complete = __('A form submission has be successfully deleted!', 'ccf-pgp');
			}*/
			ccfpgp_utils::load_module('export/ccf-pgp-user-data.php');
			$user_data_array = parent::selectAllUserData();
			?>
			<div id="ccfpgp-admin">
			  <div class="plugin-header">
				<h2>
					<?php _e("CCF PGP", 'ccf-pgp'); ?>
				</h2>
             	<div class="links">
                	<a href="javascript:void(0)" class="quick-start-button">Quick Start Guide</a> - <a href="javascript:void(0)" class="usage-popover-button">Plugin Usage Manual</a>
              	</div>
              </div>
			  <!--<a class="genesis" href="http://www.shareasale.com/r.cfm?b=241369&u=481196&m=28169&urllink=&afftrack=">CCF PGP works best with any of the 20+ <span>Genesis</span> Wordpress child themes. The <span>Genesis Framework</span> empowers you to quickly and easily build incredible websites with WordPress.</a>-->
			
			<!--<form class="blog-horizontal-form" method="post" action="http://www.aweber.com/scripts/addlead.pl">
            	<input type="hidden" name="meta_web_form_id" value="1578604781" />
				<input type="hidden" name="meta_split_id" value="" />
				<input type="hidden" name="listname" value="ccf-plugin" />
				<input type="hidden" name="redirect" value="http://www.taylorlovett.com/wordpress-plugins/tutorials-offers-tips/" id="redirect_5832e41084448adb07da67a35dc83c27" />
				<input type="hidden" name="meta_adtracking" value="CCF_-_Wordpress_Plugins_Horizontal" />
				<input type="hidden" name="meta_message" value="1" />
				<input type="hidden" name="meta_required" value="name,email" />
				<span>WP Blogging Tips, Downloads, SEO Tricks & Exclusive Tutorials</span>
                <input type="text" name="name" value="Your Name" onclick="value=''" />
                <input type="text" name="email" value="Your Email" onclick="value=''" />
                <input type="submit" value="Sign Up for Free" />
            </form>-->
			<?php if (!empty($this->action_complete)) { ?>
			<div id="message" class="updated below-h2">
				<p><?php echo $this->action_complete; ?></p>
			</div>
			<?php } ?>
			<!-- Saved Form submissions -->
			  <h3 class="hndle"><span>
			      <!-- pgpchk -->
				  <?php _e("Saved Form Submissions", 'ccf-pgp'); ?>
				  </span></h3>
				  
					    
			  <form class="ccf-edit-ajax" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			  <table class="widefat post" id="form-submissions-table" cellspacing="0">
				<thead>
				  <tr>
					<th scope="col" class="manage-column ccf-width25"><input type="checkbox" class="checkall" /></th>
					<th scope="col" class="manage-column ccf-width250"><?php _e("Date Submitted", 'ccf-pgp'); ?></th>
					<th scope="col" class="manage-column ccf-width150"><?php _e("Form Submitted", 'ccf-pgp'); ?></th>
					<th scope="col" class="manage-column ccf-width250"><?php _e("Form Page", 'ccf-pgp'); ?></th>
					<th scope="col" class="manage-column ccf-width100"><?php _e("Form ID", 'ccf-pgp'); ?></th>
                    <th scope="col" class="manage-column"></th>
				  </tr>
				</thead>
				<tbody>
                  <?php
			$i = 0;
			foreach ($user_data_array as $data_object) {
			$data = new ccfpgpUserData(array('form_id' => $data_object->data_formid, 'data_time' => $data_object->data_time, 'form_page' => $data_object->data_formpage, 'encoded_data' => $data_object->data_value, 'encrypted_data' => $data_object->data_private ));	
			?>
				  <tr class="row-form_submission-<?php echo $data_object->id; ?> submission-top <?php if ($i % 2 == 0) echo 'ccf-evenrow'; ?>">
					<td><input type="checkbox" class="object-check" value="1" name="objects[<?php echo $data_object->id; ?>][object_do]" /></td>
					<td><?php echo date('F d, Y h:i:s A', $data->getDataTime()); ?></td>
					<td><?php
			if ($data->getFormID() > 0) {
			$data_form = parent::selectForm($data->getFormID());
			$this_form = (!empty($data_form->form_slug)) ? $data_form->form_slug : '-';
			echo $this_form;
			} else
			_e('Custom HTML Form', 'ccf-pgp');
			?>
					</td>
					<td><?php echo $data->getFormPage(); ?> </td>
                    <td><?php echo $data->getFormID(); ?> </td>
					<td class="ccf-alignright">
						<input type="button" class="submission-content-expand-button" value="<?php _e('Expand', 'ccf-pgp'); ?>" />
						<input type="button" class="single-delete" value="<?php _e('Delete', 'ccf-pgp'); ?>" />
					  <input class="object-id" type="hidden" name="objects[<?php echo $data_object->id; ?>][object_id]" value="<?php echo $data_object->id; ?>" />
					  <input type="hidden" class="object-type" name="objects[<?php echo $data_object->id; ?>][object_type]" value="form_submission" />
                      <div class="loading-img-container"><img src="<?php echo plugins_url(); ?>/ccf-pgp/images/wpspin_light.gif" width="16" height="16" class="ccf-hide loading-img-inner-form_submission-<?php echo $data_object->id; ?>" /></div>
					 </td>
				  </tr>
				  <tr class="row-form_submission-<?php echo $data_object->id; ?> submission-content <?php if ($i % 2 == 0) echo 'ccf-evenrow'; ?>">
					<td colspan="6"><ul>
						<?php
						//public
            			$data_array = $data->getDataArray();
            			foreach ($data_array as $item_key => $item_value) {
            			?>
    					   <li>
    					       <div><?php echo $item_key; ?></div>
    						   <p><?php echo $data->parseUserData($item_value); ?></p>
    					   </li>
            			   <?php
            			   //$i++;
            			}
                        $private_data = "";
                        $private_key = "";
                        $validKey = false;
                        
                        if(isset($_SESSION["CCFPGP_PRIVATE_KEY"])) {
                                $private_key = Crypt_RSA_Key::fromString($_SESSION["CCFPGP_PRIVATE_KEY"]);
                                if(Crypt_RSA_Key::isValid($private_key)) {
                                    $rsa_obj = new Crypt_RSA;
                                    $private_data = $rsa_obj->decrypt($data->getEncryptedData(), $private_key);
                                    //private
                                 }
                            }
                            $aPrivate = unserialize($private_data);
                            if(is_array($aPrivate)) {
                                    $validKey = true;   
                                    //$private_array = $data->getPrivateArray();
                                    
                                    foreach ($aPrivate as $item_key => $item_value) {
                                    ?>
                                        <li>
                                           <div>test <?php echo $item_key; ?></div>
                                           <p><?php echo $data->parseUserData($item_value); ?></p>
                                        </li>
                                        <?php
                                    }
                            } else {
                                echo "<li>" . __("Please enter a valid key for private data") . "</li>";
                            }
                            
                            if(!$validKey) { ?>
                                <li>
                                    
                                <form name="ccfpgp_manage_process_privkey_form" id="ccfpgp_manage_process_privkey_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
                                    <?php wp_nonce_field( 'ccfpgp_manage','ccfpgp_manage_nonce' ); ?>
                                        <input type="hidden" name="ccfpgp_action" value="process_send_key" id="ccfpgp_key_action">
                                        <input type="hidden" name="ccfpgp_transaction_id" value="<?php echo $_POST['ccfpgp_transaction_id'] ?>" id="ccfpgp_transaction_id">                      
                                        <div><?php _e("Private Encryption Key: " ); ?></div>
                                        <textarea id="ccfpgp_private_key" name="ccfpgp_private_key" rows="3" cols="40" ></textarea>
                                        <input class="button-primary" type="submit" name="send_key" value="<?php _e("Send Private Key"); ?>" id="submitbutton" />
                                        
                                </form>
                                </li>
                            <?php
                            }
                    ?>
                    </ul></td>
                  </tr>
                  <?php
                  echo "uno ".$_POST['ccfpgp_action']. "|";
                  if(isset($_POST['ccfpgp_action']) && check_admin_referer( 'ccfpgp_manage', 'ccfpgp_manage_nonce' )) {
                                        echo "dos";
        if($_POST['ccfpgp_action'] == 'process' && isset($_POST['ccfpgp_transaction_id']) && $_POST['ccfpgp_transaction_id'] != -1) {
            //Form data sent
            ccfpgpProcess($_POST['ccfpgp_transaction_id']);
        }
        else if($_POST['ccfpgp_action'] == 'process_send_key') {
            //Form data sent
                              echo "tres";
            ?>
            <div class="updated"><p><strong><?php _e('Private Key Loaded Temporarily'); ?></strong></p></div>
            <?php
            if(isset($_POST["ccfpgp_private_key"])) {
                $_SESSION["CCFPGP_PRIVATE_KEY"] = $_POST["ccfpgp_private_key"];
            }
            ccfpgpProcess($_POST['ccfpgp_transaction_id']);
        } else {
            ?>
            <div class="updated"><p><strong><?php _e('ERROR' ); ?></strong></p></div>
            <?php
        }
    } 
                  
                  
                  //$i++;
            }

                  
            ?>
				</tbody>
				<tfoot>
				  <tr>
					<th scope="col" class="manage-column25"><input type="checkbox" class="checkall" /></th>
					<th scope="col" class="manage-column ccf-width250"><?php _e("Date Submitted", 'ccf-pgp'); ?></th>
					<th scope="col" class="manage-column ccf-width150"><?php _e("Form Submitted", 'ccf-pgp'); ?></th>
					<th scope="col" class="manage-column ccf-width250"><?php _e("Form Page", 'ccf-pgp'); ?></th>
                    <th scope="col" class="manage-column ccf-width100"><?php _e("Form ID", 'ccf-pgp'); ?></th>
					<th scope="col" class="manage-column"></th>
				  </tr>
				</tfoot>
			  </table>
              
			  <select class="bulk-dropdown" name="object_bulk_action">
				<option value="0"><?php _e('Bulk Actions', 'ccf-pgp'); ?></option>
				<option value="delete"><?php _e('Delete', 'ccf-pgp'); ?></option>
			  </select> <input type="submit" class="bulk-apply" name="object_bulk_apply" value="<?php _e('Apply', 'ccf-pgp'); ?>" /> <img src="<?php echo plugins_url(); ?>/ccf-pgp/images/wpspin_light.gif" class="loading-img" width="16" height="16" />
			  
			  
			  
			  </form>
			  <?php $this->insertUsagePopover(); ?>
              <?php $this->insertQuickStartPopover(); ?>
			</div>
			<?php
		}
?>