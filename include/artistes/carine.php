<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/ppp/avatars/carine.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Carine Grimonpont</span>
    <span class="details-infos">Costumière</span>
    
    <p>
        Après des études en arts appliqués et textiles, Carine a découvert avec passion les domaines du spectacle et du cinéma. Son DMA de costumier réalisateur en poche, elle part en stage à l'étranger pour se perfectionner. Elle se consacre maintenant pleinement à la création de costumes. En duo avec Marion elles ont réalisé les costumes de Peter Pan et les pirates.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/ppp/carine1.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/ppp/carine1.jpg" alt=""/></a>
            <a href="_photos/troupe/ppp/carine2.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/ppp/carine2.jpg" alt=""/></a>
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