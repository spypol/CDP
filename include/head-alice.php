<?php $url = trim($_SERVER['REQUEST_URI'], '/');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Compote de Prod - Alice</title>
        <meta name="description" content="<?php 
            switch ($url) {
                case "":
                    echo 'Théatre Clavel, Paris, rue Clavel, Réservez places, Compote de prod, spectacles, artistes, théatres, Souviens toi, Pan!, Alice';
                    break;
                case "alice":
                    echo "monde fantastique, le pays des merveilles, Alice, une méchante dame de coeur, un lapin blanc, une chenille, un chat, l’imaginaire d’Alice, Alice, grandir trop vite, les petits comme les grands, personnages fantastiques et délirants, univers tantôt fabuleux, univers tantôt inquiétant";
                    break;
                case "stp":
                    echo "Peter Pan, refuse de grandir, imagination d’enfants, Souviens-toi, Pan!";
                    break;
                case "artistes-alice":
                    echo "Antonio Macipe, le chat du cheshire, Julie Lemas, La reine de coeur, Alice, Marie Oppert, Véronique Hatat, La chenille, Vincent Gilliéron, Le lapin blanc, Hervé Lewandowski, Le chapelier fou, Lewis Caroll, danse, chant, Marina Pangos";
                    break;
                case "artistes-stp":
                    echo "Antonio Macipe, Peter Pan, Joe Marshall, Wendy, Julie Lemas, Ludovic Fert, Maeva Clamaron, Clochette, Maud Abeloos, Mélanie Duchesne, Nicolas Tatossian, Ralph Folio, Capitaine crochet, Raphaelle Raimon";
                    break;
                case "prod":
                    echo "artistes que nous soutiendrons et accompagnerons, musique, écriture, domaine artistique, projets artistiques, Compote de prod";
                    break;
                case "partenaires":
                    echo "Novencia groupe, ISK Finance, mécène, dossier de mécénat";
                    break;
                case "presse":
                    echo "spectacle Alice, notre spectacle, compote de prod";
                    break;
            }
        ?>">>
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
        <link rel="stylesheet" href="css/alice.css">
        
        <!-- Adaptive Images 
        <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>-->
        
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->