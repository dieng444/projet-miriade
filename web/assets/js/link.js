$( document ).ready(function(){
	/**
  * Lien Accueil de l'événement dans les pages
  * permet de revenir à la page d'accueil de l'événement à aprtir de
  * n'importe quelle autre page.
  **/
	$("#event-home").attr("href","/app_dev.php/event/"+$("#event-slug").val());
})
