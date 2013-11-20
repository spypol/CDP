<!-------------------------- Photo -------------------------->
<article id="artiste-details">
    <img src="_photos/troupe/alice/avatars/nicolaslaustriat.jpg" class="portrait"/>
    <span class="details-infos" id="details-name">Nicolas Laustriat</span>
    <span class="details-infos">Auteur</span>
    
    <p>
        Son envie de devenir guitariste fut révélée en 2003 par deux monstres sacrés de la musique que sont Jean-Jacques Goldman et The Edge (U2). C’est ensuite qu’il s’essaie à la composition et à l’écriture de paroles de chansons et c’est en 2009 qu’il s’intéresse à l’univers de l’enregistrement studio. En 2011 il est responsable de l’édition du DVD du spectacle Souviens-toi, Pan !. Membre fondateur de Compote de Prod, il signe les paroles de plusieurs titres de la comédie musicale Alice.
    </p>
</article>

<!-------------------------- Photo -------------------------->
<article id="artiste-gallerie">
    <div class="slider-wrapper theme-default">
        <div id="photos-artiste" class="nivoSlider">
            <a href="_photos/troupe/alice/nicolas1.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/nicolas1.jpg" alt=""/></a>
            <a href="_photos/troupe/alice/nicolas2.jpg" data-lightbox-gallery="gallery-stp" class="preview-image">
                <img src="_photos/troupe/alice/nicolas2.jpg" alt=""/></a>
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