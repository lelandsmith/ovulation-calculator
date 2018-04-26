<h1 class="screen-reader-text">Calendar Language Translation</h1>
<h2>This is where you translate Calendar.</h2>
<table class="form-table">
	<tbody>
		
		<tr valign="top">
		<th scope="row"><?php _e('Ovulation Calculator', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[ovulation-calculator]" value="<?php echo (!empty($options['ovulation-calculator'])) ?  $options['ovulation-calculator'] : 'Ovulation Calculator'?>" class="regular-text"/>
			<p class="description">Ovulation Calculator</p>
		</td>
		</tr>
		
		<th scope="row"><?php _e('When are your chances of pregnancy greatest?', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[pregnancy-greatest]" value="<?php echo (!empty($options['pregnancy-greatest'])) ?  $options['pregnancy-greatest'] : 'When are your chances of pregnancy greatest?'?>" class="regular-text"/>
			<p class="description">When are your chances of pregnancy greatest?</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Calculate ovulation', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[calculate-ovulation]" value="<?php echo (!empty($options['calculate-ovulation'])) ?  $options['calculate-ovulation'] : 'Calculate ovulation'?>" class="regular-text"/>
			<p class="description">Calculate ovulation</p>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php _e('First day of your last period', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[first-day-last-period]" value="<?php echo (!empty($options['first-day-last-period'])) ?  $options['first-day-last-period'] : 'First day of your last period'?>" class="regular-text"/>
			<p class="description">First day of your last period</p>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php _e('Select date...', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[select-date]" value="<?php echo (!empty($options['select-date'])) ?  $options['select-date'] : 'Select date'?>" class="regular-text"/>
			<p class="description">Select date</p>
		</td>
		</tr>
		
		
		<tr valign="top">
		<th scope="row"><?php _e('Length of your cycle', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[length-cycle]" value="<?php echo (!empty($options['length-cycle'])) ?  $options['length-cycle'] : 'Length of your cycle'?>" class="regular-text"/>
			<p class="description">Length of your cycle</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Submit', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-submit]" value="<?php echo (!empty($options['oc-submit'])) ?  $options['oc-submit'] : 'Submit'?>" class="regular-text"/>
			<p class="description">Submit</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('Your ovulation dates', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-dates]" value="<?php echo (!empty($options['oc-dates'])) ?  $options['oc-dates'] : 'Your ovulation dates'?>" class="regular-text"/>
			<p class="description">Your ovulation dates</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Press the arrow to see next month(s) result", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-next-month-results]" value="<?php echo (!empty($options['oc-next-month-results'])) ?  $options['oc-next-month-results'] : 'Press the arrow to see next month(s) result'?>" class="regular-text"/>
			<p class="description">Press the arrow to see next month(s) result</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Fertile", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-fertile]" value="<?php echo (!empty($options['oc-fertile'])) ?  $options['oc-fertile'] : 'Fertile'?>" class="regular-text"/>
			<p class="description">Fertile</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Change date", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-change-date]" value="<?php echo (!empty($options['oc-change-date'])) ?  $options['oc-change-date'] : 'Change date'?>" class="regular-text"/>
			<p class="description">Change date</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Send ovulation calendar by email", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-calendar-email]" value="<?php echo (!empty($options['oc-calendar-email'])) ?  $options['oc-calendar-email'] : 'Send ovulation calendar by email'?>" class="regular-text"/>
			<p class="description">Send ovulation calendar by email</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Enter your email and we'll send you your ovulation dates for the next 6 months.", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-send-dates-email]" value="<?php echo (!empty($options['oc-send-dates-email'])) ?  $options['oc-send-dates-email'] : 'Enter your email and we will send you your ovulation dates for the next 6 months.'?>" class="large-text"/>
			<p class="description">Enter your email and we'll send you your ovulation dates for the next 6 months.</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Enter your email", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-enter-email]" value="<?php echo (!empty($options['oc-enter-email'])) ?  $options['oc-enter-email'] : 'Enter your email'?>" class="regular-text"/>
			<p class="description">Enter your email</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Message ", "ovulationcalculator-group");?></th>
		<td>
			<textarea name="ovulationcalculator-group[oc-download-message]" placeholder="You will at the same time reveive a link to download our e-book Guide to Pregnancy and be subscribed to our newsletter about fertility. " class="large-text" rows="10" cols="50"><?php echo (!empty($options['oc-download-message'])) ?  $options['oc-download-message'] : ''?></textarea>
			<p class="description">Type Message in your own language</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Terms & Conditions", "ovulationcalculator-group");?></th>
		<td>
			<textarea name="ovulationcalculator-group[oc-terms-message]" placeholder="Yes, thank you. We may send you your ovulation calendar, a link to download our Guide to Pregnancy e-book and subscribe you to our newsletter from Babyplan. It is written for the sole purpose of increasing your chances of achieving pregnancy. It is released every 2 weeks, can be easily unsubscribed and is written in collaboration with a fertility expert from VivaNeo." class="large-text" rows="10" cols="50"><?php echo (!empty($options['oc-terms-message'])) ?  $options['oc-terms-message'] : ''?></textarea>
			<p class="description">Type Terms & Conditions in your own language</p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e("Send", "ovulationcalculator-group");?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-email-send]" value="<?php echo (!empty($options['oc-email-send'])) ?  $options['oc-email-send'] : 'Send'?>" class="small-text"/>
			<p class="description">Type Send in your own language</p>
		</td>
		</tr>
	</tbody>
</table>