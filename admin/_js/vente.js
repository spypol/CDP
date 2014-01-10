$(document).ready(function(){
	/*----------------------------------*/
	/*--------AFFICHER/CACHER-----------*/
	/*----------------------------------*/
	$("#afficherprix").mouseover(function(event){
		$.ajax({
		  type: "POST",
		  url: "requetesventes/creation/lesPrix.php",
		  success: function(msg){
			$("#titreDivPrix").html("Les prix");
			$("#listeelementPrix").html(msg);
			$("#venteDivPrix").show();
		  }
		});
		
	});
	$("#afficherprix").mouseout(function(event){
		$(".venteDiv").hide();
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
	$(".lister").click(function(event){
		nom = this.id;
		$("#titreDiv").html("Modifier "+nom);
		$.ajax({
		  type: "POST",
		  url: "requetesventes/creation/getReference.php",
		  data: "nom=" + nom,
		  success: function(msg){
			$("#listeelement").html(msg);
			$("#lister").show();
			$("body").animate({scrollTop:0}, 'slow');
		  }
		});
	});
	
	$(".completer").click(function(event){
		
		idseance = this.id;
		idseance = idseance.split("_");
		idseance = idseance[0];
		
		$.ajax({
		  type: "POST",
		  url: "requetesventes/seance/completerSeance.php",
		  data: "idseance=" + idseance,
		  success: function(msg){
		  
			if(msg == '1'){
				$("#"+idseance+"_s").attr('src', 'images/complet.png');	
			} else {
				$("#"+idseance+"_s").attr('src', 'images/valid.png');	
			}
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
	
	
	$("#ajouterUnePlace").click(function(event){
		$("#ajouterPlaceAchetee").show();
		$("body").animate({scrollTop:0}, 'slow');
	});
	
	$(".pricer").click(function(event){
		lid = this.id;
		$.ajax({
		  type: "POST",
		  url: "requetesventes/creation/getReference.php",
		  data: "prix=1",
		  success: function(msg){
			$("#prixelement").html(msg);
			
			$("#"+lid).show();
			$("body").animate({scrollTop:0}, 'slow');
		  }
		});
	});

	/*----------------------------------*/
	/*--------------AUTRE---------------*/
	/*----------------------------------*/
	//Fermer les formulaires
	$(".closeBox").click(function(event){
		$(".venteForm").hide();
		$(".venteDiv").hide();
	});
	
	//Calendrier
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true,
        selectOtherMonths: true
    });
	
 });