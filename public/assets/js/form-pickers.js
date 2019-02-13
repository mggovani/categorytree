var FormPickers = function() {
	"use strict";

	var datePickerHandler = function() {
		$('.datepicker').datepicker({
			autoclose : true,
		});
		$('.format-datepicker').datepicker({
			format : "M, d yyyy",
		});

	};
	var timePickerHandler = function() {
		$('#timepicker-default').timepicker();
	};
	return {
		//main function to initiate template pages
		init : function() {
			datePickerHandler();
			timePickerHandler();
		}
	};
}();
