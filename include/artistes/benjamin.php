<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/benjaminlandrot.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Benjamin Landrot</span>
    <span class="details-infos">Arrangeur</span>
    <span class="details-infos">Mixeur</span>
    
    <p>
        D'abord musicien autodidacte adepte de la scène, il nourrit depuis 15 ans une vraie passion pour les métiers de l'ombre du spectacle vivant. Débutant en 1998 avec l'apparition de la M.A.O. grand public, il se mesure ensuite aux défis de la sonorisation et des techniques audionumériques en live et en home studio. Benjamin prête aujourd'hui son expérience de musicien arrangeur et sa maîtrise du mixage pour mettre en musique le spectacle Alice.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/benjamin1.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/benjamin1.jpg" alt=""/></a>            
            <a href="_photos/troupe/alice/benjamin2.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/benjamin2.jpg" alt=""/></a>            
            <a href="_photos/troupe/alice/benjamin3.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/benjamin3.jpg" alt=""/></a>
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