//Index session
var i =0;
//index partner
var j = 0;
App = {
	performDatePicker : function() {
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
	},
	addSession : function() {
		container = "";
		var session_title = $('input[name="session_title"]').val();
		//console.log(session_title);
		var session_horaireDebut = $('input[name="horaireDebut"]').val();
		var session_horaireFin = $('input[name="horaireFin"]').val();
		var session_desc = $('textarea[name="session_desc"]').val();
		i++;
		container+='<button type="button" class="list-group-item">'+session_title+'</button>';
		container+='<input type="hidden" name="session_'+i+'[tile]" value="'+session_title+'"/>';
		container+='<input type="hidden" name="session_'+i+'[horaireDebut]" value="'+session_horaireDebut+'"/>';
		container+='<input type="hidden" name="session_'+i+'[horaireFin]" value="'+session_horaireFin+'"/>';
		container+='<input type="hidden" name="session_'+i+'[desc]" value="'+session_desc+'"/>';

		$('input[name="nbSession"]').val(i);
		$("#sessions-container").append(container);
	},
	addPartner : function() {
		container = "";
		var partner_name = $('input[name="partner_name"]').val();
		var partner_address = $('input[name="partner_address"]').val();
		var partner_city = $('input[name="partner_city"]').val();
		var partner_cp = $('intput[name="partner_cp"]').val();
		var partner_email = $('intput[name="partner_email"]').val();
		var partner_phone = $('intput[name="partner_phone"]').val();
		j++;
		container+='<button type="button" class="list-group-item">'+partner_name+'</button>';
		container+='<input type="hidden" name="partner_'+j+'[name]" value="'+partner_name+'"/>';
		container+='<input type="hidden" name="parnter_'+j+'[address]" value="'+partner_address+'"/>';
		container+='<input type="hidden" name="parnter_'+j+'[city]" value="'+partner_city+'"/>';
		container+='<input type="hidden" name="partner_'+j+'[cp]" value="'+partner_cp+'"/>';
		container+='<input type="hidden" name="partner_'+j+'[email]" value="'+partner_email+'"/>';
		container+='<input type="hidden" name="partner_'+j+'[phone]" value="'+partner_phone+'"/>';

		$('input[name="nbPartner"]').val(j);
		$("#partner-container").append(container);
	}
}

$(document).ready(function(){
	App.performDatePicker();
	$("#btn-add-session").click(App.addSession);
	$("#btn-add-partner").click(App.addPartner);
});
