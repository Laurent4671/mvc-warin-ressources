

		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Liste des ressources</h1>
          <ol class="breadcrumb">
            <li><a href="index.php?p=login"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Liste des ressources</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
		
			<div class="col-md-12">
			
				<?php echo $msg; ?><!-- /.box-body -->
				
				
				<?php 
				/* pagination
				    $total_page      = 3;
					$current_page   = empty($_GET['page']) ? 1 : $_GET['page'];
					$previous_page  = $current_page - 1;
					$next_page      = $current_page + 1;
					 
					if ($previous_page == 0) {
						$previous_page = 1;
					}
					 
					 
					if ($next_page > $total_page) {
						$next_page = $current_page;
					}
					 
					echo "<a href='index.php?p=admin_ressources&page=1'>Première page </a>";
					echo "<a href='index.php?p=admin_ressources&page=$previous_page'> Précédent </a>";
					 
					for ($i=0; $i < $total_page; $i++) :
						if ($current_page == $i) {
							echo "<a href='index.php?p=admin_ressources&page=$i'> $i </a>";
						}else{
							echo "<a href='index.php?p=admin_ressources&page=$i'> $i </a>";
						}
					 
					endfor;
					
					echo "<a href='index.php?p=admin_ressources&page=$next_page'> Suivant </a>";
					echo "<a href='index.php?p=admin_ressources&page=$total_page'> Dernière page</a>";
					*/
				?>
				

				
				<div class="box box-info">
				
				<div class="box-footer clearfix">
				
				<div><a class='btn btn-sm btn-success pull-left' href="index.php?p=admin_ressources&action=add">Ajouter une ressource</a></div>
					  <ul class="pagination pagination-sm no-margin pull-right">
						<li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">&raquo;</a></li>
					  </ul>
				</div>
					
				
                <div class="box-body">
                  <table class="table table-bordered table-perso">
				  
                    <tr>
                      <th style="width: 100px" class="bg-red">Catégorie</th>
                      <th style="width: 100px" class="bg-red">Sous catégorie</th>
                      <th style="width: 10px" class="bg-black">#</th>
                      <th class="bg-orange">Titre</span></th>
                      <th class="bg-aqua">Adresse</th>
                      <th class="bg-aqua">Title</th>
                      <th class="bg-purple">Image</th>
                      <th class="bg-purple">Alt</th>
                      <th style="width: 50px" class="bg-green">Actions</th>
                    </tr>
					
                    <?php
					
					
                    // traitement des données					
                    if(is_array($result)){
                        foreach($result as $r){
						
                            
                            $categorie_titre     = convertFromDB($r["categorie_titre"]);
                            $sous_categ_titre    = convertFromDB($r["sous_categ_titre"]);
							
							$ressource_id        = convertFromDB($r["ressource_id"]);
                            $ressource_titre     = convertFromDB($r["ressource_titre"]);
                            $ressource_url_href  = convertFromDB($r["ressource_url_href"]);
                            $ressource_url_title = convertFromDB($r["ressource_url_title"]);
                            $ressource_img_src   = convertFromDB($r["ressource_img_src"]);
                            $ressource_img_alt   = convertFromDB($r["ressource_img_alt"]);
                            $is_visible          = convertFromDB($r["is_visible"]);

                            $class_visible = "";
                            if($is_visible == 0){
                                $class_visible = " no_visible";
                            }

                            ?>
                            <tr>
                                <td class='bg-gray-light<?php echo $class_visible; ?>'><?php echo $categorie_titre; ?></td>
                                <td class='bg-gray-light<?php echo $class_visible; ?>'><?php echo $sous_categ_titre; ?></td>
								
								<td class='bg-light-blue<?php echo $class_visible; ?>'><?php echo $ressource_id; ?></td>
                                <td class='<?php echo $class_visible; ?>'><?php echo $ressource_titre; ?></td>
                                <td class='<?php echo $class_visible; ?>'><?php echo $ressource_url_href; ?></td>
                                <td class='<?php echo $class_visible; ?>'><?php echo $ressource_url_title; ?></td>
                                <td class='miniature<?php echo $class_visible; ?>'><img class="img-circle" src="upload/ressources/<?php echo $ressource_img_src; ?>" width="75" height="75"></td>
                                <td class='<?php echo $class_visible; ?>'><?php echo $ressource_img_alt; ?></td>
                                <td>
                                    <!-- Icons -->
                                    <?php
                                    if($is_visible == "1"){
                                    ?>
									<!--// bouton de modification-->
									<a class='btn btn-warning btn-xs btn-block' href='index.php?p=admin_ressources&action=update&id=<?php echo $ressource_id; ?>' title='Modifier'><i class="fa fa-edit "></i></a>
									
									<!--// bouton de suppression-->
									<a class='btn btn-danger btn-xs btn-block' href='index.php?p=admin_ressources&action=delete&id=<?php echo $ressource_id; ?>' onclick="return confirm('Confirmer la suppression')" title='Supprimer'><i class="fa fa-trash"></i></a>
									
									<?php
								}else{
									?>
									<!--// bouton de modification-->
									<a class='btn btn-warning btn-xs btn-block' href='index.php?p=admin_ressources&action=update&id=<?php echo $ressource_id; ?>' title='Modifier'><i class="fa fa-edit "></i></a>
									
									<!--// bouton de suppression-->
									<a class='btn btn-danger btn-xs btn-block' href='index.php?p=admin_ressources&action=delete&id=<?php echo $ressource_id; ?>' title='Supprimer'><i class="fa fa-trash"></i></a>
									
									<!--// bouton pour réactiver la catégorie-->
									<a class='btn btn-success btn-xs btn-block' href='index.php?p=admin_ressources&action=reactive&id=<?php echo $ressource_id; ?>' title='Réactiver'><i class="fa fa-eye"></i></a>
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
					<div><a class='btn btn-sm btn-success pull-left' href="index.php?p=admin_ressources&action=add">Ajouter une ressource</a></div>
				</div>
				
              </div><!-- /.box -->
			  
			  
			  
			  
			</div>
		
		</div>
		</section><!-- /.content -->
            
            