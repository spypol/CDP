<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/julienbonneau.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Julien Bonneau</span>
    <span class="details-infos">Directeur de la Communication</span>
    <span class="details-infos">Décors</span>
    
    <p>
        Chanteur et compositeur lors de plusieurs spectacles musicaux par le passé, Julien est actuellement chef de projet en stratégie dans le secteur des médias. C’est donc avec enthousiasme, qu’après le succès de <a href="stp.php" title="Souviens toi Pan">Souviens-toi, Pan !</a>,  il a replongé dans l’aventure <a href="alice.php" title="Alice">Alice</a>, afin de mettre sa connaissance au service de sa passion. Membre fondateur de Compote de Prod, il signe les décors de la comédie musicale Alice.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/julienb1.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/julienb1.jpg" alt=""/></a>
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