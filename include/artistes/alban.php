<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/alban.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Alban Jarossay</span>
    <span class="details-infos">Coiffeur / Maquilleur</span>
    
    <p>
        Coiffeur depuis une dizaine d’années, c’est en 2010 que ma carrière prend un tournant lorsque je décide de me former au métier de maquilleur. J’acquière ainsi de nouvelles compétences qui viennent compléter les précédentes et me permettent d’accéder aux métiers de l’image.Photos, clips, court-métrages, théâtre (présent sur <a href="stp.php" title="Souviens toi Pan">Souviens-toi, Pan !</a> avec Béa), je mets tout en œuvre afin de développer mon art.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/alban.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/alban.jpg" alt=""/></a>
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