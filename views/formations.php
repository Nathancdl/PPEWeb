            <?php	if(!empty($formation))
                    {
                        foreach ($formation as $info)
                        {


                                foreach ($formation as $formation)
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
                                }


            ?>
            <div class="container" style="margin-top:90px;">
                        <div class="card-panel z-depth-5">
                    <div class="row">
                        <div class="col s12 m6">



                    <h4 class="center"><?php echo "".strtoupper($info["contenu"])."";?></h4>	 
            <div class="row">
              <form class="col s12 m12">
                <div class="row">
                  <div class="input-field col s12 m12">
                    <i class="mdi-action-account-circle prefix"></i>
                      <h1 id="icon_prefix" type="text" class="validate"></h1>
                        <label for="icon_prefix"><?php echo "".$info["contenu"]."";?></label>
                          </div>
                        <div class="input-field col s12 m12">
                            <i class="mdi-action-account-circle prefix"></i>
                              <h1 id="icon_prefix" type="text" class="validate"></h1>
                                <label for="icon_prefix">Proposer par : <?php echo $presta["nomf"];?></label>
                              </div>
                             <div class="input-field col s12 m12">
                                <i class="mdi-communication-email prefix"></i>
                                <h1 id="icon_email" type="email" class="validate"></h1>
                                <label for="icon_email"><?php echo $info["date"];?></label>
                              </div>
                             <div class="input-field col s12 m12">
                                  <i class="mdi-editor-mode-edit prefix"></i>
                                  <h1 id="icon_email" type="text" class="validate"></h1>
                                  <label for="icon_prefix2"><?php echo $info["nb_jour"]." jours";?></label>
                                </div>
                      <div class="input-field col s12 m12">
                      <i class="mdi-editor-mode-edit prefix"></i>
                      <h1 id="icon_email" type="text" class="validate"></h1>
                      <label for="icon_prefix2"><?php echo $info["prerequis"];?></label>
                    </div>
                      <div class="input-field col s12 m12">
                      <i class="mdi-editor-mode-edit prefix"></i>
                      <h1 id="icon_email" type="text" class="validate"></h1>
                      <label for="icon_prefix2"><?php echo "".$info["numero"].", "; echo $info["rue"]; ?></label>
                    </div>


                </div><!--row-->
              </form>

            </div><!--row-->
             <button class="btn waves-effect waves-light center" type="submit" name="action">S'inscrire&nbsp;
                <i class="mdi-content-send"></i>
              </button>



            </div><!--col-->
                <div class="col s12 m5 offset-m1">
                <br>
                <br>
                <p>
            
            <?php if(!empty($commune))
                    {foreach ($commune as $infos)
                        {    $s = array('monnum' => $info['numero'],'marue' => $info['rue'], 'monlibelle' => $infos['libelle']);?>
                </p>
             <form>
              <input  type="text" id="adresse" value='<?php  echo $s["monnum"]." "; echo $s["marue"]." "; echo $s["monlibelle"];}} ?>'/>
              <input type="button"  value="Localiser sur Google Map" onclick="TrouverAdresse();"/><br><br>
                </form>
                <span id="text_latlng"></span>
                    <div id="map-canvas" style="float:right;height:220px;width:500px"></div>
                    </div>



                  </div><!--row-->
                </div><!--card-->
            </div><!--container-->
                <?php	} }  ?>
