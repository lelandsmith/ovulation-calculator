<?php 
	$Subject = "Email from " . $oc_email_field;
		
	$headers = array('Content-Type: text/html; charset=UTF-8');
	
	ob_start();
	// Include header contents
    include( plugin_dir_path( __FILE__ ) . 'email_header.php'); 
	
	$Body = "";?>
	
	<div class="download-ebook">
		<?php if(!empty($options['oc-email-guide'])):
			printf(__('<h2>%s</h2>', 'ovulation-calculator'), $options['oc-email-guide']);
		endif;?>
			<div class="download-btn-parent">
				<div class="download-btn">	
					<a href="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-download-url'])?>" id="downloadEbook"><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-download'])?> <img id="rightArrow" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'include/img/right.png';?>"></a>
				</div>
			</div>
	</div>
	
	<?php include( plugin_dir_path( __FILE__ ) . 'email_footer.php'); 
	
	$Body .= ob_get_clean();
	
	echo $Body;
		
	$message_sent = wp_mail($oc_email_field, $Subject, $Body, $headers);
	if($message_sent):?>
		<p class="oc_subtitle emailResponse"><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-sent-msg'])?></p>
		<?php return true;
		
	else:?>
		<p class="oc_subtitle emailResponse">E-mail is not sent!</p>
		<?php return true;
	endif;
?>