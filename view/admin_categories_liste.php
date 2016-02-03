
		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Liste des catégories</h1>
          <ol class="breadcrumb">
            <li><a href="index.php?p=login"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des catégories</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
		
			<div class="col-md-12">
			
				<?php echo $msg; ?>
				
				
				<div class="box box-info">
				
				<div class="box-footer clearfix">
					<div><a class='btn btn-sm btn-success' href="index.php?p=admin_categories&action=add">Ajouter une catégorie</a></div>
				</div>
				
                <div class="box-body">
                  <table class="table table-bordered">
				  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Catégories</span></th>
                      <th style="width: 185px">Actions</th>
                    </tr>
					
                    <?php
                    // traitement des données					
                    if(is_array($result)){
                        foreach($result as $r){
						
                            $categorie_id    = convertFromDB($r["categorie_id"]);
                            $categorie_titre = convertFromDB($r["categorie_titre"]);
                            $is_visible      = convertFromDB($r["is_visible"]);

                            $class_visible = "";
                            if($is_visible == 0){
                                $class_visible = " class='no_visible'";
                            }

                            ?>
                            <tr>
                                <td<?php echo $class_visible; ?>><?php echo $categorie_id; ?></td>
                                <td<?php echo $class_visible; ?>><?php echo $categorie_titre; ?></td>
                                <td>
                                    <!-- Icons -->
                                    <?php
                                    if($is_visible == "1"){
                                    ?>
									<!--// bouton de modification-->
									<a class='btn btn-warning' href='index.php?p=admin_categories&action=update&id=<?php echo $categorie_id; ?>'>Modifier</a>
									
									
									<!--// bouton de suppression-->
									<a class='btn btn-danger' onclick="return confirm('Confirmer la suppression')" href='index.php?p=admin_categories&action=delete&id=<?php echo $categorie_id; ?>'>Supprimer</a>
									<?php
								}else{
									?>
									<!--// bouton pour réactiver la catégorie-->
									<a class='btn btn-success' href='index.php?p=admin_categories&action=reactive&id=<?php echo $categorie_id; ?>'>Reactiver</a>
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
					<div><a class='btn btn-sm btn-success' href="index.php?p=admin_categories&action=add">Ajouter une catégorie</a></div>
				</div>
				
              </div><!-- /.box -->
			  
			  
			  
			  
			</div>
		
		</div>
		</section><!-- /.content -->
            
            