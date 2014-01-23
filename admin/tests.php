<?php
	
    echo realpath('tests.php');

	$currentFile = "SC15C---Qu'on-lui-tranche-la-tête!-(no-mix).mp3";
	

	//$nomFichierLien = strtr($currentFile, 'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');

    //$nomFichierLien = str_replace('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY', $currentFile);

    
	$nomFichierLien = strtr($currentFile, ' ÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝ', '-AAAAAACEEEEEIIIINOOOOOUUUUY');
	$nomFichierLien = strtr($nomFichierLien, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');

    echo $nomFichierLien;

	//$targetFile =  str_replace('//','/',$target_path) . $nomFichierLien;

	
?>