<?php 
	$Subject = "Email from " . $oc_email_field;
		
	$headers = array('Content-Type: text/html; charset=UTF-8');
	
	ob_start();
	// Include header contents
    include( plugin_dir_path( __FILE__ ) . 'email_header.php'); 
	
	$Body = "";?>
	
	<div class="download-ebook">
		<h2>Get a copy of the Babyplan Guide to Pregnancy here:</h2>
			<div class="download-btn-parent">
				<div class="download-btn">	
					<a href="#" id="downloadEbook">Download e-book <img id="rightArrow" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'include/img/right.png';?>"></a>
				</div>
			</div>
	</div>
	
	<?php include( plugin_dir_path( __FILE__ ) . 'email_footer.php'); 
	
	$Body .= ob_get_clean();
		
	$message_sent = wp_mail($oc_email_field, $Subject, $Body, $headers);
	if($message_sent){
		echo '<p class="oc_subtitle" style="text-align:center;border-bottom:1px solid;padding-bottom:1rem;">E-mail is sent.</p>';
		return true;
		
	}else{
		echo '<p class="oc_subtitle" style="text-align:center;border-bottom:1px solid;padding-bottom:1rem;">E-mail is not sent!</p>';
		return true;
	}
?>