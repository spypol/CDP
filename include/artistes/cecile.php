<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/cecile.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Cécile Clavier</span>
    <span class="details-infos">Auteure</span>
    
    <p>Diplômée de Télécom Ecole de Management, professionnelle de la communication et des médias, Cécile 
profite de son temps de loisirs pour s'impliquer dans des créations artistiques. Après une première 
expérience des planches à l'âge de 6 ans, elle a côtoyé la scène pendant 20 ans : clubs théâtre, cours du
soir au conservatoire et au cours Simon... Elle a finalement rejoint une troupe d'improvisation théâtrale et
s'est produite pendant 3 ans à Paris. Cécile est également très attirée par l'écriture et les arts plastiques 
(dessin, peinture). Elle a été exposée à Serris et a déjà gagné des concours. Cécile a participé à l'écriture 
des chansons de "Souviens toi Pan". Elle est notamment l'auteur de "Bienvenue" (Tic-Tac o’Taquet !) ou 
de la chanson des indiens. C'est donc tout naturellement qu'elle a accepté de faire partie de cette nouvelle 
aventure, pour découvrir ses allitérations mises en musique...</p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/cecile.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/cecile.jpg" data-thumb="_photos/troupe/alice/cecile.jpg" alt=""/></a>
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