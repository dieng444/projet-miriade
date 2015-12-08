$(document).ready(function(){
	$('#datetimepicker1').datetimepicker({
		locale: 'fr'
	});
	$('#datetimepicker2').datetimepicker( {
		locale: 'fr'
	});
	$('#datetimepicker3').datetimepicker({
		locale: 'fr'
	});
	$('#datetimepicker4').datetimepicker({
		locale: 'fr'
	});
	$('#datetimepicker1 input').focus(function(){
	  $('#datetimepicker1').show;
	});
	$('#datetimepicker2 input').focus(function(){
	  $('#datetimepicker2').show;
	})
	$('#datetimepicker3 input').focus(function(){
	  $('#datetimepicker3').show;
	});
	$('#datetimepicker4 input').focus(function(){
	  $('#datetimepicker4').show;
	});
});
