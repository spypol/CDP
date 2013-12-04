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
		pauseTime: 300000
	});
	
	$('#photos-alice').nivoSlider({
		controlNav: false,
		pauseTime: 300000
	});
	
	$('#slider-homepage').nivoSlider({
		controlNav: false,
		pauseTime: 700000
	});
	
	$('#slider-alice').nivoSlider({
		controlNav: false,
		directionNav: false,
		pauseTime: 300000
	});
	
	$('#slider-stp').nivoSlider({
		controlNav: false,
		directionNav: false,
		pauseTime: 300000
	});
    
    $('#photos-artiste').nivoSlider({
		controlNav: false,
		pauseTime: 300000
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
    
});
