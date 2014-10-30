<?php $url = trim($_SERVER['REQUEST_URI'], '/');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>
            <?php 
            switch ($url) {
                case "":
                    echo "Compote de Prod";
                    break;
                case "alice":
                    echo "La Comédie Musicale Alice ! ";
                    break;
                case "ppp":
                    echo "La Comédie Musicale Peter Pan et les Pirates !";
                    break;
                case "peter-pan-et-les-pirates":
                    echo "La Comédie Musicale Peter Pan et les Pirates !";
                    break;
                case "artistes-alice":
                    echo "Les Artistes de la Comédie Musicale Alice !";
                    break;
                case "artistes-ppp":
                    echo "Les artistes de la Comédie Musicale Peter Pan et les Pirates !";
                    break;
                case "prod":
                    echo "Compote de Prod - Production";
                    break;
                case "partenaires":
                    echo "Devenez Partenaires de Compote de Prod";
                    break;
                case "presse":
                    echo "Communiqués de Presse Compote de Prod";
                    break;
                case "goodies":
                    echo "Goodies Compote de Prod";
                    break;
                case "contact":
                    echo "Contactez Compote de Prod";
                    break;
                case "acheter-ticket":
                    echo "Achetez vos tickets pour la Comédie Musicale Alice !";
                    break;
                case "acheter-cd":
                    echo "Goodies Compote de Prod";
                    break;
                case "presse-ecoutez-nous":
                    echo "Ecoutez nos trois chansons en avant première";
                    break;
            }
        ?>
        </title>
        
        <meta name="description" content="<?php 
            switch ($url) {
                case "":
                    echo "Alice aux pays des merveilles est une nouvelle comédie musicale à Paris produit par Compote de Prod (producteur de Souviens toi, Pan!). A travers, le monde fantastique d’Alice, tous les personnages loufoques (la méchantereine de coeur, le lapin blanc, la chenille, le chat du cheshire ou le chapelier fou) évoluent en chansons et danses, aﬁn de faire prendre conscience à l'héroïne de Lewis Caroll qu’il n’est pas toujours bon de grandir trop vite. Joué dans les théâtres de Paris, au Théatre Clavel ainsi qu’au Vingtième Théâtre, ce spectacle nous plonge au sein de notre imaginaire d’enfant, dans une musique d’ambiance jazz, dans le style des comédies musicales de Broadway. Un merveilleux spectacle musicale, pour les petits et les grands, avec des artistes de paris.";
                    break;
                case "alice":
                    echo "Alice aux pays des merveilles est une nouvelle comédie musicale à Paris produit par Compote de Prod (producteur de Souviens toi, Pan!). A travers, le monde fantastique d’Alice, tous les personnages loufoques (la méchantereine de coeur, le lapin blanc, la chenille, le chat du cheshire ou le chapelier fou) évoluent en chansons et danses, aﬁn de faire prendre conscience à l'héroïne de Lewis Caroll qu’il n’est pas toujours bon de grandir trop vite. Joué dans les théâtres de Paris, au Théatre Clavel ainsi qu’au Vingtième Théâtre, ce spectacle nous plonge au sein de notre imaginaire d’enfant, dans une musique d’ambiance jazz, dans le style des comédies musicales de Broadway. Un merveilleux spectacle musicale, pour les petits et les grands, avec des artistes de paris.";
                    break;
                case "peter-pan-et-les-pirates":
                    echo "La comédie musicale Peter Pan et les Pirates raconte la formidable histoire «Peter Pan» de l’auteur James Mattew Barrie. Peter Pan est un petit garçon qui refuse de grandir. En cherchant son ombre, il rencontre Wendy et Jean, il les emmène au pays imaginaire où il vont découvrir de nombreux personnages mystérieux.";
                    break;
                case "artistes-alice":
                    echo "La comédie musicale Alice est mise en scène par Marina Pangos et interprétée par des artiste de Paris, comédiens et chanteurs tels que Antonio Macipe (le chat du cheshire), Julie Lemas (la reine de coeur), Marie Oppert (Alice), Véronique Hatat (la chenille), Vincent Gilliéron (le lapin blanc) et Hervé Lewandowski (le chapelier fou et Lewis Caroll).";
                    break;
                case "artistes-ppp":
                    echo "La comédie musicale Souviens toi, Pan! est mise en scène par Grégory Pennaneac’h et interprétée par des artiste de Paris, comédiens et chanteurs tels que Antonio Macipe (Peter Pan), Joe Marshall (Wendy), Julie Lemas (Mouche), Ludovic Fert (Jean), Maeva Clamaron (Clochette), Maud Abeloos (Lily), Mélanie Duschene (Poussière), Nicolas Tatossian (la narrateur), Ralph Folio (Capitaine Crochet) et Raphaelle Raimon (chef indienne).";
                    break;
                case "prod":
                    echo "Compote de Prod réunit de multiples compétences professionnelles (communication, conseil, ﬁnance) aﬁn de produire des comédies musicales. Cette production propose aussi l'accompagnement d’artistes à Paris.";
                    break;
                case "partenaires":
                    echo "Faites comme les partenaires Novencia groupe et ISK Finance, un dossier de mécénat est en ligne aﬁn de rejoindre l’aventure d’Alice.";
                    break;
                case "presse":
                    echo "La comédie musicale Alice, produit par Compote de Prod, est au théatre Clavel à Paris. Le dossier de presse et le communiqué de presse sont en ligne pour les blogueurs ou journalistes de Paris.";
                    break;
                case "goodies":
                    echo "Voici les CDs des comédies musicales Alice et Souviens toi, Pan! La musique des spectacles pour une ambiance jazz et un voyage au pays de nulle part.";
                    break;
            }
        ?>">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/vendor/meanmenu.min.css">
		
		<!-- Nivo Slider-->
		<link rel="stylesheet" href="css/vendor/nivoslider/default/default.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/vendor/nivoslider/nivo-slider.css" type="text/css" media="screen" />
		
		<!-- Nivo Lightbox-->
		<link rel="stylesheet" href="css/vendor/nivolightbox/nivo-lightbox.css" type="text/css" />
		<link rel="stylesheet" href="css/vendor/nivolightbox/themes/default/default.css" type="text/css" />
		
		<!-- FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400italic,400|Roboto:400,400italic,700' rel='stylesheet' type='text/css'>
		
		<!-- PLAYER -->
		<link rel="stylesheet" href="player/css/progression-player.css" /><!-- Default Player Styles -->
		<link rel="stylesheet" href="player/css/skin-default-dark.css" /><!-- Minimal Dark Skin -->
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/ppp.css">
        
        <!-- Adaptive Images 
        <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>-->
        
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->