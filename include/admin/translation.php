<h1 class="screen-reader-text">Calendar Language Translation</h1>
<p class="description">This is where you translate Calendar.</p>
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
		<th scope="row"><?php _e('Message below the Calendar', 'ovulationcalculator-group');?></th>
		<td>
			<textarea name="ovulationcalculator-group[oc-message]" class="large-text" rows="10" cols="50"><?php echo (!empty($options['oc-message'])) ?  $options['oc-message'] : ''?></textarea>
			<p class="description">Message below the Calendar</p>
		</td>
		</tr>
	</tbody>
</table>