<?php 
	$Subject = "Email from " . $oc_email_field;
		
	$headers = array('Content-Type: text/html; charset=UTF-8');
	
	// Include header contents
    include( plugin_dir_path( __FILE__ ) . 'email_header.php'); 
	
	
	$Body = "";
	//$Body .= "Your email: ";
	//$Body .= $oc_email_field;
	//$Body .= "<br/>";
	//$Body .= "Subscription: ";
	//$Body .= $oc_subscribe;
	//$Body .= "<br/>";
	$Body .= "<h2>Here is your 6 month Period dates:</h2>";
	$Body .= "<br/>";
		$Body .= "<b>Period 1:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$period_results[0].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$period_results[4].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Period 2:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$period_results[5].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$period_results[9].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Period 3:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$period_results[10].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$period_results[14].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Period 4:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$period_results[15].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$period_results[19].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Period 5:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$period_results[20].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$period_results[24].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Period 6:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$period_results[25].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$period_results[29].'</b>';
	$Body .= "<br/>";
	
	$Body .= "<h2>Here is your 6 month Ovulation dates:</h2>";
	$Body .= "<br/>";
		$Body .= "<b>Ovulation 1:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$fertile_results[0].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$fertile_results[4].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Ovulation 2:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$fertile_results[5].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$fertile_results[9].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Ovulation 3:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$fertile_results[10].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$fertile_results[14].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Ovulation 4:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$fertile_results[15].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$fertile_results[19].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Ovulation 5:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$fertile_results[20].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$fertile_results[24].'</b>';
		$Body .= "<br>";
		$Body .= "<b>Ovulation 6:&nbsp;&nbsp;&nbsp;&nbsp;</b>";
		$Body .= '<b>'.$fertile_results[25].'</b>';
		$Body .= " - ";
		$Body .= '<b>'.$fertile_results[29].'</b>';
	
	echo $Body;?>
	
	<div class="download-ebook">
		<h2>Get a copy of the Babyplan Guide to Pregnancy here:</h2>
			<div class="download-btn-parent">
				<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>
				<div class="download-btn">	
					<a href="#" id="downloadEbook">Download e-book</a>
				</div>
			</div>
	</div>
	
	
	<?php include( plugin_dir_path( __FILE__ ) . 'email_footer.php'); 
	
	//echo '<pre>';
	//print_r($fertile_results);
	//echo '</pre>';
	
		
	//if(wp_mail($oc_email_field, $Subject, $Body, $headers)){
	//	return true;
	//};
?>