<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo get_bloginfo( 'name', 'display' ); ?></title>
		<style type="text/css">
			
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
			
			@font-face { font-family: 'WOFF Juli Sans-Regular'; src: url('../fonts/JuliSans-Regular.woff'); }
			@font-face { font-family: 'WOFF Juli Sans-Medium'; src: url('../fonts/JuliSans-Medium.woff'); }
			
			#header_wrapper h1{
				font-family: "WOFF Juli Sans-Medium"; 
				font-size: 35px;
				margin: 0;
				padding: 0;
				color: #9E8977;
				text-align: center;
				line-height: 1.25
			}
			h2{
				font-family: "WOFF Juli Sans-Regular"; 
				font-size: 1.2rem;
				color: #000;
				line-height: 1.25;
				margin: 0;
				padding: 1.5em 0 0;
				text-align: center;
			}
			div#body_content_inner{
				text-align: center;
			}
			.download-ebook{
				padding: 1.5em 0 0;
			}
			.download-ebook h2{
				padding-bottom: 1em;
				padding-top: 0;
			}
			.download-btn{
				text-align: center;
				padding: 0;
			}
			.download-btn-parent{
				position: relative;
			}
			.download-ebook i.fa.fa-angle-right{
				position: absolute;
				right: 20px;
				top:5px;
				color: #fff;
			}
			
			#downloadEbook{
				width: 100%;
				border-radius: 5px;
				background-color: #a8d1af;
				color: #fff;
				font-family: "WOFF2 Juli Sans-Regular"; 
				font-size: 16px;
				padding: 0.8em 2em;
				border: 0;
				box-shadow: none;
				cursor: pointer;
				display: inline-block;
				line-height: 1;
				text-shadow: none;
			}
			
			.footer-box {
				display: flex;
				padding: 1rem;
			}
			.footer-box .col-1{
				text-align: left;
				padding-left: 15px;
				padding-right: 15px;
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
				margin-bottom: 5px;
				font-size: 12px;
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
				margin: 1.5em 0;
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
		</style>
		
		
		
	</head>
	<body <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'?>">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="left" valign="top">
						<div id="template_header_logo">
							<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'include/img/Babyplan_LogoSmall_RGB.png';?>" alt="Babyplan Logo">
						</div>
						<div id="template_header_image">
							<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'include/img/email_header-image.jpg';?>" alt="Babyplan header image">
						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header">
										<tr>
											<td id="header_wrapper">
												<h1>Thanks for using the Babyplan Ovulation Calculator</h1>
											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
										<tr>
											<td valign="top" id="body_content">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top">
															<div id="body_content_inner">