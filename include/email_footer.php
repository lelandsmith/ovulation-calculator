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
								<td align="center" valign="top" style="background-color:#9d8a78;padding:0 0 2rem;">
									<!-- Footer -->
									<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
										<tr>
											<div class="footer-box">
												<div class="col-1">
													<?php printf(__('<h2>%s</h2>', 'ovulation-calculator'), $options['oc-email-footer-title']);?>
													<?php printf(__('<p class="subtitle">%s</p>', 'ovulation-calculator'), $options['oc-email-footer-subtitle']);?>
													<?php printf(__('<p>%s</p>', 'ovulation-calculator'), $options['oc-email-footer-tel']);?>
													<a href="mailto:<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-footer-email']);?>"><?php printf(__('<p>E-mail: %s</p>', 'ovulation-calculator'), $options['oc-email-footer-email']);?></a>
												
												</div>
												<div class="col-2">
													<img src="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-person-image']);?>" alt="lady picture" width="200">
												</div>
											</div>
										</tr>
										<tr>
											<td valign="top"><hr></td>
										</tr>
										<tr>
											<td valign="top">
												<table border="0" cellpadding="10" cellspacing="0" width="100%">
													<tr>
														<div class="footer-logo"><img src="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-footer-logo']);?>" alt="Babyplan Logo" width="100"></div>
														<div class="copyright"><p><?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-footer-copyright']);?></p></div>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<div class="footer_bottom">
													<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-footer-bottom']);?>
												</div>
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
