<div id="pagechart" class="popup popupChart">
	<a class="popupContactClose">x</a>

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

					$sqlNbPlace = ' SELECT SUM( place_nombre ) AS nbplaces FROM T_PLACE WHERE place_achete =1 AND place_seance_id = ' . $seanceid;
					$nbPlace = mysql_query ($sqlNbPlace) or die ('Erreur SQL !'.$sqlNbPlace.'<br />'.mysql_error());
					$nbPlace = mysql_fetch_array($nbPlace);
					$nbPlace = $nbPlace['nbplaces'];
					$type = 3;
					$nbPlacep = $nbPlace	;
					
					if($nbPlace == '' ){ $nbPlacep = 0; }
					if($nbPlace >90){ $type = 1; } elseif($nbPlace < 80){ $type = 2;}
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
	
</div>