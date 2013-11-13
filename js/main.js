$(document).ready(function(){
	//MENU SMARTPHONE
	$('.smartphone nav').meanmenu({
		meanScreenWidth: "1140"
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
		pauseTime: 3000
	});
	
	$('#slider-stp').nivoSlider({
		controlNav: false,
		directionNav: false,
		pauseTime: 3000
	});
    
    $('#photos-artistes').nivoSlider({
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
  
    //ARTISTES
    function displayArtiste(artiste){
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
    
    $(".vignette").click(function(e){
		nom = this.id;
		displayArtiste(nom);
	});
    
});
