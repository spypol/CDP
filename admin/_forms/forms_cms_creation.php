<!--- FORM D'AJOUT SALLE -->
<form action="requetescms/ajouterActu.php" class='venteForm' method="post" id="actualiteform" enctype="multipart/form-data" style="width:450px;" >
     <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 class="titreform">Ajouter une actualit&eacute;</h3>
     <div class="ligne">
     	<label for="nomContenu">Texte : </label>
		<textarea name="nomContenu" cols="70" rows="3" id="nomContenu"></textarea>
     </div>
     <div class="ligne" style="text-align:right;">
         <button type='submit'>Enregistrer</button>
     </div>
 </form>
 
 <!--- FORM D'AJOUT TARIF -->
<form action="requetesventes/creation/ajouterTarif.php" class='venteForm' method="post" id="ajoutertarif" enctype="multipart/form-data" >
     <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 class="titreform">Ajouter un tarif</h3>
     <div class="ligne">
     	<label for="nomSalle">Nom : </label><input type="text" name="nomTarif" size="40" id="nomTarif" value=""/>
     </div>
     <input type="hidden" name="tarifid" id="tarifid" value="" />
     <div class="ligne" style="text-align:right;">
         <button type='submit'>Enregistrer</button>
     </div>
 </form>
 
 <!--- FORM D'AJOUT SPECTATEUR -->
<form action="requetesventes/creation/ajouterSpectateur.php" class='venteForm' method="post" id="ajouterspectateur" enctype="multipart/form-data" >
     <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 class="titreform">Ajouter un spectateur</h3>

     <div class="ligne">
     	<label for="nomSpectateur">Nom : </label><input type="text" name="nomSpectateur" size="40" id="nomSpectateur" value=""/>
     </div>
     <div class="ligne">
     	<label for="prenomSpectateur">Pr&eacute;nom : </label><input type="text" name="prenomSpectateur" size="10" id="prenomSpectateur" value=""/>
     </div>
     <div class="ligne">
     	<label for="mailSpectateur">Mail : </label><input type="text" name="mailSpectateur" size="50" id="mailSpectateur" value=""/>
     </div>
     <div class="ligne">
     	<label for="telSalle">T&eacute;l&eacute;phone : </label><input type="text" name="telSpectateur" size="10" id="telSpectateur" value=""/>
     </div>
     <input type="hidden" name="spectateurid" id="spectateurid" value="" />
     <div class="ligne" style="text-align:right;">
         <button type='submit'>Enregistrer</button>
     </div>
 </form>
 
