<!--- FORM D'AJOUT SALLE -->
<form action="requetesventes/creation/ajouterSalle.php" class='venteForm' method="post" id="ajoutersalle" enctype="multipart/form-data" >
     <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 class="titreform">Ajouter une salle</h3>
     <div class="ligne">
     	<label for="nomSalle">Nom : </label><input type="text" name="nomSalle" size="40" id="nomSalle" value=""/>
     </div>
     <div class="ligne">
     	<label for="capaciteSalle">Capacit&eacute; : </label><input type="text" name="capaciteSalle" size="10" id="capaciteSalle" value=""/>
     </div>
     <div class="ligne">
     	<label for="adresseSalle">Adresse : </label><input type="text" name="adresseSalle" size="50" id="adresseSalle" value=""/>
     </div>
     <div class="ligne">
     	<label for="telSalle">T&eacute;l&eacute;phone : </label><input type="text" name="telSalle" size="10" id="telSalle" value=""/>
     </div>
     <input type="hidden" name="salleid" id="salleid" value="" />
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
 
 <!--- FORM DE GESTION DES PRIX -->
<form action="requetesventes/creation/ajouterPrix.php" class='venteForm' method="post" id="ajouterprix" enctype="multipart/form-data">
     <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 class="titreform">G&eacute;rer les prix</h3>
     <div id="prixelement"></div>
     <input type="hidden" name="elementid" id="elementid" value="" />
     <div class="ligne" style="text-align:right;">
         <button type='submit'>Enregistrer</button>
     </div>
 </form>
 
<!-- BOX DE MODIFICATION -->
<div class='venteDiv' id="lister">
    <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 id="titreDiv"></h3>
    <ul id="listeelement">
    	
    </ul>
</div>

<!-- BOX DE LISTAGE DES PRIX -->
<div class='venteDiv' id="venteDivPrix">
    <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 id="titreDivPrix"></h3>
    <ul id="listeelementPrix">
    	
    </ul>
</div>