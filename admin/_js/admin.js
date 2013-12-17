$(document).ready(function(){
	/*----------------------------------*/
	/*--------AFFICHER/CACHER-----------*/
	/*----------------------------------*/
	$(".survol").mouseover(function(event){
		lid = this.id;
		lid = lid.split("_");
		idsurvol = lid[1];
		nomsurvol = lid[0];
		$("#delete_"+nomsurvol+"_"+idsurvol).show();
		$("#modifier_"+nomsurvol+"_"+idsurvol).show();
	});
	$(".survol").mouseout(function(event){
		lid = this.id;
		lid = lid.split("_");
		idsurvol = lid[1];
		nomsurvol = lid[0];
		$("#delete_"+nomsurvol+"_"+idsurvol).hide();
		$("#modifier_"+nomsurvol+"_"+idsurvol).hide();
	});
	
	/*----------------------------------*/
	/*------------SUPPRIMER-------------*/
	/*----------------------------------*/
	$(".delete").click(function(event){
		lid = this.id;
		lid = lid.split("_");
		nom = lid[1];
		lid = lid[2];

		$.ajax({
		  type: "POST",
		  url: "/admin/requetes/supprimer.php",
		  data: "lid=" + lid + "&nom=" + nom,
		  success: function(msg){
			$("#"+nom+"_"+lid).fadeOut('slow');
		  }
		});
	});
	
	/*----------------------------------*/
	/*------------MODIFIER--------------*/
	/*----------------------------------*/
	$(".modifier").click(function(event){
		lid = this.id;
		lid = lid.split("_");
		nom = lid[1];
		lid = lid[2];
		$.ajax({
		  type: "POST",
		  url: "/admin/requetes/modifier.php",
		  data: "lid=" + lid + "&nom=" + nom,
		  success: function(msg){
			$(".titreform").html("Modifier " + nom);
			$("#elementid").attr('value', lid);
			$("#elementnom").attr('value', nom);
			$("#nomFichier").attr('value', msg);
			$("#modifierform").show();
			$("body").animate({scrollTop:0}, 'slow');
		  }
		});
	});
	
	/*----------------------------------*/
	/*-------------AJOUTER--------------*/
	/*----------------------------------*/
	$(".ajout").click(function(event){
		$("#"+this.id).show();
		$("body").animate({scrollTop:0}, 'slow');
	});

	/*----------------------------------*/
	/*--------------AUTRE---------------*/
	/*----------------------------------*/
	//Valider un USER
	$(".user_a_valider").click(function(event){
		userid = this.id;
		$.ajax({
		  type: "GET",
		  url: "/admin/validateUser.php",
		  data: "userid=" + this.id,
		  success: function(msg){
			$("#"+userid).fadeOut('slow');
		  }
		});
	});
	
	//Fermer les formulaires
	$(".closeBox").click(function(event){
		$(".puForm").hide();
	});
	
	//Drag
	$('.box').Draggable(
		{
			grid:		[400,240],
			handle:	'h1'
		}
	);
	
	//Choisir entre lien et fichier
	$('#fichierselecteddocument').bind('click', function() {
	  $("#lienDocument").hide("fast");
	  $("#fichierDocument").show("fast");
	});
	$('#lienselecteddocument').bind('click', function() {
	  $("#lienDocument").show("fast");
	  $("#fichierDocument").hide("fast");
	});
	//Choisir entre lien et fichier
	$('#fichierselectedgestion').bind('click', function() {
	  $("#lienGestion").hide("fast");
	  $("#fichierGestion").show("fast");
	});
	$('#lienselectedgestion').bind('click', function() {
	  $("#lienGestion").show("fast");
	  $("#fichierGestion").hide("fast");
	});
	//Choisir entre lien et fichier
	$('#fichierselectedculture').bind('click', function() {
	  $("#lienCulture").hide("fast");
	  $("#fichierCulture").show("fast");
	});
	$('#lienselectedculture').bind('click', function() {
	  $("#lienCulture").show("fast");
	  $("#fichierCulture").hide("fast");
	});
	//Choisir entre lien et fichier
	$('#fichierselectedcommunication').bind('click', function() {
	  $("#lienCommunication").hide("fast");
	  $("#fichierCommunication").show("fast");
	});
	$('#lienselectedcommunication').bind('click', function() {
	  $("#lienCommunication").show("fast");
	  $("#fichierCommunication").hide("fast");
	});
 });