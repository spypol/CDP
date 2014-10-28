<?php
    function switchDate($usDate){
        setlocale(LC_TIME, 'fr_FR.utf8');
        //$usDate = explode('-', $usDate);
        $dates = $usDate[2].'/'.$usDate[1].'/'.$usDate[0];
        $dates = strftime("%A %d %B %Y", strtotime($usDate));
        return $dates;
    }
    
    //include $_SERVER['DOCUMENT_ROOT']."connection.php";
    include('connectionDB.php');
    
    $lejour = $_GET["jour"];
    
    $sqlseances = 'SELECT SEANCE_ID as seanceid, SEANCE_DATE as ladate, SEANCE_HEURE as heure, SALLE_NOM as sallenom FROM T_SEANCE, T_SALLE WHERE SEANCE_SALLE_ID = SALLE_ID AND SEANCE_COMPLETE = 0 ORDER BY SEANCE_DATE';
    $reponseSeances = mysql_query ($sqlseances) or die ('Erreur SQL !'.$sqlseances.'<br />'.mysql_error());
    
    if($lejour > 0){
        $sqlseancechoisie = 'SELECT SEANCE_ID as seanceid FROM T_SEANCE WHERE SEANCE_DATE = "2011-07-'.$lejour.'"';
        $reponseSeancechoisie = mysql_query ($sqlseancechoisie) or die ('Erreur SQL !'.$sqlseancechoisie.'<br />'.mysql_error());
        
        while ($row=mysql_fetch_array($reponseSeancechoisie)){ 
            $IDseancechoisie = $row['seanceid'];
        }
    }
    
    $sqlPrixAdulte = 'SELECT PRIX_VALEUR FROM T_PRIX WHERE PRIX_TARIF_ID = 1 AND PRIX_SALLE_ID = 2';
    $prixAdulte = mysql_query ($sqlPrixAdulte) or die ('Erreur SQL !'.$sqlPrixAdulte.'<br />'.mysql_error());
    $prixAdulte = mysql_fetch_array($prixAdulte);
    $prixAdulte = $prixAdulte['PRIX_VALEUR'];
    
    $sqlPrixReduit = 'SELECT PRIX_VALEUR FROM T_PRIX WHERE PRIX_TARIF_ID = 4 AND PRIX_SALLE_ID = 2';
    $prixReduit = mysql_query ($sqlPrixReduit) or die ('Erreur SQL !'.$sqlPrixReduit.'<br />'.mysql_error());
    $prixReduit = mysql_fetch_array($prixReduit);
    $prixReduit = $prixReduit['PRIX_VALEUR'];

    $sqlPrixEnfant = 'SELECT PRIX_VALEUR FROM T_PRIX WHERE PRIX_TARIF_ID = 2 AND PRIX_SALLE_ID = 2';
    $prixEnfant = mysql_query ($sqlPrixEnfant) or die ('Erreur SQL !'.$sqlPrixEnfant.'<br />'.mysql_error());
    $prixEnfant = mysql_fetch_array($prixEnfant);
    $prixEnfant = $prixEnfant['PRIX_VALEUR'];
?>

<?php include('include/head.php'); ?>
	<?php include('include/slider-alice-static.php'); ?>

        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
				
				<div id="articles">
							
					<!-------------------------- ************** -------------------------->
					<!-------------------------- CONTACT COLUMN -------------------------->
					<!-------------------------- ************** -------------------------->
					<article id="acheter-cd">
						
                        <section>
                        
                                <h1>Réservez vos tickets !</h1>
                                <span id="billetreduc">
                                    Ou directement sur 
                                    <a href="http://www.billetreduc.com/110043/evt.htm?nr=1" title="BilletReduc">
                                        <img src="img/Billetreduc.png" name="BilletReduc" alt="BilletReduc" id="billetreduc-img" />
                                    </a>
                                </span>
                            
                                <p>Après achat, vous recevrez directement vos billets par e-mail</p>
                            
                                <form action="achatValider.php" class='form-acheter-ticket' method="post" id="achat" enctype="multipart/form-data" >
                                        <label for="nomSpectateur" class="lt-ie9 label-ticket">*Nom</label>
                                        <input type="text" name="nomSpectateur" size="40" id="nomSpectateur" placeholder="*Nom" value=""/>
                                        <label for="prenomSpectateur" class="lt-ie9 label-ticket">*Prénom</label>
                                        <input type="text" name="prenomSpectateur" size="40" id="prenomSpectateur" value="" placeholder="*Prénom" />
                                        <label for="mailSpectateur" class="lt-ie9 label-ticket">*Email</label>
                                        <input type="email" name="mailSpectateur" size="40" id="mailSpectateur" value="" placeholder="*Email" />
                                        <span class="explication">Entrez un mail valide pour pouvoir recevoir votre ticket &eacute;lectronique</span>
                                        <label for="telSpectateur" class="lt-ie9 label-ticket">*Numéro de téléphone</label>
                                        <input type="tel" name="telSpectateur" size="40" id="telSpectateur" value="" placeholder="Numéro de téléphone" />
                                        
                                        <div class="dropdowns">
                                            <label for="nbtarifadulte"> Nombre de places adulte - <?php echo $prixAdulte.' €'; ?></label>
                                            <select name="nbtarifadulte" id="nbtarifadulte">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                        
                                        <div class="dropdowns">
                                            <label for="nbtarifreduit"> Nombre de places tarif réduit (étudiants, chômeurs - un justificatif vous sera demandé sur place) - <?php echo $prixReduit.' €'; ?></label>
                                            <select name="nbtarifreduit" id="nbtarifreduit">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    
                                        <div class="dropdowns">
                                            <label for="nbtarifenfant"> Nombre de places enfant (-12 ans) - <?php echo $prixEnfant.' €'; ?></label>
                                            <select name="nbtarifenfant" id="nbtarifenfant">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                        
                                        <div class="dropdowns">
                                            <label for="idseance">Choisissez la séance au Théâtre Clavel à 19h30 (ATTENTION, le Samedi 8 Novembre la séance est à 10h30)</label>
                                            <select name="idseance" id="idseance">
                                            <?php
                                    
                                                while ($row=mysql_fetch_array($reponseSeances)){ 
                                                    $sallenom = utf8_encode($row['sallenom']);
                                                    $heure = $row['heure'];
                                                    $ladate = switchDate($row['ladate']);
                                                    $seanceid = $row['seanceid'];
                                                    
                                                    
                                                    $sqlNbPlace = ' SELECT SUM( place_nombre ) AS nbplaces FROM T_PLACE WHERE place_achete =1 AND place_seance_id = ' . $seanceid;
                                                    $nbPlace = mysql_query ($sqlNbPlace) or die ('Erreur SQL !'.$sqlNbPlace.'<br />'.mysql_error());
                                                    $nbPlace = mysql_fetch_array($nbPlace);
                                                    $nbPlace = $nbPlace['nbplaces'];
                                                    
                                                    if($nbPlace <= 80){
                                                        if($lejour > 0 && $IDseancechoisie == $seanceid){
                                                            echo '<option value="'.$seanceid.'" selected>'.$ladate.'</option>';
                                                        } else {
                                                            echo '<option value="'.$seanceid.'">'.$ladate.'</option>';
                                                        }
                                                    }
                                                }
                                                mysql_close();
                                                
                                            ?>
                                            </select>
                                        </div>
                                    
                                    <input id="validAchat" class="bouton-rouge" name="submit" type="submit" value="ACHETER">
                                </form>
                                
                                <div id="champsAlert"></div>
                                <div id="champsAlert2"></div>
                                
                        </section>
                 
					</article>				
			     </div>	
            </div> <!-- #main -->
        </div> <!-- #main-container -->
		
<?php include('include/footer.php'); ?>