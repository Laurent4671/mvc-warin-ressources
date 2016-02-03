

		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Ajouter une catégorie</h1>
          <ol class="breadcrumb">
            <li><a href="index.php?p=login"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="index.php?p=admin_categories"> Liste des catégories</a></li>
            <li class="active">Ajouter une catégorie</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
		
			<div class="col-md-12">
			
				<?php 
				
					$result ="";
				
					echo $msg;
					
				?>
				
				

				<!-- Horizontal Form -->
				<div class="box box-success">
					<!-- form start -->
					<form class="form-horizontal" action="index.php?p=admin_categories&action=add" method="post">
						<div class="box-body">
								
							<div class="form-group">
							
								<label for="categorie_titre" class="col-sm-3 control-label">Titre de la catégorie *</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" id="categorie_titre" name="categorie_titre" value="<?php echo $categorie_titre; ?>"> <?php echo missing_msg($msg); ?>
								</div>
							</div>
							
						</div><!-- /.box-body -->
						
						<div class="box-footer">
							<input class="btn btn-success btn-block btn-flat" type="submit" name="submit" value="Ajouter">
						</div><!-- /.box-footer -->
					</form>
				</div><!-- /.box -->

			</div>
		
		</div>
		</section><!-- /.content -->
            
            