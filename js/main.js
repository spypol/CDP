$(document).ready(function(){
	//MENU SMARTPHONE
	$('.smartphone nav').meanmenu({
		meanScreenWidth: "1140"
	});
    
    //MENU LAPTOP
    $(".menu-item-2").click(function(e){ 
        $ul = $(this).children("ul");
        if($ul.height() > 0){
            $ul.css("height", "0px");
        } else {
            $ul.css("height", "90px");
        }
    });
    
	//NIVOSLIDER
	$('#photos-stp').nivoSlider({
		controlNav: false,
		pauseTime: 3000
	});
	
	$('#photos-alice').nivoSlider({
		controlNav: false,
		pauseTime: 3000
	});
	
	$('#slider-homepage').nivoSlider({
		controlNav: false,
		pauseTime: 7000
	});
	
	$('#slider-alice').nivoSlider({
		controlNav: false,
		directionNav: false,
		pauseTime: 7000
	});
	
	$('#slider-stp').nivoSlider({
		controlNav: false,
		directionNav: false,
		pauseTime: 7000
	});
    
    $('#photos-artiste').nivoSlider({
		controlNav: false,
		pauseTime: 3000
	});
	
	//NIVOLIGHTBOX
	$('.preview-image').nivoLightbox();
	
	
	//FLEXSLIDER
	/*$('#topslider').flexslider({
		animation: "slide",
	});*/

	// Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
	/*$("#videostp")
	.fitVids()
	.flexslider({
	  animation: "slide",
	  useCSS: false,
	  animationLoop: false,
	  smoothHeight: true,
	  before: function(slider){
		$f(player).api('pause');
	  }
	});*/
	
	$("#articles").fitVids();
	
	$("#articles-left").fitVids();
	
	$("#articles-right").fitVids();
	
	//MUSIC PLAYER
	$('.progression-single').mediaelementplayer({
		audioWidth: 250, // width of audio player
		audioHeight: 30, // height of audio player
		startVolume: 0.8, // initial volume when the player starts
		features: ['playpause', 'current', 'progress', 'duration', 'tracks', 'volume', 'fullscreen']
	});
	
	$('.progression-playlist').mediaelementplayer({
		audioWidth: 960, // width of audio player
		audioHeight: 30, // height of audio player
		startVolume: 0.5, // initial volume when the player starts
		loop: false, // useful for <audio> player loops
		features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'current', 'progress', 'tracks', 'duration', 'volume', 'playlist'],
		playlist: false, //Playlist Show
		playlistposition: 'bottom' //Playlist Location
	});
	
	//READMORES
	$('#histoire').readmore({maxHeight: 465, sectionCSS: 'display: inline-block;'});
	$('#spectacle').readmore({maxHeight: 465, sectionCSS: 'display: inline-block;'});
  
    //ARTISTES-ALICE
    function displayArtisteAlice(artiste){
		$("#details").html("<img src='img/preloader.gif' class='preloader'>");

		$.ajax({
		  url: "include/artistes/"+artiste+".php",
		  cache: false,
		  success: function(html){
			$("#details").html(html);
		  }
		});

		$("#details").fadeIn("slow");
	}
    
    $(".artistes-alice").click(function(e){
		nom = this.id;
		displayArtisteAlice(nom);
	});
    
    //ARTISTES-STP
    function displayArtisteSTP(artiste){
		$("#artiste-details").html("<img src='img/preloader.gif' class='preloader'>");

		$.ajax({
		  url: "include/artistes/stp/"+artiste+".php",
		  cache: false,
		  success: function(html){
			$("#artiste-details").html(html);
		  }
		});

		$("#artiste-details").fadeIn("slow");
	}
    
    $(".artistes-stp").click(function(e){
		nom = this.id;
		displayArtisteSTP(nom);
	});
    
    //PRODUCTION
    function displayProd(artiste){
		$("#artiste-details").html("<img src='img/preloader.gif' class='preloader'>");

		$.ajax({
		  url: "include/artistes/"+artiste+".php",
		  cache: false,
		  success: function(html){
			$("#artiste-details").html(html);
		  }
		});

		$("#artiste-details").fadeIn("slow");
	}
    
    $(".prod").click(function(e){
		nom = this.id;
		displayProd(nom);
	});
    
    
    //ACHAT TICKET
    //Formulaire d'achat
    $("#validAchat").click(function(event){
    
        event.preventDefault();

        var i = 0; var j = 0;
        var champs = '';
        
        $("#champsAlert").css('display', 'none');
        $("#champsAlert2").css('display', 'none');
        
        if($("#nomSpectateur").val() == ''){
            i++;
            champs += 'Nom ';
        }
        if($("#prenomSpectateur").val() == ''){
            i++;
            champs += 'Prénom ';
        }
        if($("#mailSpectateur").val() == ''){
            i++;
            champs += 'Mail ';
        }
        if($("#nbtarifadulte").val() + $("#nbtarifenfant").val() + $("#nbtarifreduit").val() == 0){
            j++;
        }
        
        if(i>0 || j>0){
            $("#champsAlert").css('display', 'block');
            if(i==1){
                $("#champsAlert").html('Veuillez remplir le champs : ' + champs);
            }else{
                $("#champsAlert").html('Veuillez remplir les champs : ' + champs);
            }
            
            if(j==1){
                $("#champsAlert2").css('display', 'block');
                $("#champsAlert2").html('Veuillez sélectionner au moins une place');
            }
        }else{
            
            $.ajax({
              type: "GET",
              url: "include/validAchat.php",
              data: "nomSpectateur=" + $("#nomSpectateur").val() + 
            "&prenomSpectateur=" + $("#prenomSpectateur").val() + 
            "&mailSpectateur=" + $("#mailSpectateur").val() + 
            "&telSpectateur=" + $("#telSpectateur").val() + 
            "&nbtarifadulte=" + $("#nbtarifadulte").val() + 
            "&nbtarifenfant=" + $("#nbtarifenfant").val() + 
            "&nbtarifreduit=" + $("#nbtarifreduit").val() + 
            "&idseance=" + $("#idseance").val(),
              success: function(msg){
                $("#acheter-cd").html(msg);
              }
            });
        }
    });
    
    
});
