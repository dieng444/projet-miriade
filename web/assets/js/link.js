$( document ).ready(function(){
	/**
  * Lien Accueil de l'événement dans les pages
  * permet de revenir à la page d'accueil de l'événement à aprtir de
  * n'importe quelle autre page.
  **/
  if ($("#event-slug").length > 0) {
    $("#event-home").attr("href","/app_dev.php/event/"+$("#event-slug").val());
  }
})
