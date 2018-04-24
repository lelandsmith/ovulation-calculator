<?php 
// Get option values from Database. Option Value name is : ovulationcalculator-group
$options = get_option('ovulationcalculator-group');
	
if(!empty($_POST['emailsend'])):
	
		$oc_email_field = sanitize_email($_POST['oc_email']);
	
		//echo $oc_email_field;
		
		if (isset($_POST['oc_subscribe'])) {
			$oc_subscribe	= $_POST['oc_subscribe'];
			//echo $oc_subscribe;
		}else{
			$oc_subscribe = "No";
			//echo $oc_subscribe;
		}
		$fertile_results = get_option('oc-fertile_result');
		//$period_results = get_option('oc-period_result');
		
		
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
		
		
		for($i = 0; $i<=5; $i++){
			array_push($dates,date('F d, Y', strtotime("+$i day", $start)));
			
			array_push($dates_period,date('F d, Y', strtotime("+$i day", $selected_period_d)));
			
			//echo $dates[$i];
			//echo '<br>';
			$new_format_date = date("d/m/Y", strtotime($dates[$i]));
			
			$new_format_period_date = date("d/m/Y", strtotime($dates_period[$i]));
			
			
			//echo $new_format_date;
			//echo '<br>';
		}
		
		//echo '<br>';
		$add_days = $_POST['days']-5; // minus 5 from selected cycle 
		$last_fertile_day = $dates[5];
		$next_fertile_day = date('F d, Y',strtotime($last_fertile_day) + (24*3600*$add_days));
		
		array_push($keep_all_dates,$dates);
		
		$firstday = $next_fertile_day;
		
		
		
		$add_period_days = $_POST['days']-5; // minus 4 from selected cycle
		$last_period_day = $dates_period[5];
		$next_period_day = date('F d, Y',strtotime($last_period_day) + (24*3600*$add_period_days));
		
		array_push($keep_period_dates,$dates_period);
		
		$selected_period_date = $next_period_day;
	}
	
	//var_dump(array_reduce($keep_all_dates, 'array_merge', array()));
	
	//$result = array_reduce($keep_all_dates, 'array_merge', array()); // fertile
	
	//$period_result = array_reduce($keep_period_dates, 'array_merge', array()); // periods
	
	add_option('oc-period_result', $keep_period_dates, '', 'no');
	add_option('oc-fertile_result', $keep_all_dates, '', 'no');
		
	// Fertile
	$fertile_from_db = get_option('oc-fertile_result');
	$result = array_reduce($fertile_from_db, 'array_merge', array());
	
	
	// Period
	$period_from_db = get_option('oc-period_result');
	$period_result = array_reduce($period_from_db, 'array_merge', array());
			
	?>
		<script>
			$ = jQuery.noConflict();
			$(function ($) {
			$(document).ready(function() {	  
				
				var fertileDays = <?php echo '["' . implode('", "', $result) . '"]' ?>;
				
				var periodDays = <?php echo '["' . implode('", "', $period_result) . '"]' ?>;
				
				$('#datepicker').datepicker({
					dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
					firstDay: 1, // Monday
					 beforeShowDay: function (date) {
			            //convert the date to a string format same as the one used in the array
			            var string = $.datepicker.formatDate('MM dd, yy', date)
			            if ($.inArray(string, fertileDays) > -1) {
			                return [true, 'fertileDay', ''];
			            } 
			            else if ($.inArray(string, periodDays) > -1) {
			                return [true, 'periodDay', ''];
			            }
			            else {
			                return [false, '', ''];
			            }
			            
			            
			        },
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
	$firstdaytime=$lasttime + $_POST['days']*24*3600 - 16*24*3600;
	$firstday=date("F d, Y",$firstdaytime);
	
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
			<div id="datepicker" class="ll-skin-melon"></div>
			<div class="calculateagain">
				<div class="fertile">
				<a href="#"><img src="<?php echo plugins_url('/img/tick.svg' , __FILE__ )?>" alt="ovulation fertile">&nbsp;&nbsp;&nbsp;[Fertile]</a>
				</div>
				<div class="calculateagainbtn">
					<i class="fa fa-calendar fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="[Change date]" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'];?><?php echo $_SERVER['REQUEST_URI']?>'">
				</div>
			</div>
		</div>
		<div class="email-area">
			<div class="email-message">
				<h2>[Send ovulation calendar by email]</h2>
				<p>Enter your email and we'll send you your ovulation dates for the next 6 months.</p>
			</div>
			<form method="post" id="ovulationCalculatorEmail" name="emailSubmitForm" autocomplete="on">
				<div class="email-box">
				<input type="email" name="oc_email" id="ocEmail" value="[Enter your email]"/>
				<p> [You will at the same time reveive a link to download our e-book Guide to Pregnancy and be subscribed to our newsletter about fertility. ]</p>
				<div class="subscription-option">
					<input type="checkbox" id="subscribeNews" name="oc_subscribe" value="yes" checked >
					<label for="subscription"> [Yes, thank you. We may send you your ovulation calendar, a link to download our Guide to Pregnancy e-book and subscribe you to our newsletter from Babyplan. It is written for the sole purpose of increasing your chances of achieving pregnancy. It is released every 2 weeks, can be easily unsubscribed and is written in collaboration with a fertility expert from VivaNeo.]</label>
				</div>
				
				<i class="fa fa-angle-right fa-4x" aria-hidden="true"></i>
				<div class="submit-btn"><input type="submit" name="emailsend" id="emailsend" value="[Send]"/></div>
			</div>
			</form>
		</div>
	</div>
<?php else: //the calculator comes here ?>
	<div class="calculator_table">
		<form method="post" id="ovulationCalculatorForm" autocomplete="off">
			<?php if(!empty($options['calculate-ovulation'])):?>
				<h2><?php echo $options['calculate-ovulation']?></h2>
			<?php else:?>
				<h2>[Calculate ovulation]</h2>
			<?php endif?>
			<?php if(!empty($options['first-day-last-period'])):?>
				<p><?php echo $options['first-day-last-period']?></p>
			<?php else:?>
				<p>[First day of your last peroid]</p>
			<?php endif?>
			<i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
			<?php if(!empty($options['select-date'])):?>
			<input type="text" name="something" placeholder="<?php echo $options['select-date']?>..." value="<?php echo $options['select-date']?>..." id="calendarInput"/>
			<?php else:?>
			<input type="text" name="something" placeholder="[Select date...]" value="Select date..." id="calendarInput"/>
			<?php endif?>
			<div id="calendar" class="ll-skin-melon"></div>
			
			<?php if(!empty($options['length-cycle'])):?>
				<p><?php echo $options['length-cycle']?></p>
			<?php else:?>
				<p>[Length of your cycle]</p>
			<?php endif?>
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
					<input type="submit" name="calculator_ok" id="calculatorOk" value="<?php echo $options['oc-submit']?>">
				<?php else:?>
					<input type="submit" name="calculator_ok" id="calculatorOk" value="[Submit]">
				<?php endif?>
			</div>
		</form>
		
		<div class="message-eng">
			<?php if(!empty($options['oc-message'])):?>
				<?php echo $options['oc-message']?>
			<?php else:?>
			<p>Calculate your ovulation with our ovulation calculator and find out when you have the greatest chance of achieving pregnancy. Using The ovulation calculator lets you quickly and accurately get one overview of your cycle and keep ovulation calendars, you saw can find the days when you are most fertile.</p>
			<h2>When can you become pregnant?</h2>
			<p>Women are only fertile in a relatively short period in each cycle. Therefore it is also important to have an egg release calendar, That can give an overview of when during the month you is most fertile if you want to become pregnant. </p>
			<?php endif?>
		</div>
		
	</div>
<?php endif;?>