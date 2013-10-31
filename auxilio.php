<?php
   /* mysql_connect( 'cafweb.db.7141211.hostedresource.com', 'cafweb', 'Caf2011.0', true ); 
    @mysql_select_db('cafweb') or die( "Unable to select database");
	 //wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
	$query = "Select * from wp_options where option_value = 'http://localhost/CAF/'";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	$i=0;
	while ($i<$num){
		$option_name= mysql_result($result,$i,"option_name");	
		$option_value= mysql_result($result,$i,"option_value");	
		echo "<p>".$option_name . " - ".$option_value."</p>";
		$i++;
	}
	$query = "UPDATE wp_options SET option_value = 'http://www.cafsantaclotilde.org.ar/'  where option_value='http://localhost/CAF/'";
	mysql_query($query);
	mysql_close();*/
  phpinfo();
?>
