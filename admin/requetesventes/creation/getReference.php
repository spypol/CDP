<?php
	include('../../connectionDB.php');
	
	if(isset($_POST['prix'])) {
		//gestion des prix
		$sqlsalles = 'SELECT SALLE_ID as id, SALLE_NOM as nom FROM T_SALLE';
		$reponseSalles = mysql_query ($sqlsalles) or die ('Erreur SQL !'.$sqlsalles.'<br />'.mysql_error());
		
		$sqltarifs = 'SELECT TARIF_ID as id, TARIF_NOM as nom FROM T_TARIF';
		$reponseTarifs = mysql_query ($sqltarifs) or die ('Erreur SQL !'.$sqltarifs.'<br />'.mysql_error());
	?>
		<div class="ligne">
        	<label for="nomSalle">Salle : </label>
        	<select name="nomSalle" id="nomSalle">
	        <?php 
	        	while ($row1=mysql_fetch_array($reponseSalles)){ 
					$nom = utf8_encode($row1['nom']);
					echo '<option value="'.$row1['id'].'">'.$nom.'</option>';
	        	}
			?>
			</select>
        </div>
        <div class="ligne">
        	<label for="nomSalle">Tarif : </label>
        	<select name="nomTarif" id="nomTarif">
			<?php 
        		while ($row2=mysql_fetch_array($reponseTarifs)){
					$nom = utf8_encode($row2['nom']); 
					echo '<option value="'.$row2['id'].'">'.$nom.'</option>';
        		}
			?>
			</select>
        </div>
        <div class="ligne">
        	<label for="prix">Prix : </label><input type="text" name="prix" size="10" id="prix" value="" style="float:left; margin-left:3px; width:50px;"/> &#8364;
        </div>
	
	<?php
	} else {
		$nom = $_POST['nom'];
		$nomupper = strtoupper($nom);
	
		$sql = 'SELECT '.$nom.'_id as id, '.$nom.'_nom as nom FROM T_'.$nomupper.'';
		$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
	
		while ($row=mysql_fetch_array($reponse)){
		?>
		<li id="<?php echo $nom.'_'.$row['id']; ?>" class="modifiervente">
			<?php
			 	$label = utf8_encode($row['nom']);
				echo $label;
			?>
		</li>
		<?php
		}
		mysql_close();
		?>
		
		<script>
		$(document).ready(function(){
			$(".modifiervente").click(function(event){
				
				lid = this.id;
				lid = lid.split("_");
				nom = lid[0];
				lid = lid[1];

				if(nom == 'salle'){
					pagephp = 'getDataSalle.php';
				}else if(nom == 'tarif'){
					pagephp = 'getDataTarif.php';
				}else if(nom == 'spectateur'){
					pagephp = 'getDataSpectateur.php';
				}
				
				$("#titreDiv").html("Modifier "+nom);
				$.ajax({
				  type: "POST",
				  url: "requetesventes/creation/"+pagephp,
				  data: "lid=" + lid,
				  success: function(msg){
					msg = msg.split("_");
					if(nom == 'salle'){
						$("#nomSalle").attr('value', msg[1]);
						$("#capaciteSalle").attr('value', msg[2]);
						$("#adresseSalle").attr('value', msg[3]);
						$("#telSalle").attr('value', msg[4]);
						$("#salleid").attr('value', msg[0]);
					}else if(nom == 'tarif'){
						$("#nomTarif").attr('value', msg[1]);
						$("#tarifid").attr('value', msg[0]);
					}else if(nom == 'spectateur'){
						$("#nomSpectateur").attr('value', msg[1]);
						$("#prenomSpectateur").attr('value', msg[2]);
						$("#mailSpectateur").attr('value', msg[3]);
						$("#telSpectateur").attr('value', msg[4]);
						$("#spectateurid").attr('value', msg[0]);
					}
					  
					$("#lister").hide();
					$("#ajouter"+nom).show();
					
					$("body").animate({scrollTop:0}, 'slow');
				  }
				});
			});
		});
		</script>
		<?php
	}	
?>