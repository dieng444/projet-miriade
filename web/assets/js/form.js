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

// Prévisualisation des images lors d'un upload
$( "#input-file-1, #input-file-2" ).change(function(e) {

  if (typeof (FileReader) != "undefined") {
    var selectedImage;
    if ($( this ).attr( "id" ) == "input-file-1") {
      selectedImage = $( "#selected-image-1" );
    }
    if ($( this ).attr( "id" ) == "input-file-2") {
      selectedImage = $( "#selected-image-2" );
    }
    selectedImage.empty();
    var reader = new FileReader();
    reader.onload = function (e) {
        $("<img />", {
            "class": "img-responsive",
            "src": e.target.result
        }).appendTo(selectedImage);
    }
    selectedImage.show();
    reader.readAsDataURL($( this )[0].files[0]);
  } else {
      console.log("Ce navigateur ne gère pas FileReader.");
  }

});
