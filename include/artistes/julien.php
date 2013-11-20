<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/juliengoetz.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Julien Goetz</span>
    <span class="details-infos">Président</span>
    <span class="details-infos">Compositeur</span>
    <span class="details-infos">Arrangeur</span>
    
    <p>
        Autodidacte, sans formation musicale, c’est en couplant vie professionnelle et passion artistique qu’il parvient à composer des airs et des mélodies qui restent en tête dès la première écoute. C’est en se lançant dans une adaptation de "Notre-Dame de Paris" en 1999 que lui vient le goût des comédies musicales. Ainsi, il compose et créé "Cléopâtre, la légende d’une reine" en 2002, « Souviens-toi, Pan ! » en 2006 et « Troie » en 2007. « Alice » est ainsi sa quatrième création.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/julien1.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/julien1.jpg" alt=""/></a>
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