$ = jQuery.noConflict();
$(function ($) {	
	
	$(document).ready(function() {
	  	$('#calendarInput').click(function(){
	  		$('#calendar').toggle();
		});
	  	
	  	$('#calendar').datepicker({
		  	inline: true,
		  	showOtherMonths: true,
	    	dateFormat: "dd/mm/yy",
	    	onSelect: function(dateText, inst) {
				$("input[name='something']").val(dateText);
	    	}
	    });
	});
	
});