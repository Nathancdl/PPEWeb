<?php	if(!empty($membre))
		{
			foreach ($membre as $info)
			{
						
					
					
						/*?>
						<div class="tableau_container valign-wrapper" id="<?php echo $salarie["contenu"]."|".$salarie["nb_jour"]."|".$formation["idformation"];?>">
					<table class="hoverable" >
						<tr>
							<td><?php echo $formation["date"];?></td>
							<td><?php echo $formation["nb_jour"]." jours";?></td>
						</tr>
						<tr>
							<td colspan=2><?php echo $formation["contenu"]; ?></td>
						</tr>
						<tr>
							<td colspan=2><?php echo "".$formation["numero"].",";  echo $formation["rue"]; ?></td>
						</tr>
						<tr>
							<td><?php
				//echo $formation_a_valider ["prestataire_idprestataire"];
				$prestataire = chercherPrestataire($formation["idprestataire"]);
				echo $prestataire["nom"];
				?></td>
							<td><?php echo $formation["prerequis"]; ?></td>
						</tr>
					</table>
					
					</div>
						<?php */
					
				
		
?>
<div class="container" style="margin-top:90px;">
    		<div class="card-panel z-depth-5">
		<div class="row">
			<div class="col s12 m6">
			
			
		
		<h4 class="center"><?php echo "".strtoupper($info["nomf"])."";?></h4>	 
<div class="row">
  <form class="col s12 m12">
    <div class="row">
      <div class="input-field col s12 m12">
        <i class="mdi-action-account-circle prefix"></i>
          <h1 id="icon_prefix" type="text" class="validate"></h1>
        <label for="icon_prefix"><?php echo "".$info["prenom"]."";?></label>
      </div>
      
      <div class="input-field col s12 m12">
        <i class="mdi-communication-email prefix"></i>
          <h1 id="icon_email" type="email" class="validate"></h1>
        <label for="icon_email"><?php echo $info["capital_formation"];?></label>
      </div>
      
     
          <div class="input-field col s12 m12">
          <i class="mdi-editor-mode-edit prefix"></i>
          <h1 id="icon_email" type="text" class="validate"></h1>
         <label for="icon_prefix2"> <a href='mailto:<?php echo $info["email"]; ?>'><?php echo $info["email"]; ?></a></label>
        </div>
          <div class="input-field col s12 m12">
          <i class="mdi-editor-mode-edit prefix"></i>
          <h1 id="icon_email" type="text" class="validate"></h1>
          <label for="icon_prefix2"><?php echo "".$info["numeroRue"].", "; echo $info["rue"]; ?></label>
        </div>
    
        
    </div><!--row-->
  </form>
 <?php foreach ($membre as $salarie)
			{
				$formations = chercherValidation($salarie["idsalarie"]);
				if(!empty($formations))
				{
						
					echo "<h4>Ses formations</h4>";
					foreach ($formations as $formation)
					{
						?>
					
						 <div class='col s12 m6' id="<?php echo $salarie["nomf"]."|".$salarie["idsalarie"]."|".$formation["idformation"];?>">
          <div class='card blue-grey darken-1'>
            <div class='card-content white-text'>
              <span class='card-title'><?php echo $formation["date"];?></span>
              <p><?php echo $formation["nb_jour"]." jours";?></p>
               <p><?php echo $formation["contenu"]; ?></p>
               <p> <?php echo $formation["rue"]; ?></p>
               <p><?php
				//echo $formation_a_valider ["prestataire_idprestataire"];
				$prestataire = chercherPrestataire($formation["idprestataire"]);
				echo $prestataire["nom"];
				?></p>
               <p><?php echo $formation["prerequis"]; ?></p>
            </div>
            <div class='card-action'>
              
              <a href=''>Voir plus</a>
            </div>
          </div>
      
					<div class="waves-effect waves-light etat_validee valign">Valider</div>
					<div class="waves-effect waves-light etat_refusee valign">Refuser</div>
					    </div>
						<?php 
					}
				}
				else
				{
					echo "<div class='erreur valign'>".strtoupper($salarie['nomf'])."  ".$salarie['prenom']."  n'a aucune formation à valider pour le moment</div>";
				}
			}
   ?>
</div><!--row-->




</div><!--col-->





<div class="col s12 m5 offset-m1">
	<br>
	<br>
	

<?php if(!empty($commune))
		{foreach ($commune as $infos)
			{  $s = array('monnum' => $info['numeroRue'],'marue' => $info['rue'], 'monlibelle' => $infos['libelle']);?>
	
	 <form>
              <input  type="text" id="adresse" value='<?php  echo $s["monnum"]." "; echo $s["marue"]." "; echo $s["monlibelle"]; }}?>'/>
              <input type="button" class="btn waves-effect waves-light center"  value="Localiser" onclick="TrouverAdresse();"/><br><br>
                </form>
                <span id="text_latlng"></span>
                    <div id="map-canvas" style="float:right;height:220px;width:100%"></div>
        </div>



      </div><!--row-->
    </div><!--card-->
</div><!--conatiner-->
	
           <?php	
            }
		} 

    
    
     			
		
			
		
		?>