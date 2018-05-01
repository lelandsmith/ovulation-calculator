<?php 
	$Subject = "Email from " . $oc_email_field;
		
	$headers = array('Content-Type: text/html; charset=UTF-8');
	
	ob_start();
	// Include header contents
    include( plugin_dir_path( __FILE__ ) . 'email_header.php'); 
	
	$Body = "";?>
		
	<div class="download-ebook" style="padding-bottom:20px;">
		<?php if(!empty($options['oc-email-guide'])):
			printf(__('<h2 style="padding-bottom:20px;padding-top:0;font-weight:normal;text-align:left;padding-left:30px;">%s</h2>', 'ovulation-calculator'), $options['oc-email-guide']);
		endif;?>
			<div class="download-btn-parent" style="position:relative;">
				<div class="download-btn" style="text-align:center;padding:0;position:relative;">	
					<a href="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-download-url'])?>" id="downloadEbook" style="width:100%;border-radius:5px;background-color:#a8d1af;color:#fff;font-family:'WOFF2 Juli Sans-Regular';font-size:16px;padding-top:10px;padding-bottom:10px;border:0;box-shadow:none;cursor:pointer;display:inline-block;line-height:2;text-shadow:none;text-decoration:none;"><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-download'])?> <img style="vertical-align:middle;float:right;" id="rightArrow" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'include/img/right.png';?>"></a>
				</div>
			</div>
	</div>
	
	<?php include( plugin_dir_path( __FILE__ ) . 'email_footer.php'); 
	
	$Body .= ob_get_clean();
	
	$response_stat = $GLOBALS['message_sent'];
	
	if($response_stat !=0):		
		$message_sent = wp_mail($oc_email_field, $Subject, $Body, $headers);
		if($message_sent):?>
			<p class="oc_subtitle emailResponse"><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-sent-msg'])?></p>
			<?php return true;
			
		else:?>
			<p class="oc_subtitle emailResponse">E-mail is not sent!</p>
			<?php return true;
		endif;
	endif;
?>