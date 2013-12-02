<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/caroline.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Caroline Goetz</span>
    <span class="details-infos">Dessinatrice</span>
    
    <p>
    Son arme pr&eacute;f&eacute;r&eacute;e est le crayon &agrave; papier, son ennemi la feuille blanche. Son univers imaginaire s&rsquo;alimente des univers de Tim Burton et Sandrine Gestin. D&eacute;j&agrave; dessinatrice pour le lyc&eacute;e Charles Frey de Strasbourg, nous retrouverons ses traits de crayon dans les dessins et affiches du spectacle.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/caroline.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/caroline.jpg" data-thumb="_photos/troupe/alice/caroline.jpg" alt=""/></a>
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