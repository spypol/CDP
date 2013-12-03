<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/beatrice.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Béatrice Han Ching</span>
    <span class="details-infos">Maquilleuse</span>
    
    <p>
        Arrivée à Paris en 2007 pour faire une école d'esthétique, elle a ensuite suivi des formations plus approfondies au sein d'ateliers professionnels afin de préciser ses compétences dans le domaine du maquillage et de la manucure.
Après avoir longtemps hésité à se lancer à plein temps dans ce métier, ses contacts avec le milieu du théâtre ont fini par la convaincre.
Elle travaille maintenant essentiellement dans l'audiovisuel (publicité, courts-métrage) tout en continuant son évolution dans le spectacle vivant, ce qui lui permet de continuer à développer son sens artistique et de continuellement le perfectionner.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/bea.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/bea.jpg" alt=""/></a>
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