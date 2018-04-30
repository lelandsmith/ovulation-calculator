$ = jQuery.noConflict();
$(function ($) {
	
	
	$(document).ready(function() {
	  	$('#calendarInput, .calculator_table i.fa.fa-calendar').click(function(){
	  		$('#calendar').toggle();
	  		$('.calculator_table i.fa.fa-calendar').css('color', '#a8d1af');
		});
		
	  	
	  	$('#calendar').datepicker({	  	
		  	dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
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
	    
	    $('#calculatorOk').prop('disabled',true);
	    	    	    
	    // Email Send and checkbox
	    
	    $('#emailsend').prop('disabled',true);
		$('#ocEmail').keyup(function(){
			$('#emailsend').prop('disabled', this.value == "" ? true : false);
			$('#subscribeNews').prop("checked", true);
    	});
    	
    	$('#subscribeNews').change(function () {
			$('#emailsend').prop("disabled", !this.checked);
		});
		
		
		// Days fading
	setTimeout(function() {
			//$('.periodDay').each(function (i) {
			//	$(this).addClass('periodDay-' + i);
			//});	
			
			//xx(i);
			
					
			$('.fertileDay').each(function (x) {
				$(this).addClass('fertileDay-' + x);
			});
		}, 500);
		
		
		
				
			// Days fading
			$('.ui-datepicker-next, .ui-datepicker-prev').live('click', function(){
				setTimeout(function() {				
					//$('.periodDay').each(function (i) {
					//	$(this).addClass('periodDay-' + i);
					//});
					$('.fertileDay').each(function (x) {
						$(this).addClass('fertileDay-' + x);
					});
				}, 500);
				//console.log( $( this ).text() );
			});
	});
});