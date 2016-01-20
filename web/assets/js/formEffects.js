// Au survol d'un bouton pour sélectionner un fichier
$( ".btn-file" ).mouseover(function() {
    $( this ).prev().css({ "background-color":"#2F88AA", "color":"white" });
});
$( ".btn-file" ).mouseout(function() {
    $( this ).prev().css({ "background-color":"#F2F2F2", "color":"gray" });
});

// Au survol d'un bouton pour afficher le datepicker
$( ".input-group-addon" ).mouseover(function() {
    $( this ).parent().parent().prev().css({ "background-color":"#2F88AA", "color":"white" });
});
$( ".input-group-addon" ).mouseout(function() {
    $( this ).parent().parent().prev().css({ "background-color":"#F2F2F2", "color":"gray" });
});

// Au focus des champs classiques du formulaire
$( ".form-control" ).focus(function() {
    $( this ).prev().css({ "background-color":"#2F88AA", "color":"white" });
});
$( ".form-control" ).blur(function() {
    $( this ).prev().css({ "background-color":"#F2F2F2", "color":"gray" });
});
