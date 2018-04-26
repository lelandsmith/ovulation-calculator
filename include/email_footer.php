</div>
														</td>
													</tr>
												</table>
												<!-- End Content -->
											</td>
										</tr>
									</table>
									<!-- End Body -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top" style="background-color:#9d8a78;">
									<!-- Footer -->
									<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
										<tr>
											<div class="footer-box" style="display:flex;padding-top:20px;padding-bottom:20px;font-family:'WOFF2 Juli Sans-Regular';">
												<div class="col-1" style="text-align:left;padding-left:15px;padding-right:15px;padding-top:0;color: #ccc;float:left;width:60%">
													<?php printf(__('<h2 style="margin-top:0;">%s</h2>', 'ovulation-calculator'), $options['oc-email-footer-title']);?>
													<?php printf(__('<p class="subtitle" style="padding-bottom:20px;line-height:1.3;">%s</p>', 'ovulation-calculator'), $options['oc-email-footer-subtitle']);?>
													<?php printf(__('<p style="line-height:1.5;">%s</p>', 'ovulation-calculator'), $options['oc-email-footer-tel']);?>
													<a style="color:#ccc;text-decoration: none;" href="mailto:<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-footer-email']);?>"><?php printf(__('<p>E-mail: %s</p>', 'ovulation-calculator'), $options['oc-email-footer-email']);?></a>
												
												</div>
												<div class="col-2" style="float:left;">
													<img src="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-person-image']);?>" alt="lady picture" width="200" height="200">
												</div>
											</div>
										</tr>
										<tr>
											<td valign="top"><hr style="border-bottom: 1px solid #ccc;"></td>
										</tr>
										<tr>
											<td valign="top">
												<table border="0" cellpadding="10" cellspacing="0" width="100%">
													<tr>
														<div class="footer-logo" style="text-align:center;padding-top:20px;padding-bottom:20px;"><img src="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-footer-logo']);?>" alt="Babyplan Logo" width="150" height="26"></div>
	<div class="copyright" style="text-align:center;color:#ccc;font-family:'WOFF2 Juli Sans-Regular';"><?php printf(__('<p>%s</p>', 'ovulation-calculator'), $options['oc-email-footer-copyright']);?></div>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td valign="top">
												<table border="0" cellpadding="10" cellspacing="0" width="100%">
													<tr>
										<div class="footer_bottom" style="color:#ccc;text-align:center;padding-top:20px;padding-bottom:20px;">
									<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-footer-bottom']);?>
												</div>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<!-- End Footer -->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
