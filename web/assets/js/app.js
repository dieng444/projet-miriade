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
			locale: 'fr',
			allowInputToggle: true
		});
		$('#datetimepicker2').datetimepicker( {
			locale: 'fr',
			allowInputToggle: true
		});
		$('#datetimepicker3').datetimepicker({
			locale: 'fr',
			allowInputToggle: true
		});
		$('#datetimepicker4').datetimepicker({
			locale: 'fr',
			allowInputToggle: true
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
		var session_title = $('input[full_name="session_title"]').val();
		var session_horaireDebut = $('input[full_name="session_horaireDebut"]').val();
		var session_horaireFin = $('input[full_name="session_horaireFin"]').val();
		var session_desc = $('textarea[full_name="session_desc"]').val();
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

		$( "#session-alert" ).slideUp();

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
		$('input[full_name="session_title"]').val(getInfo.title);
		$('input[full_name="session_horaireDebut"]').val(getInfo.horaireDebut);
		$('input[full_name="session_horaireFin"]').val(getInfo.horaireFin);
		$('textarea[full_name="session_desc"]').val(getInfo.desc);

		// We add a button to give the user the ability to validate changes
		button = "";
		button += '<div class="row justified">';
		button += '	<button type="button" class="btn btn-lg btn-save-edit-session" id="btn-save-edit-session-'+sessionId+'">Valider</button>';
		button += '	<button type="button" class="btn btn-lg btn-cancel-edit-session">Annuler</button>';
		button += '</div>';

		$('textarea[full_name="session_desc"]').parent().parent().append(button);
		$( "#btn-save-edit-session-"+sessionId ).on("click", App.saveEditSession);
		$( ".btn-cancel-edit-session" ).on("click", App.cancelEditSession);
	},
	saveEditSession : function() {
		var session_title = $('input[full_name="session_title"]').val();
		var session_horaireDebut = $('input[full_name="session_horaireDebut"]').val();
		var session_horaireFin = $('input[full_name="session_horaireFin"]').val();
		var session_desc = $('textarea[full_name="session_desc"]').val();
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
				$('input[full_name="'+sessions[y]+'"]').val("");
		}
		$('textarea[full_name="session_desc"]').val("");
	},
	addPartner : function() {
		container = "";
		var partner_libelle = $('input[full_name="partner_libelle"]').val();
		var partner_nameContact = $('input[full_name="partner_nameContact"]').val();
		var partner_address = $('input[full_name="partner_address"]').val();
		var partner_city = $('input[full_name="partner_city"]').val();
		var partner_cp = $('input[full_name="partner_cp"]').val();
		var partner_email = $('input[full_name="partner_email"]').val();
		var partner_phone = $('input[full_name="partner_phone"]').val();
		var partner_statut = $('select option:selected').text();
		var partner_logo = $('input[full_name="partner_logo"]').val();

		j++;
		container+='<div class="list-group-item">';
		container+='	<span>'+partner_libelle+'</span>';
		container+='	<div class="btn-group">';
		container+='		<button type="button" class="btn btn-xs btn-warning btn-edit-partner">';
		container+='			<span class="glyphicon glyphicon-pencil"></span>&nbsp';
		container+='		</button>';
		container+='		<button type="button" class="btn btn-xs btn-danger btn-remove-partner">';
		container+='			<span class="glyphicon glyphicon-remove"></span>&nbsp';
		container+='		</button>';
		container+='	</div>';
		container+=' 	<div id="info-partner-'+j+'">';
		container+='		<input type="hidden" name="partner_'+j+'[libelle]" value="'+partner_libelle+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[nameContact]" value="'+partner_nameContact+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[address]" value="'+partner_address+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[city]" value="'+partner_city+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[cp]" value="'+partner_cp+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[email]" value="'+partner_email+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[phone]" value="'+partner_phone+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[logo]" value="'+partner_logo+'"/>';
		container+='		<input type="hidden" name="partner_'+j+'[statut]" value="'+partner_statut+'"/>';
		container+=' </div>';
		container+='</div>';

		$('input[name="nbPartner"]').val(j);
		if (partner_libelle != "") {
			$("#partners-container").append(container);
		}

		$( "#partner-alert" ).slideUp();

		$(".btn-edit-partner").on("click", App.editPartner);
		$(".btn-remove-partner").on("click", App.removePartner);

		App.resetPartnerFields();
	},
	editPartner : function() {
		var info = $( this ).parent().next().children();
		partnerId = info.eq(0).attr("name").charAt(8);
		var getInfo = {
			"libelle": info.eq(0).val(),
			"nameContact": info.eq(1).val(),
			"address": info.eq(2).val(),
			"city": info.eq(3).val(),
			"cp": info.eq(4).val(),
			"email": info.eq(5).val(),
			"phone": info.eq(6).val(),
			"statut": info.eq(8).val(),
			"logo": info.eq(7).val()
		}

		// We display all information on the visible form
		$('input[full_name="partner_libelle"]').val(getInfo.libelle);
		$('input[full_name="partner_nameContact"]').val(getInfo.nameContact);
		$('input[full_name="partner_address"]').val(getInfo.address);
		$('input[full_name="partner_city"]').val(getInfo.city);
		$('input[full_name="partner_cp"]').val(getInfo.cp);
		$('input[full_name="partner_email"]').val(getInfo.email);
		$('input[full_name="partner_phone"]').val(getInfo.phone);
		$('select option:selected').text(getInfo.statut);
		$('input[full_name="partner_logo"]').val(getInfo.logo);


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
		var partner_libelle = $('input[full_name="partner_libelle"]').val();
		var partner_nameContact = $('input[full_name="partner_nameContact"]').val();
		var partner_address = $('input[full_name="partner_address"]').val();
		var partner_city = $('input[full_name="partner_city"]').val();
		var partner_cp = $('input[full_name="partner_cp"]').val();
		var partner_email = $('input[full_name="partner_email"]').val();
		var partner_phone = $('input[full_name="partner_phone"]').val();
		var partner_statut = $('select option:selected').text();
		var partner_logo = $('input[full_name="partner_logo"]').val();
		var newValues = [partner_libelle, partner_nameContact, partner_address, partner_city, partner_cp, partner_email, partner_phone, partner_statut, partner_logo];
		var infoPartner = $( "#info-partner-"+partnerId );

		// Update the hidden fields and the visible name
		infoPartner.prev().prev("span").text(partner_libelle);
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
		j--;
		$('input[name="nbPartner"]').val(j);
		$( this ).parent().parent().remove();
	},
	resetPartnerFields : function() {
		var partners = ["partner_libelle", "partner_nameContact", "partner_address", "partner_city", "partner_cp", "partner_email", "partner_phone", "partner_statut", "partner_logo"];
		for (var y = 0; y < partners.length; y++) {
			$('input[full_name="'+partners[y]+'"]').val("");
		}
		$('.img-responsive').attr('src','');
	}
}

$( document ).ready(function(){
	App.performDatePicker();
	//L'image de de l'événement sur la page show
	$("#current-evnt-container").first().css("background","url('../../../upload/images/"+$("#event-image").val()+"')" + " " + "no-repeat scroll center center / cover rgba(0, 0, 0, 0)");
	$("#btn-add-session").click(App.addSession);
	$("#btn-add-partner").click(App.addPartner);
});

$( "#session-form-wrapper form" ).submit(function(e) {
	if ($( "#sessions-container" ).is( ":empty" )) { // S'il n'y a aucune session ou partenaire
		e.preventDefault();
		$( "#session-alert" ).slideDown();
	}
});

$( "#partner-form-wrapper form" ).submit(function(e) {
	if ($( "#partners-container" ).is( ":empty" )) { // S'il n'y a aucune session ou partenaire
		e.preventDefault();
		$( "#partner-alert" ).slideDown();
	}
});
