<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/foteini.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Foteini Pangos</span>
    <span class="details-infos">Costumière</span>
    
    <p>
        Foteini Pangos est depuis toujours passionnée par la mode et le costume. Diplomee du Studio Bercot de Paris en 2006, elle évolue 4 ans en tant qu'attachée de presse mode pour de grandes marques européennes (benetton, mango, minelli) avant de se reconvertir dans le design d'accessoires et faire partie aujourdhui d'une grande maison de mode parisienne (Courreges) en tant que styliste chaussures et maronquinerie. Laureate du concours Aliveshoes, une plateforme de design collaboratif en ligne, elle developpe sa premiere ligne de basket en 2013 et c'est avec grand plaisir quelle se livre au jeu du pays des merveilles !
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/foteini1.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/foteini1.jpg" alt=""/></a>
            <a href="_photos/troupe/alice/foteini2.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/foteini2.jpg" alt=""/></a>
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