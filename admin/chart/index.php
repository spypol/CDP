<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>STP - Nombre de places vendues</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="CSS histogramme" />
        <!-- link to css data chart style sheet -->
        <link href="csschart.css" rel="stylesheet" type="text/css" media="screen" />
        <style type="text/css">
body {
	margin:0;
	padding:100px 0 0 200px;
	background:#fff;
	font:70% Arial, Helvetica, sans-serif;
	color:#555;
	/*line-height:180%;*/
}

#petit{
	font-size:60%;
	font-weight:normal;
	color:#555;
}

h1{
	font-size:180%;
	font-weight:normal;
	color:#555;
}
        </style>
    </head>
    <body>
        <h1>Nombre de places vendues <span id="petit">(en nombre de places)</span></h1>
	    <dl id="csschart">
         

   		<?php
				function switchDate($usDate){
					$usDate = explode('-', $usDate);
					$dates = $usDate[2].'/'.$usDate[1];
					return $dates;
				}

				include('connectionDB.php');
				$sqlseances = 'SELECT SEANCE_ID as seanceid, SEANCE_DATE as ladate, SEANCE_HEURE as heure, SALLE_NOM as sallenom FROM T_SEANCE, T_SALLE WHERE SEANCE_SALLE_ID = SALLE_ID ORDER BY SEANCE_DATE';
				$reponseSeances = mysql_query ($sqlseances) or die ('Erreur SQL !'.$sqlseances.'<br />'.mysql_error());
				
				$compteur = 0;

				while ($row=mysql_fetch_array($reponseSeances)){ 
					
						$ladate = switchDate($row['ladate']);
						$seanceid = $row['seanceid'];

						$sqlNbPlace = ' SELECT SUM( place_nombre ) AS nbplaces FROM T_PLACE WHERE place_achete =1 AND PLACE_TARIF_ID != 3 AND place_seance_id = ' . $seanceid;
						$nbPlace = mysql_query ($sqlNbPlace) or die ('Erreur SQL !'.$sqlNbPlace.'<br />'.mysql_error());
						$nbPlace = mysql_fetch_array($nbPlace);
						$nbPlace = $nbPlace['nbplaces'];
						$type = 1;
						$nbPlacep = $nbPlace	;
						
						if($nbPlace == '' ){ $nbPlacep = 0; }
						if($nbPlace >=50){ $type = 2; } elseif($nbPlace < 50 && $nbPlace > 10){ $type = 3;}
						//echo $ladate;
						if($compteur == 0){
							echo '<dd class="first">' .$ladate. '<span class="type' .$type. ' p' .$nbPlacep. '"><em>' .$nbPlace. '</em></span></dd>';
						} else{
							echo '<dd>' .$ladate. '<span class="type' .$type. ' p' .$nbPlacep. '"><em>' .$nbPlace. '</em></span></dd>';
						}
						$compteur = 1;
						//echo '<dd class="first"><span class="type2 p78"><em>78</em></span></dd>';
				}

				mysql_close();
			?>
        </dl>
    </body>
</html>