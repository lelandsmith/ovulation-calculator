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
		$('.ui-datepicker-next, .ui-datepicker-prev').live('click', function(){
			
			setTimeout(function() {
				$( "td.periodDay:eq( 0 )" ).css( "opacity", "1" );
				$( "td.periodDay:eq( 1 )" ).css( "opacity", "0.8" );
				$( "td.periodDay:eq( 2 )" ).css( "opacity", "0.6" );
				$( "td.periodDay:eq( 3 )" ).css( "opacity", "0.4" );
				$( "td.periodDay:eq( 4 )" ).css( "opacity", "0.2" );
				$( "td.periodDay:eq( 5 )" ).css( "opacity", "0.1" );
				
				$( "td.fertileDay:eq( 0 )" ).css( "opacity", "1" );
				$( "td.fertileDay:eq( 1 )" ).css( "opacity", "0.8" );
				$( "td.fertileDay:eq( 2 )" ).css( "opacity", "0.6" );
				$( "td.fertileDay:eq( 3 )" ).css( "opacity", "0.4" );
				$( "td.fertileDay:eq( 4 )" ).css( "opacity", "0.2" );
				$( "td.fertileDay:eq( 5 )" ).css( "opacity", "0.1" );
			
			}, 500);
			
			//console.log( $( this ).text() );
		});
		
		
		
	});
	
});