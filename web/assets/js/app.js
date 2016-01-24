// Index session
var i =0;
// Index partner
var j = 0;
// Session id
var sessionId;
// Partner id
var partnerId;

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
		var session_horaireDebut = $('input[name="horaireDebut"]').val();
		var session_horaireFin = $('input[name="horaireFin"]').val();
		var session_desc = $('textarea[name="session_desc"]').val();
		i++;
		container+='<div class="list-group-item">';
		container+='	<span>'+session_title+'</span>';
		container+='	<div class="btn-group">';
		container+='		<button type="button" class="btn btn-xs btn-warning btn-edit-session">';
		container+='			<span class="glyphicon glyphicon-pencil"></span>&nbsp';
		container+='		</button>';
		container+='		<button type="button" class="btn btn-xs btn-danger btn-remove-session">';
		container+='			<span class="glyphicon glyphicon-remove"></span>&nbsp';
		container+='		</button>';
		container+='	</div>';
		container+='  <div id="info-session-'+i+'">';
		container+='		<input type="hidden" name="session_'+i+'[title]" value="'+session_title+'"/>';
		container+='		<input type="hidden" name="session_'+i+'[horaireDebut]" value="'+session_horaireDebut+'"/>';
		container+='		<input type="hidden" name="session_'+i+'[horaireFin]" value="'+session_horaireFin+'"/>';
		container+='		<input type="hidden" name="session_'+i+'[desc]" value="'+session_desc+'"/>';
		container+='  </div>';
		container+='</div>';

		$('input[name="nbSession"]').val(i);
		if (session_title != "") {
			$("#sessions-container").append(container);
		}

		$(".btn-edit-session").on("click", App.editSession);
		$(".btn-remove-session").on("click", App.removeSession);

		App.resetSessionFields();

	},
	editSession : function() {
		var info = $( this ).parent().next().children();
		sessionId = info.eq(0).attr("name").charAt(8); // session_*[blabla]
		var getInfo = {
			"title": info.eq(0).val(),
			"horaireDebut": info.eq(1).val(),
			"horaireFin": info.eq(2).val(),
			"desc": info.eq(3).val()
		}

		// We display all information on the visible form
		$('input[name="session_title"]').val(getInfo.title);
		$('input[name="horaireDebut"]').val(getInfo.horaireDebut);
		$('input[name="horaireFin"]').val(getInfo.horaireFin);
		$('textarea[name="session_desc"]').val(getInfo.desc);

		// We add a button to give the user the ability to validate changes
		button = "";
		button += '<div class="row justified">';
		button += '	<button type="button" class="btn btn-lg btn-save-edit-session" id="btn-save-edit-session-'+sessionId+'">Valider</button>';
		button += '	<button type="button" class="btn btn-lg btn-cancel-edit-session">Annuler</button>';
		button += '</div>';

		$('textarea[name="session_desc"]').parent().parent().append(button);
		$( "#btn-save-edit-session-"+sessionId ).on("click", App.saveEditSession);
		$( ".btn-cancel-edit-session" ).on("click", App.cancelEditSession);
	},
	saveEditSession : function() {
		var session_title = $('input[name="session_title"]').val();
		var session_horaireDebut = $('input[name="horaireDebut"]').val();
		var session_horaireFin = $('input[name="horaireFin"]').val();
		var session_desc = $('textarea[name="session_desc"]').val();
		var newValues = [session_title, session_horaireDebut, session_horaireFin, session_desc];
		var infoSession = $( "#info-session-"+sessionId );

		// Update the hidden fields and the visible title
		infoSession.prev().prev("span").text(session_title);
		for (var x = 0; x < newValues.length; x++) {
			infoSession.children().eq(x).val(newValues[x]);
		}

		// Resets the visible form
		$( "#btn-save-edit-session-"+sessionId ).parent().remove();
		$( ".btn-cancel-edit-session" ).parent().remove();
		App.resetSessionFields();
	},
	cancelEditSession : function() {
		$( "#btn-save-edit-session-"+sessionId ).parent().remove();
		$( ".btn-cancel-edit-session" ).parent().remove();
		App.resetSessionFields();
	},
	removeSession : function() {
		$( this ).parent().parent().remove();
	},
	resetSessionFields : function() {
		var sessions = ["session_title", "session_horaireDebut", "session_horaireFin"];
		for (var y = 0; y < sessions.length; y++) {
			$('input[name="'+sessions[y]+'"]').val("");
		}
		$('textarea[name="session_desc"]').val("");
	},
	addPartner : function() {
		container = "";
		var partner_name = $('input[name="partner_name"]').val();
		var partner_address = $('input[name="partner_address"]').val();
		var partner_city = $('input[name="partner_city"]').val();
		var partner_cp = $('input[name="partner_cp"]').val();
		var partner_email = $('input[name="partner_email"]').val();
		var partner_phone = $('input[name="partner_phone"]').val();
		j++;
		container+='<div class="list-group-item">';
		container+='	<span>'+partner_name+'</span>';
		container+='	<div class="btn-group">';
		container+='		<button type="button" class="btn btn-xs btn-warning btn-edit-partner">';
		container+='			<span class="glyphicon glyphicon-pencil"></span>&nbsp';
		container+='		</button>';
		container+='		<button type="button" class="btn btn-xs btn-danger btn-remove-partner">';
		container+='			<span class="glyphicon glyphicon-remove"></span>&nbsp';
		container+='		</button>';
		container+='	</div>';
		container+=' 	<div id="info-partner-'+j+'">';
		container+='		<input type="hidden" name="partner_'+j+'[name]" value="'+partner_name+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[address]" value="'+partner_address+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[city]" value="'+partner_city+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[cp]" value="'+partner_cp+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[email]" value="'+partner_email+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[phone]" value="'+partner_phone+'"/>';
		container+=' </div>';
		container+='</div>';

		$('input[name="nbPartner"]').val(j);
		if (partner_name != "") {
			$("#partner-container").append(container);
		}

		$(".btn-edit-partner").on("click", App.editPartner);
		$(".btn-remove-partner").on("click", App.removePartner);

		App.resetPartnerFields();
	},
	editPartner : function() {
		var info = $( this ).parent().next().children();
		partnerId = info.eq(0).attr("name").charAt(8);
		var getInfo = {
			"name": info.eq(0).val(),
			"address": info.eq(1).val(),
			"city": info.eq(2).val(),
			"cp": info.eq(3).val(),
			"email": info.eq(4).val(),
			"phone": info.eq(5).val()
		}

		// We display all information on the visible form
		$('input[name="partner_name"]').val(getInfo.name);
		$('input[name="partner_address"]').val(getInfo.address);
		$('input[name="partner_city"]').val(getInfo.city);
		$('input[name="partner_cp"]').val(getInfo.cp);
		$('input[name="partner_email"]').val(getInfo.email);
		$('input[name="partner_phone"]').val(getInfo.phone);

		// We add a button to give the user the ability to validate changes
		button = "";
		button += '<div class="row justified">';
		button += '	<button type="button" class="btn btn-lg btn-save-edit-partner" id="btn-save-edit-partner-'+partnerId+'">Valider</button>';
		button += '	<button type="button" class="btn btn-lg btn-cancel-edit-partner">Annuler</button>';
		button += '</div>';

		$( "#selected-image-2" ).parent().parent().append(button);
		$( "#btn-save-edit-partner-"+partnerId ).on("click", App.saveEditPartner);
		$( ".btn-cancel-edit-partner" ).on("click", App.cancelEditPartner);
	},
	saveEditPartner : function() {
		var partner_name = $('input[name="partner_name"]').val();
		var partner_address = $('input[name="partner_address"]').val();
		var partner_city = $('input[name="partner_city"]').val();
		var partner_cp = $('input[name="partner_cp"]').val();
		var partner_email = $('input[name="partner_email"]').val();
		var partner_phone = $('input[name="partner_phone"]').val();
		var newValues = [partner_name, partner_address, partner_city, partner_cp, partner_email, partner_phone];
		var infoPartner = $( "#info-partner-"+partnerId );

		// Update the hidden fields and the visible name
		infoPartner.prev().prev("span").text(partner_name);
		for (var x = 0; x < newValues.length; x++) {
			infoPartner.children().eq(x).val(newValues[x]);
		}

		// Resets the visible form
		$( "#btn-save-edit-partner-"+partnerId ).parent().remove();
		$( ".btn-cancel-edit-partner" ).parent().remove();
		App.resetPartnerFields();
	},
	cancelEditPartner : function() {
		$( "#btn-save-edit-partner-"+partnerId ).parent().remove();
		$( ".btn-cancel-edit-partner" ).parent().remove();
		App.resetPartnerFields();
	},
	removePartner : function() {
		$( this ).parent().parent().remove();
	},
	resetPartnerFields : function() {
		var partners = ["partner_name", "partner_address", "partner_city", "partner_cp", "partner_email", "partner_phone"];
		for (var y = 0; y < partners.length; y++) {
			$('input[name="'+partners[y]+'"]').val("");
		}
	}
}

$(document).ready(function(){
	App.performDatePicker();
	$("#btn-add-session").click(App.addSession);
	$("#btn-add-partner").click(App.addPartner);
});
