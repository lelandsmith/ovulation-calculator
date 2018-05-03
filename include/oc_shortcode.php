<?php 
// Get option values from Database. Option Value name is : ovulationcalculator-group
$options = get_option('ovulationcalculator-group');


function syncMailchimp($data) {
	
	$options = get_option('ovulationcalculator-group');
	
    if(!empty($options['oc-mailchimp-api'])):
    	$apiKey = $options['oc-mailchimp-api'];
    endif;
    
    if(!empty($options['oc-mailchimp-list-id'])):
    	$listId = $options['oc-mailchimp-list-id'];
    endif;

    $memberId = md5(strtolower($data['email']));
    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

    $json = json_encode([
        'email_address' => $data['email'],
        'status'        => $data['status'], // "subscribed","unsubscribed","cleaned","pending"
        'merge_fields'  => [
            'MMERGE5' => $data['newsletter']
        ]
    ]);

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

	curl_exec($ch);
    
    //$responseData = json_decode($response, TRUE);
	// Print the date from the response
	//echo '<pre>';
	//print_r($responseData);  
	//echo '</pre>'; 
    
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    curl_close($ch);
    
    if ($httpCode == 200) {
	    printf(__('<p class="oc_subtitle mailchimpResponse">%s</p>', 'ovulation-calculator'), 'You have successfully subscribed.');
	    $GLOBALS['message_sent'] = 1;
	}else{
		switch ($httpCode) {
			case 214:
				printf(__('<p class="oc_subtitle mailchimpResponse">%s</p>', 'ovulation-calculator'), 'You are already subscribed.');
				$GLOBALS['message_sent'] = 0;
				break;
			case 400:
				printf(__('<p class="oc_subtitle mailchimpResponse">%s</p>', 'ovulation-calculator'), 'MailChimp could not understand the request due to invalid syntax. Check your email address.');
				$GLOBALS['message_sent'] = 0;
				break;
			case 401:
				printf(__('<p class="oc_subtitle mailchimpResponse"><b>Error Code:</b> %s</p>', 'ovulation-calculator'), $httpCode);
				printf(__('<p class="oc_subtitle mailchimpResponse">%s</p>', 'ovulation-calculator'), 'APIKeyMissing: Your request did not include an API key. <br>OR<br/> APIKeyInvalid: Your API key may be invalid, or you’ve attempted to access the wrong data center.');
				$GLOBALS['message_sent'] = 0;
				break;
			default:
				printf(__('<p class="oc_subtitle mailchimpResponse">%s</p>', 'ovulation-calculator'), 'Unexpected HTTP code: '. $httpCode.'');
				$GLOBALS['message_sent'] = 0;
				break;
 		}
	}
        
    
    
    //return $httpCode;
}


if(!empty($_POST['emailsend'])):
	
		$oc_email_field = sanitize_email($_POST['oc_email']);
	
		// Starts Mailchimp integration		
		$data = [
		    'email'     => $oc_email_field,
		    'status'    => 'subscribed',
		    'newsletter'	=> '1'
		];
		
		syncMailchimp($data);
		// End Mailchimp 		
		
		
		//echo $oc_email_field;
		
		if (isset($_POST['oc_subscribe'])) {
			$oc_subscribe	= $_POST['oc_subscribe'];
			//echo $oc_subscribe;
		}else{
			$oc_subscribe = "No";
			//echo $oc_subscribe;
		}
		$fertile_results = get_option('oc_fertile_result');
		//$period_results = get_option('oc_period_result');
		
		
		$fertile_result_for_email = array_reduce($fertile_results, 'array_merge', array());
		
		//echo '<pre>';
		//print_r($fertile_result_for_email);
		//echo '</pre>';
		
		
		// mail function
		include( plugin_dir_path( __FILE__ ) . 'email_template.php');
endif;?>


<div class="oc_heading">
	<?php if(!empty($options['ovulation-calculator'])):
		printf(__('<h1 class="oc_title">%s</h1>', 'ovulation-calculator'), $options['ovulation-calculator']);
	else:
		printf(__('<h1 class="oc_title">Ovulation Calculator</h1>', 'ovulation-calculator'));
	endif;
	
	if(!empty($options['pregnancy-greatest'])):
		printf(__('<p class="oc_subtitle">%s</p>', 'ovulation-calculator'), $options['pregnancy-greatest']);
	else:
		printf(__('<p class="oc_subtitle">When are your chances of pregnancy greatest?</p>', 'ovulation-calculator'));
	endif;?>
</div>



<?php function check_available_date($firstday, $next_period, $selected_period_date){
	
	$keep_all_dates = array();
	$keep_period_dates = array();
	for($month_count = 1; $month_count<=6; $month_count++){ // 6 months result
		
		$start = strtotime($firstday);
		
		$selected_period_d = strtotime($selected_period_date);
		
		$dates=array();

		$dates_period = array();
		
		if($_POST['days'] == 20):
			$count = 3;
		elseif($_POST['days'] == 21):
			$count = 4;
		else:
			$count = 5;
		endif;
		
		// Calculate Fertitle days 6
		for($i = 0; $i<=$count; $i++){
			array_push($dates,date('F d, Y', strtotime("+$i day", $start)));
			$new_format_date = date("d/m/Y", strtotime($dates[$i]));
		}
		
		$add_days = $_POST['days']-$count; // minus 5 from selected cycle 
		$last_fertile_day = $dates[$count];
		$next_fertile_day = date('F d, Y',strtotime($last_fertile_day) + (24*3600*$add_days));
		
		array_push($keep_all_dates,$dates);
		
		$firstday = $next_fertile_day;
		
		
		
		// Calculate period 5 days
		for($x = 0; $x<=4; $x++){
			array_push($dates_period,date('F d, Y', strtotime("+$x day", $selected_period_d)));
			$new_format_period_date = date("d/m/Y", strtotime($dates_period[$x]));
		
		}
		$add_period_days = $_POST['days']-4; // minus 4 from selected cycle
		$last_period_day = $dates_period[4];
		$next_period_day = date('F d, Y',strtotime($last_period_day) + (24*3600*$add_period_days));
		
		array_push($keep_period_dates,$dates_period);
		
		$selected_period_date = $next_period_day;
	}
	
	
	//var_dump(array_reduce($keep_all_dates, 'array_merge', array()));
	
	//$result = array_reduce($keep_all_dates, 'array_merge', array()); // fertile
	
	//$period_result = array_reduce($keep_period_dates, 'array_merge', array()); // periods
	
	
	
	update_option('oc_period_result', $keep_period_dates, '', 'no');
	update_option('oc_fertile_result', $keep_all_dates, '', 'no');
		
	// Fertile
	$fertile_from_db = get_option('oc_fertile_result');
	$result = array_reduce($fertile_from_db, 'array_merge', array());
	
	
	// Period
	$period_from_db = get_option('oc_period_result');
	
	$period_result = array_reduce($period_from_db, 'array_merge', array());
			
	$options = get_option('ovulationcalculator-group');
	
	?>
		
		
		<script>
			$ = jQuery.noConflict();
			$(function ($) {
			$(document).ready(function() {	  
				
				var fertileDays = <?php echo '["' . implode('", "', $result) . '"]' ?>;
				var periodDays = <?php echo '["' . implode('", "', $period_result) . '"]' ?>;
				
				var monthOne = "<?php echo $options['oc-january'] ?>";
				var monthTwo = "<?php echo $options['oc-feb'] ?>";
				var monthThree = "<?php echo $options['oc-mar'] ?>";
				var monthFour = "<?php echo $options['oc-apr'] ?>";
				var monthFive = "<?php echo $options['oc-may'] ?>";
				var monthSix = "<?php echo $options['oc-jun'] ?>";
				var monthSeven = "<?php echo $options['oc-jul'] ?>";
				var monthEight = "<?php echo $options['oc-aug'] ?>";
				var monthNine = "<?php echo $options['oc-sep'] ?>";
				var monthTen = "<?php echo $options['oc-oct'] ?>";
				var monthEleven = "<?php echo $options['oc-nov'] ?>";
				var monthTweleve = "<?php echo $options['oc-dec'] ?>";
				
				var dayOne = "<?php echo $options['oc-mon'] ?>";
				var dayTwo = "<?php echo $options['oc-tue'] ?>";
				var dayThree = "<?php echo $options['oc-wed'] ?>";
				var dayFour = "<?php echo $options['oc-thu'] ?>";
				var dayFive = "<?php echo $options['oc-fri'] ?>";
				var daySix = "<?php echo $options['oc-sat'] ?>";
				var daySeven = "<?php echo $options['oc-sun'] ?>";
								
				$('#datepicker').datepicker({
					
					monthNames: [ monthOne,monthTwo,monthThree,monthFour,monthFive,monthSix, monthSeven,monthEight,monthNine,monthTen,monthEleven,monthTweleve ],
					dayNamesMin: [ daySeven,dayOne,dayTwo,dayThree,dayFour,dayFive,daySix ],
					
					firstDay: 1, // Monday
					showOtherMonths: true,
					selectOtherMonths: true,
					beforeShowDay: function (date) {
			            //convert the date to a string format same as the one used in the array
			            var string = $.datepicker.formatDate('MM dd, yy', date)
			            if ($.inArray(string, fertileDays) > -1) {
			               return [false, 'fertileDay', ''];
			           }else if($.inArray(string, periodDays) > -1){	
			           		return [false, 'periodDay', ''];
			           }else {
			             return [false, '', ''];
			           }	
			        }
				});	
				
			});
		});
		</script>	
<?php } // Function ends here

if(!empty($_POST['calculator_ok'])):

	$fulldate = $_POST['something'];
	
	$dateparts = explode("/",$fulldate);
	
	$day= $dateparts[0];
	$month= $dateparts[1];
	$year= $dateparts[2];
	
	//echo $day;
	//echo $month;
	//echo $year;
	
	
	//convert to time
	$lasttime=mktime(0,0,0,$month,$day,$year);
	
	$selected_period_date = date("F d, Y",$lasttime);
	
	
	// next period start
    $next_period=$lasttime + $_POST['days']*24*3600;
    $next_period=date("F d, Y",$next_period);
    
	
    
	//first fertile day
	if($_POST['days'] == 20):
		$firstdaytime = $lasttime + $_POST['days']*24*3600 - 15*24*3600;
	elseif($_POST['days'] == 21):
		$firstdaytime = $lasttime + $_POST['days']*24*3600 - 16*24*3600;
	else:
		$firstdaytime = $lasttime + $_POST['days']*24*3600 - 17*24*3600;
	endif;
	
	$firstday = date("F d, Y",$firstdaytime);
	
	//last fertile day
	$lastdaytime=$lasttime + $_POST['days']*24*3600 - 12*24*3600;
	$lastday=date("F d, Y",$lastdaytime);
		
	?>
	<div class="calculator_table">
		<div class="calendar-area">
			<?php if(!empty($options['oc-dates'])):
				printf(__('<h2>%s</h2>', 'ovulation-calculator'), $options['oc-dates']);
			endif;
			if(!empty($options['oc-next-month-results'])):
				printf(__('<p>%s</p>', 'ovulation-calculator'), $options['oc-next-month-results']);
			endif;?>
			
			<?php check_available_date($firstday, $next_period, $selected_period_date);?>
			
			<?php if($_POST['days'] == 20):?>
				<style>
					td.fertileDay-2 span,
					td.fertileDay-2 a.ui-state-default,
					td.fertileDay-6 span,
					td.fertileDay-6 a.ui-state-default{
						background-image: url( <?php echo plugins_url('img/filled-circle.svg', __FILE__ )?>)!important;
						opacity: 1!important;
						filter:Alpha(Opacity=100)!important;
						background-color: #96d2af!important;
					}
					td.fertileDay-4 span,
					td.fertileDay-4,
					td.fertileDay-4 a.ui-state-default{
						background-image: url( <?php echo plugins_url('img/tick.svg', __FILE__ )?>)!important;;
/* 						opacity: 0.89!important; */
/* 						filter:Alpha(Opacity=89)!important; */
					}
				</style>	
			<?php elseif($_POST['days'] == 21):?>
				<style>
					td.fertileDay-3 span,
					td.fertileDay-3 a.ui-state-default,
					td.fertileDay-8 span,
					td.fertileDay-8 a.ui-state-default{
						background-image: url( <?php echo plugins_url('img/filled-circle.svg', __FILE__ )?>)!important;
						opacity: 1!important;
						filter:Alpha(Opacity=100)!important;
						background-color: #96d2af!important;
					}
					td.fertileDay-4 span,
					td.fertileDay-4,
					td.fertileDay-4 a.ui-state-default{
						background-image: url( <?php echo plugins_url('img/tick.svg', __FILE__ )?>)!important;;
/* 						opacity: 0.89!important; */
/* 						filter:Alpha(Opacity=89)!important; */
					}
				</style>
			<?php endif;?>
			
			
			<div id="datepicker" class="ll-skin-melon"></div>
			<div class="fertile" style="padding-top: 1rem;">
				<a href="#"><img src="<?php echo plugins_url('/img/filled-circle.svg' , __FILE__ )?>" alt="Days of expected pvulation">&nbsp;&nbsp;&nbsp;<?php printf(__('%s', 'ovulation-calculator'), $options['oc-expected-ovulation']);?></a>
			</div>
			<div class="calculateagain">
				<div class="fertile">
					<a href="#"><img src="<?php echo plugins_url('/img/tick.svg' , __FILE__ )?>" alt="ovulation fertile">&nbsp;&nbsp;&nbsp;<?php printf(__('%s', 'ovulation-calculator'), $options['oc-fertile']);?></a>
				</div>
				<div class="calculateagainbtn">
					<i class="fa fa-calendar fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-change-date']);?>" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'];?><?php echo $_SERVER['REQUEST_URI']?>'">
				</div>
			</div>
			<div class="fertile">
				<a href="#"><img src="<?php echo plugins_url('/img/period.png' , __FILE__ )?>" alt="Start of new cycle">&nbsp;&nbsp;&nbsp;<?php printf(__('%s', 'ovulation-calculator'), $options['oc-start-ovulation']);?></a>
			</div>
		</div>
		<div class="email-area">
			<div class="email-message">
				<?php if(!empty($options['oc-calendar-email'])):
					printf(__('<h2>%s</h2>', 'ovulation-calculator'), $options['oc-calendar-email']);
				endif;
				if(!empty($options['oc-send-dates-email'])):
					printf(__('<p>%s</p>', 'ovulation-calculator'), $options['oc-send-dates-email']);
				endif;?>
			</div>
			<form method="post" id="ovulationCalculatorEmail" name="emailSubmitForm" autocomplete="on">
				<div class="email-box">
				<input type="email" name="oc_email" id="ocEmail" placeholder="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-enter-email']);?>"/>
				<?php if(!empty($options['oc-download-message'])):
					printf(__('<p>%s</p>', 'ovulation-calculator'), $options['oc-download-message']);
				endif;?>
				<div class="subscription-option">
					<input type="checkbox" id="subscribeNews" name="oc_subscribe" value="yes" checked >
					<label for="subscription"><?php printf(__('%s', 'ovulation-calculator'), $options['oc-terms-message']);?></label>
				</div>
				
				<i class="fa fa-angle-right fa-4x" aria-hidden="true"></i>
				<div class="submit-btn"><input type="submit" name="emailsend" id="emailsend" value="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-email-send']);?>"/></div>
			</div>
			</form>
		</div>
	</div>
<?php else: //the calculator comes here ?>
	<script>
			
		$ = jQuery.noConflict();
		$(function ($) {
			$(document).ready(function() {
				
				var monthOne = "<?php echo $options['oc-january'] ?>";
				var monthTwo = "<?php echo $options['oc-feb'] ?>";
				var monthThree = "<?php echo $options['oc-mar'] ?>";
				var monthFour = "<?php echo $options['oc-apr'] ?>";
				var monthFive = "<?php echo $options['oc-may'] ?>";
				var monthSix = "<?php echo $options['oc-jun'] ?>";
				var monthSeven = "<?php echo $options['oc-jul'] ?>";
				var monthEight = "<?php echo $options['oc-aug'] ?>";
				var monthNine = "<?php echo $options['oc-sep'] ?>";
				var monthTen = "<?php echo $options['oc-oct'] ?>";
				var monthEleven = "<?php echo $options['oc-nov'] ?>";
				var monthTweleve = "<?php echo $options['oc-dec'] ?>";
				
				var dayOne = "<?php echo $options['oc-mon'] ?>";
				var dayTwo = "<?php echo $options['oc-tue'] ?>";
				var dayThree = "<?php echo $options['oc-wed'] ?>";
				var dayFour = "<?php echo $options['oc-thu'] ?>";
				var dayFive = "<?php echo $options['oc-fri'] ?>";
				var daySix = "<?php echo $options['oc-sat'] ?>";
				var daySeven = "<?php echo $options['oc-sun'] ?>";

				
				
				
				
				$('#calendar').datepicker({	  				  			  	
				  	monthNames: [ monthOne,monthTwo,monthThree,monthFour,monthFive,monthSix, monthSeven,monthEight,monthNine,monthTen,monthEleven,monthTweleve ],
					dayNamesMin: [ daySeven,dayOne,dayTwo,dayThree,dayFour,dayFive,daySix ],
				  	
				  	firstDay: 1, // Monday
				  	inline: true,
				  	showOtherMonths: true,
			    	dateFormat: "dd/mm/yy",
		            maxDate: 0,
			    	
			    	onSelect: function(dateText, inst) {
						$("input[name='something']").val(dateText);
						$(this).hide();
						$('#calculatorOk').prop('disabled',false);
						$('.calculator_table i.fa.fa-calendar').css('color', '#c1c1c1');
			    	}
		    	});
			});
		});
	</script>
	
	
	
	<div class="calculator_table">
		<form method="post" id="ovulationCalculatorForm" autocomplete="off">
			<?php if(!empty($options['calculate-ovulation'])):
				printf(__('<h2>%s</h2>', 'ovulation-calculator'), $options['calculate-ovulation']);
			endif;
			if(!empty($options['first-day-last-period'])):
				printf(__('<p>%s</p>', 'ovulation-calculator'), $options['first-day-last-period']);
			endif?>
			<i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
			<?php if(!empty($options['select-date'])):?>
			<input type="text" name="something" placeholder="<?php printf(__('%s', 'ovulation-calculator'), $options['select-date']);?>..." id="calendarInput" readonly/>
			<?php endif?>
			<div id="calendar" class="ll-skin-melon"></div>
			
			<?php if(!empty($options['length-cycle'])):
				printf(__('<p>%s</p>', 'ovulation-calculator'), $options['length-cycle']);
			endif?>
			<select name="days">
				<?php
				for($i=20;$i<=45;$i++)
				{
					if($i==28) $selected='selected="true"';
					else $selected='';
					echo "<option $selected value='$i'>$i</option>";
				}
				?>
			</select>
			<i class="fa fa-angle-right fa-4x" aria-hidden="true"></i>
			<div class="submit-btn">
				<?php if(!empty($options['oc-submit'])):?>
					<input type="submit" name="calculator_ok" id="calculatorOk" value="<?php printf(__('%s', 'ovulation-calculator'), $options['oc-submit'])?>">
				<?php endif?>
			</div>
		</form>
	</div>
<?php endif;?>