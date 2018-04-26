<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
		
		<style type="text/css">
			@media screen {
				@font-face { font-family: 'WOFF Juli Sans-Regular'; src: url('<?php echo plugin_dir_url( dirname( __FILE__ ) ) .'fonts/JuliSans-Regular.woff'?>'); }
				@font-face { font-family: 'WOFF Juli Sans-Medium'; src: url('<?php echo plugin_dir_url( dirname( __FILE__ ) ) .'fonts/JuliSans-Medium.woff'?>'); }
			}
			
			/* CLIENT-SPECIFIC STYLES */
		    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
		    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
		    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */
		
		    /* RESET STYLES */
		    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
		    table{border-collapse: collapse !important;}
		    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; font-family: "WOFF2 Juli Sans-Regular"; }
		
		    /* iOS BLUE LINKS */
		    a[x-apple-data-detectors] {
		        color: inherit !important;
		        text-decoration: none !important;
		        font-size: inherit !important;
		        font-family: inherit !important;
		        font-weight: inherit !important;
		        line-height: inherit !important;
		    }
		    /* ANDROID CENTER FIX */
			div[style*="margin: 16px 0;"] { margin: 0 !important; }
			
			#header_wrapper h1{
				font-family: "WOFF Juli Sans-Medium"; 
				font-size: 35px;
				margin: 0;
				padding: 1rem 0;
				color: #9E8977;
				text-align: center;
				line-height: 1.25;
			}
			h2{
				font-family: "WOFF Juli Sans-Regular"; 
				font-size: 1.2rem;
				color: #000;
				line-height: 1.25;
				margin: 0;
				padding: 1.5em 0 0;
			}
			div#body_content_inner{
				text-align: center;
			}
			.download-ebook{
				padding: 0 0 2em;
			}
			.download-ebook h2{
				padding-bottom: 1em;
				padding-top: 0;
				font-weight: normal;
				text-align: left;
				padding-left: 30px;
			}
			.download-btn{
				text-align: center;
				padding: 0;
				position: relative;
			}
			.download-btn-parent{
				position: relative;
			}
			#downloadEbook{
				width: 100%;
				border-radius: 5px;
				background-color: #a8d1af;
				color: #fff;
				font-family: "WOFF2 Juli Sans-Regular"; 
				font-size: 16px;
				padding: 0.5em 0;
				border: 0;
				box-shadow: none;
				cursor: pointer;
				display: inline-block;
				line-height: 2;
				text-shadow: none;
				text-decoration: none;
			}
			
			.footer-box {
				display: flex;
				padding: 1rem;
			}
			.footer-box .col-1{
				text-align: left;
				padding-left: 15px;
				padding-right: 15px;
				padding-top: 15px;
				flex:1;
			}
			
			.footer-box .col-1 h2,
			.footer-box .col-1 p{
				text-align: left;
				color: #ccc;
			}
			.footer-box .col-1 h2{
				padding-top: 0;
				margin-bottom: 1em;
				color: #fff;
			}
			.footer-box .col-1 p.subtitle{
				margin-bottom: 20px;
			}
			.footer-box .col-1 p{
				margin-bottom: 0;
				font-size: 14px;
			}
			.footer-box .col-1 a{
				color: #ccc;
				text-decoration: none;
				box-shadow: none;
			}
			
			.footer-logo,
			.copyright{
				text-align: center;
			}
			.copyright p{
				font-family: "WOFF2 Juli Sans-Regular"; 
				font-style: italic;
				color: #ccc;
				font-size: 12px;
				margin: 1.5em 0 0;
			}
			.footer_bottom p,
			.footer_bottom a,
			.footer_bottom{
				text-align: center;
				color: #ccc;
				font-size: 12px;
			}
			
			.footer_bottom p{
				margin: 0;
			}
			.footer_bottom a{
				box-shadow: none;
				text-decoration: underline;
			}
			.footer_bottom a:focus,
			.footer_bottom a:active,
			.footer_bottom a:hover{
				box-shadow: none;
				color: #fff;
			}
			b{
				font-family: "WOFF Juli Sans-Medium";
			}
			table{
				margin: 0;
			}
			tr{
				border: 0;
			}
			.email-ovulation-dates h2 {
				padding-bottom: 1em;
				padding-left: 50px;
				font-weight: normal;
			}
			.six-month-dates {
				padding-left: 80px;
			}
			hr{
				border-bottom: 1px solid #ccc;
			}
			#rightArrow{
				vertical-align: middle;
				float: right;
			}
		</style>
	</head>
	<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'?>">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="left" valign="top">
						<div id="template_header_logo">
					<img src="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-logo']);?>" alt="" width="250" height="44">
						</div>
						<div id="template_header_image">
					<img src="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-header-image']);?>" alt="" width="600">
						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container">
							<tr>
								<td align="left" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header">
										<tr>
											<td id="header_wrapper" style="font-family:'WOFF Juli Sans-Medium';">
												<?php printf(__('<h1 style="font-size:35px;margin:0;padding-top:20px;padding-bottom:20px;color:#9E8977;text-align:center;line-height:1.25;">%s</h1>', 'ovulation-calculator'), $options['oc-email-header-title']);?>
											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
							
							<tr>
								<td align="left" valign="top">
									<div class="email-ovulation-dates">
										<?php printf(__('<h2 style="padding-bottom:20px;padding-left:50px;font-weight:normal;margin-bottom:0;">%s</h2>', 'ovulation-calculator'), $options['oc-email-header-ovulation-dates']);?>
										<div class="six-month-dates" style="padding-left: 80px;">
											<b><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-header-ovulation-text']);?> 1:&nbsp;&nbsp;&nbsp;&nbsp;</b>
											<b><?php echo $fertile_result_for_email[0]?></b>
											<b> - </b>
											<b><?php echo $fertile_result_for_email[5]?></b>
											<br>
											<b><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-header-ovulation-text']);?> 2:&nbsp;&nbsp;&nbsp;&nbsp;</b>
											<b><?php echo $fertile_result_for_email[6]?></b>
											<b> - </b>
											<b><?php echo $fertile_result_for_email[11]?></b>
											<br>
											<b><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-header-ovulation-text']);?> 3:&nbsp;&nbsp;&nbsp;&nbsp;</b>
											<b><?php echo $fertile_result_for_email[12]?></b>
											<b> - </b>
											<b><?php echo $fertile_result_for_email[17]?></b>
											<br>
											<b><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-header-ovulation-text']);?> 4:&nbsp;&nbsp;&nbsp;&nbsp;</b>
											<b><?php echo $fertile_result_for_email[18]?></b>
											<b> - </b>
											<b><?php echo $fertile_result_for_email[23]?></b>
											<br>
											<b><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-header-ovulation-text']);?> 5:&nbsp;&nbsp;&nbsp;&nbsp;</b>
											<b><?php echo $fertile_result_for_email[24]?></b>
											<b> - </b>
											<b><?php echo $fertile_result_for_email[29]?></b>
											<br>
											<b><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-header-ovulation-text']);?> 6:&nbsp;&nbsp;&nbsp;&nbsp;</b>
											<b><?php echo $fertile_result_for_email[30]?></b>
											<b> - </b>
											<b><?php echo $fertile_result_for_email[35]?></b>
											<br>
										</div>
									</div>
								</td>		
							</tr>
							
							<tr>
								<td align="left" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
										<tr>
											<td valign="top" id="body_content">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top">
															<div id="body_content_inner">