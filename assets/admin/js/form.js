$(function(){

	$('.date-time-picker').each(function(){
		$(this).datetimepicker({
			format:'m/d/Y h:iA'
		});
	});

	$('.date-picker').each(function(){
		$(this).datetimepicker({
			timepicker: false,
			format:'m/d/Y',
			closeOnDateSelect: true
		});
	});

	$('.time-picker').each(function(){
		$(this).datetimepicker({
			datepicker:false,
  			format:'h:iA'
		});
	});

	$('.number').on('input', function(){
		var self = this;
		self.value = self.value.replace(/\D/g,'');
	});

	$('.form .input-con-checkbox').each(function(){
		checkboxInputText($(this));
	});

	$(document).on('change', '.form input[type="checkbox"]', function(e){
		checkboxInputText($(this).closest('.input-con-checkbox'));
	});

	function checkboxInputText(el){
		var self = el;
		var checkboxName = self.find('input[type="checkbox"]').first().attr('name');

		if(self.find(':checked').length){
			self.find('.checkbox-input-text').remove();
		}else{
			self.prepend('<input type="hidden" class="checkbox-input-text" name="'+ checkboxName +'">');
		}
	}

});