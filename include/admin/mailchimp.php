<h1 class="screen-reader-text">MailChimp</h1>
<h2>Enter MailChimp's few details so that we can register email to MailChimp's lists.</h2>

<table class="form-table">
	<tbody>
		<tr valign="top">
		<th scope="row"><?php _e('MailChimp API Key', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-mailchimp-api]" value="<?php echo (!empty($options['oc-mailchimp-api'])) ?  $options['oc-mailchimp-api'] : ''?>" class="regular-text" required/>
			<p class="description">Enter MailChimp API Key</p>
			<p class="help"><a href="https://kb.mailchimp.com/integrations/api-integrations/about-api-keys" target="_blank">How to find out API Key</a> </p>
		</td>
		</tr>
		
		<tr valign="top">
		<th scope="row"><?php _e('MailChimp Unique ID for List', 'ovulationcalculator-group');?></th>
		<td>
			<input type="text" name="ovulationcalculator-group[oc-mailchimp-list-id]" value="<?php echo (!empty($options['oc-mailchimp-list-id'])) ?  $options['oc-mailchimp-list-id'] : ''?>" class="regular-text" required/>
			<p class="description">Enter MailChimp Unique ID for List</p>
			<p class="help"><a href="https://docs.betheme.me/article/33-getting-mailchimp-api-key-and-list-id" target="_blank">How to find out Unique ID for List</a> </p>
		</td>
		</tr>

		
		
		
	</tbody>
</table>
