<?php
/*
	CCF PGP Plugin
	By Taylor Lovett - http://www.taylorlovett.com
	Plugin URL: http://www.taylorlovett.com/wordpress-plugins
*/
if (!class_exists('ccfpgpUserData')) {
	class ccfpgpUserData {
		var $form_id = NULL;
		var $data_time = NULL;
		var $data_array = NULL;
		var $encoded_data = NULL;
		//pgpchk
		var $private_array = NULL;
		var $encrypted_data = NULL;
		var $form_page = NULL; //param form_page_name
		function ccfpgpUserData($param_array) {
			if (isset($param_array['form_id']))
				$this->setFormID($param_array['form_id']);
				
			if (isset($param_array['data_time'])) 
				$this->setDataTime($param_array['data_time']);
			
			//echo "x-".$param_array['form_page_name']."<br/>".$param_array['form_page'];
			if (isset($param_array['form_page_name'])) 
				$this->setFormPage($param_array['form_page_name']);
			//else if(isset($param_array['form_page']))
				//$this->setFormPage($param_array['form_page']);
			if (isset($param_array['data_array'])) {
				$this->setDataArray($param_array['data_array']);
				$this->encodeData();
			}
			//pgpchk
			if (isset($param_array['private_array'])) {
				$this->setPrivateArray($param_array['private_array']);
				$this->encryptData();
			}
				
			if (isset($param_array['encoded_data'])) {
				$this->setEncodedData($param_array['encoded_data']);
				$this->decodeData();
			}
            if (isset($param_array['encrypted_data'])) {
                $this->setEncryptedData($param_array['encrypted_data']);
                //$this->decodePrivate();
            }

		}
		
		//pgpchk
		function encryptData() {
			$data_array = $this->getPrivateArray();
			$temp_data='';
			$encrypted_data = '';
			foreach ($data_array as $key => $value) {
			    
				$key = ccfpgp_utils::encodeOption($key);
				if (!is_array($value))
					$value = ccfpgp_utils::encodeOption($value);
				else {
					$value = ccfpgp_utils::encodeOptionArray($value);
					$value = implode(', ', $value);
				}
				
				$temp_data .= 's:'.strlen($key).':"'.$key.'";';
				$temp_data .= 's:'.strlen($value).':"'.$value.'";';
                

			} 
            $public_key = Crypt_RSA_Key::fromString(get_option('ccfpgp_public_key'));
            if(!Crypt_RSA_Key::isValid($public_key)) die("Invalid public Key");
            $rsa_obj = new Crypt_RSA;            
            //echo $temp_data."<br/>";

            $encrypted_data = $rsa_obj->encrypt($temp_data, $public_key);

			$this->setEncryptedData($encrypted_data);
	
		}
		function encodeData() {
			$data_array = $this->getDataArray();
			$encoded_data = '';
			foreach ($data_array as $key => $value) {
				$key = ccfpgp_utils::encodeOption($key);
				if (!is_array($value))
					$value = ccfpgp_utils::encodeOption($value);
				else {
					$value = ccfpgp_utils::encodeOptionArray($value);
					$value = implode(', ', $value);
				}
				$encoded_data .= 's:'.strlen($key).':"'.$key.'";';
				$encoded_data .= 's:'.strlen($value).':"'.$value.'";';
			} 
			//echo $encoded_data."<br/>";
			$this->setEncodedData($encoded_data);
		}
		
		
		function decodeData() {
			$data = $this->getEncodedData();
			$data_array = array();
			while (!empty($data)) {
				$key_length = $this->strstrb($data, ':"');
				$key_length = str_replace('s:', '', $key_length);
				$piece_length = 6 + strlen($key_length) + (int) $key_length;
				$key = substr($data, (4 + strlen($key_length)), (int) $key_length);
				$data = substr($data, $piece_length);
				$value_length = $this->strstrb($data, ':"');
				$value_length = str_replace('s:', '', $value_length);
				$piece_length = 6 + strlen($value_length) + (int) $value_length;
				$value = substr($data, (4 + strlen($value_length)), (int) $value_length);
				$data = substr($data, $piece_length);
				$data_array[$key] = $value;
			}
			$this->setDataArray($data_array);
		}
		
        function decodePrivateData($data) {
            
            $data_array = array();
            while (!empty($data)) {
                $key_length = $this->strstrb($data, ':"');
                $key_length = str_replace('s:', '', $key_length);
                $piece_length = 6 + strlen($key_length) + (int) $key_length;
                $key = substr($data, (4 + strlen($key_length)), (int) $key_length);
                $data = substr($data, $piece_length);
                $value_length = $this->strstrb($data, ':"');
                $value_length = str_replace('s:', '', $value_length);
                $piece_length = 6 + strlen($value_length) + (int) $value_length;
                $value = substr($data, (4 + strlen($value_length)), (int) $value_length);
                $data = substr($data, $piece_length);
                $data_array[$key] = $value;
            }
            $this->setPrivateArray($data_array);
        }

		function strstrb($h, $n){
			return array_shift(explode($n, $h, 2));
		}
		
		function parseUserData($data, $for_csv = false) {
			if (preg_match('/\[file[ ]*link=("|&quot;).*?("|&quot;)\].*?\[\/[ ]*file\]/is', $data)) {
				if ($for_csv) $data = preg_replace('/\[file[ ]*link=("|&quot;)(.*?)("|&quot;)\](.*?)\[\/[ ]*file\]/is', '$2', $data);
				else $data = preg_replace('/\[file[ ]*link=("|&quot;)(.*?)("|&quot;)\](.*?)\[\/[ ]*file\]/is', '<a href="$2" title="'.__('View File Upload', 'ccf-pgp').'">$4</a>', $data);
			}
			return $data;
		}
		
		/* Getters and Setters */
		function setFormID($form_id) { $this->form_id = $form_id; }
		function setFormPage($form_page) { $this->form_page = $form_page; }
		function setDataTime($data_time) { $this->data_time = $data_time; }
		function setDataArray($data_array) { $this->data_array = $data_array; }
		function setEncodedData($encoded_data) { $this->encoded_data = $encoded_data; }
		function setPrivateArray($private_array){ $this->private_array = $private_array; }
		function setEncryptedData($encrypted_data) { $this->encrypted_data = $encrypted_data; }
		
		function getFormID() { return $this->form_id; }
		function getFormPage() { return $this->form_page; }
		function getDataTime() { return $this->data_time; }
		function getDataArray() { return $this->data_array; }
		function getPrivateArray(){ return $this->private_array; } 
		function getEncodedData() { return $this->encoded_data; }
		function getEncryptedData() { return $this->encrypted_data; }
				
		/* Debug function */
		
		function printAll() {
			?><div style="margin-left:30px;">
<b>BEGIN User Data Object</b><br />
---------------------------------<br />
Form ID: <?php echo $this->getFormID(); ?><br />
Form Page: <?php echo $this->getFormPage(); ?><br />
Data Time: <?php echo $this->getDataTime(); ?><br />
Data Array: <?php print_r($this->getDataArray()); ?><br />
Encoded Array: <?php print_r($this->getEncodedData()); ?><br />
//pgpchk
Encrypted Array: <?php print_r($this->getEncryptedData()); ?><br />

---------------------------------<br />
<b>END User Data Object</b></div>
<?php
		}
	}
}
?>