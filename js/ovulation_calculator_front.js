$ = jQuery.noConflict();
$(function ($) {	
	
	$(document).ready(function() {
	  	$('#calendarInput').click(function(){
	  		$('#calendar').toggle();
		});
		
		//$('body, div').click(function(event){
			//console.log(event.target.nodeName );
		//	$('#calendar').datepicker('hide');
		//});
	  	
	  	$('#calendar').datepicker({	  	
		  	dayNamesMin: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
		  	inline: true,
		  	showOtherMonths: true,
	    	dateFormat: "dd/mm/yy",
	    	onSelect: function(dateText, inst) {
				$("input[name='something']").val(dateText);
	    	}
	    });
	    
	    
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