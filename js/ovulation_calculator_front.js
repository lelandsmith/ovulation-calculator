$ = jQuery.noConflict();
$(function ($) {	
	
	$(document).ready(function() {
	  	$('#calendarInput').click(function(){
	  		$('#calendar').toggle();
		});
		
	  	
	  	$('#calendar').datepicker({	  	
		  	dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
		  	firstDay: 1, // Monday
		  	inline: true,
		  	showOtherMonths: true,
	    	dateFormat: "dd/mm/yy",
	    	onSelect: function(dateText, inst) {
				$("input[name='something']").val(dateText);
				$(this).hide();
	    	}
	    });
	    
	    // Calculator Submit
	    $('#calculatorOk').prop('disabled',true);
	    $('#calendarInput').on('click',function() {
		    if($('#calendarInput').val().length < 1 ){
		    	$('#calculatorOk').prop('disabled', true);
		    }else{
			    $('#calculatorOk').prop('disabled', false);
		    }
	    });
	    	    
	    // Email Send and checkbox
	    
	    $('#emailsend').prop('disabled',true);
		$('#ocEmail').keyup(function(){
			$('#emailsend').prop('disabled', this.value == "" ? true : false);
			$('#subscribeNews').prop("checked", true);
    	});
    	
    	$('#subscribeNews').change(function () {
			$('#emailsend').prop("disabled", !this.checked);
		});
    	
	});
});