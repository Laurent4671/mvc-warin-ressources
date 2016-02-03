

		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Liste des sous-catégories</h1>
          <ol class="breadcrumb">
            <li><a href="index.php?p=login"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des sous-catégories</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
		
			<div class="col-md-12">
			
				<?php echo $msg; ?><!-- /.box-body -->
				
				<div class="box box-info">
				
				<div class="box-footer clearfix">
					<div><a class='btn btn-sm btn-success' href="">Ajouter une sous-catégorie</a></div>
				</div>
				
                <div class="box-body">
                  <table class="table table-bordered">
				  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Sous-catégories</span></th>
                      <th style="width: 185px">Actions</th>
                    </tr>
					
                    <?php
                    // traitement des données					
                    if(is_array($result)){
                        foreach($result as $r){
						
                            $sous_categ_id    = convertFromDB($r["sous_categ_id"]);
                            $sous_categ_titre = convertFromDB($r["sous_categ_titre"]);
                            $is_visible      = convertFromDB($r["is_visible"]);

                            $class_visible = "";
                            if($is_visible == 0){
                                $class_visible = " class='no_visible'";
                            }

                            ?>
                            <tr>
                                <td<?php echo $class_visible; ?>><?php echo $sous_categ_id; ?></td>
                                <td<?php echo $class_visible; ?>><?php echo $sous_categ_titre; ?></td>
                                <td>
                                    <!-- Icons -->
                                    <?php
                                    if($is_visible == "1"){
                                    ?>
									<!--// bouton de modification-->
									<a class='btn btn-warning' href='index.php?p=admin_sous_categs&action=update&id=<?php echo $sous_categ_id; ?>'>Modifier</a>
									
									
									<!--// bouton de suppression-->
									<a class='btn btn-danger' href='index.php?p=admin_sous_categs&action=delete&id=<?php echo $sous_categ_id; ?>'>Supprimer</a>
									<?php
								}else{
									?>
									<!--// bouton pour réactiver la catégorie-->
									<a class='btn btn-success' href='index.php?p=admin_sous_categs&action=reactive&id=<?php echo $sous_categ_id; ?>'>Reactiver</a>
									<?php
                                    }
                                    ?>
                                </td>
                            </tr>


                            <?php
                        }
                    }
                    ?>
					
                  </table>
                </div><!-- /.box-body -->
				
				<div class="box-footer clearfix">
					<div><a class='btn btn-sm btn-success' href="">Ajouter une sous-catégorie</a></div>
				</div>
				
              </div><!-- /.box -->
			  
			  
			  
			  
			</div>
		
		</div>
		</section><!-- /.content -->
            
            