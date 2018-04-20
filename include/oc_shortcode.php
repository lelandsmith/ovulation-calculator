<script>

$ = jQuery.noConflict();
$(function ($) {	
	$(document).ready(function() {
	  	$('#calendar').datepicker({
	    	dateFormat: "dd/mm/yy",
	    	onSelect: function(dateText, inst) {
				$("input[name='something']").val(dateText);
	    	}
	    });
	});
});

</script>
<?php function check_available_date($firstday){
	
	$keep_all_dates = array();
	for($month_count = 1; $month_count<=6; $month_count++){ // 6 months result
		$start = strtotime($firstday);
		$dates=array();

		
		for($i = 0; $i<=4; $i++){
			array_push($dates,date('F d, Y', strtotime("+$i day", $start)));
			//echo $dates[$i];
			//echo '<br>';
			$new_format_date = date("d/m/Y", strtotime($dates[$i]));
			
			
			echo $new_format_date;
			echo '<br>';
		}
		
		echo '<br>';
		$add_days = $_POST['days']-4; // minus 4 from selected cycle 
		$last_fertile_day = $dates[4];
		$next_fertile_day = date('F d, Y',strtotime($last_fertile_day) + (24*3600*$add_days));
		
		array_push($keep_all_dates,$dates);
		
		$firstday = $next_fertile_day;
	}
	
	$result = array_reduce($keep_all_dates, 'array_merge', array());
		
	?>
<script>
$(document).ready(function() {	  
	var fruits = <?php echo '["' . implode('", "', $result) . '"]' ?>;
	$('#datepicker').datepicker({
		 //dateFormat: "dd/mm/yy",
		 beforeShowDay: function (date) {
            //convert the date to a string format same as the one used in the array
            var string = $.datepicker.formatDate('MM dd, yy', date)
            if ($.inArray(string, fruits) > -1) {
                return [true, '', ''];
            } else {
                return [false, '', ''];
            }
        },
	});
});
</script>	
	
<?php }
			
if(!empty($_POST['calculator_ok'])):

	$fulldate = $_POST['something'];
	
	$dateparts = explode("/",$fulldate);
	
	$day= $dateparts[0];
	$month= $dateparts[1];
	$year= $dateparts[2];
	
	echo $day;
	echo $month;
	echo $year;
	
	//convert to time
	$lasttime=mktime(0,0,0,$month,$day,$year);
    
	//first fertile day
	$firstdaytime=$lasttime + $_POST['days']*24*3600 - 16*24*3600;
	$firstday=date("F d, Y",$firstdaytime);
	
	//last fertile day
	$lastdaytime=$lasttime + $_POST['days']*24*3600 - 12*24*3600;
	$lastday=date("F d, Y",$lastdaytime);
		
	?>
	<div class="calculator_table">
	<p>Here are the results based on the information you provided:</p>
	<p>Most fertile</b> periods are: </p>
		
		<?php check_available_date($firstday);?>
		<div id="datepicker"></div>
	
	<p align="center"><input type="button" value="Calculate again!" onclick="window.location='http://<?php echo $_SERVER['HTTP_HOST'];?><?php echo $_SERVER['REQUEST_URI']?>'"></p>
	</div>
<?php else: //the calculator comes here ?>
	<div class="calculator_table">
	<form method="post">
	<p>Please select the first day of your last menstrual period:</p>
	<p><?php //echo date_chooser("date",date("Y-m-d"))?></p>
		
	<div id="calendar"></div>
	<input type="text" name="something" value="[Select date...]" />
	
	<p>Usual number of days in your period: <select name="days">
	<?php
	for($i=20;$i<=45;$i++)
	{
		if($i==28) $selected='selected="true"';
		else $selected='';
		echo "<option $selected value='$i'>$i</option>";
	}
	?>
	</select></p>
	<p align="center"><input type="submit" name="calculator_ok" value="Calculate"></p>
	</form>
	</div>
<?php endif;?>