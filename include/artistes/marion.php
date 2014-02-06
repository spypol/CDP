<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/marion.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Marion Hunerfurst</span>
    <span class="details-infos">Costumière</span>
    
    <p>
       C'est après une formation en design et arts plastiques que Marion s'oriente vers le costume. Ce choix est alors motivé par son goût pour le spectacle vivant et le désir de participer aux projets qu'il occasionne. Ayant récemment obtenu un Diplôme des Métiers d'Art costumier réalisateur, c'est avec enthousiasme qu'elle débute dans le milieu professionnel au sein de créations théâtrales et cinématographiques. Les costumes d'Alice ont été réalisés par ses petites mains.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/marion.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/marion.jpg" alt=""/></a>
        </div>
    </div>
</article>

<script>
$(document).ready(function(){
	$('#photos-artiste').nivoSlider({
		controlNav: false,
		pauseTime: 3000
	});
    
    $('.preview-image').nivoLightbox();
});
</script>