

		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Editer une ressource</h1>
          <ol class="breadcrumb">
            <li><a href="index.php?p=login"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="index.php?p=admin_ressources"> Liste des ressources</a></li>
            <li class="active">Editer une ressource</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
		
			<div class="col-md-12">
			
				<?php
				if(is_array($result)){

                    $categorie_titre     = convertFromDB($result[0]["categorie_titre"]);
                    $sous_categ_titre     = convertFromDB($result[0]["sous_categ_titre"]);
                    $ressource_id        = convertFromDB("ressource_id");
                    $ressource_titre     = convertFromDB($result[0]["ressource_titre"]);
                    $ressource_url_href  = convertFromDB($result[0]["ressource_url_href"]);
                    $ressource_url_title = convertFromDB($result[0]["ressource_url_title"]);
                    $ressource_img_src   = convertFromDB($result[0]["ressource_img_src"]);
                    $ressource_img_alt   = convertFromDB($result[0]["ressource_img_alt"]);
				}
					echo $msg;
				?>

				<!-- Horizontal Form -->
				<div class="box box-warning">
					<!-- form start -->
					<form class="form-horizontal" action="index.php?p=admin_ressources&action=update&id=<?php echo $ressource_id; ?>'" method="post">
						<div class="box-body">
						
							<fieldset>
								<legend>Texte</legend>
								
								<div class="form-group">
								
									<label for="ressource_titre" class="col-sm-3 control-label">TITRE *</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="ressource_titre" name="ressource_titre" value="<?php echo $ressource_titre; ?>"> <?php echo missing_msg($msg); ?>
									</div>
								</div>
							</fieldset>
						
							<fieldset>
								<legend>SECTION</legend>
								
								<div class="form-group">

								<?php
									$sous_categorie = "";

										$sous_categ_id    = convertFromDB("sous_categ_id");
										$sous_categ_titre = convertFromDB("sous_categ_titre");

									?>
									<label for="sous_categ_id" class="col-sm-3 control-label">Sous catégorie *</label>
									
									<div class="col-sm-7">
										<select id="sous_categ_id" name='sous_categ_id' type="text" class="u-full-width">
											<?php
											echo $sous_categorie;
											?>
										</select>
									</div>

								</div>
							</fieldset>
							
							<fieldset>
								<legend>Adresse</legend>
								<div class="form-group">
									<label for="ressource_url_href" class="col-sm-3 control-label">URL *</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="ressource_url_href" name="ressource_url_href" value="<?php echo $ressource_url_href; ?>"> <?php echo missing_msg($msg); ?>
									</div>
								</div>

								<div class="form-group">
									<label for="ressource_url_title" class="col-sm-3 control-label">TITLE *</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="ressource_url_title" name="ressource_url_title" value="<?php echo $ressource_url_title; ?>"> <?php echo missing_msg($msg); ?>
									</div>
								</div>
							</fieldset>
							
							<fieldset>
								<legend>Image</legend>
								<div class="form-group">
									<label for="ressource_img_src" class="col-sm-3 control-label img_src">SRC *</label>
									<div class="col-sm-4">
										<input type="text" class="form-control img_src" id="ressource_img_src" name="ressource_img_src" value="<?php echo $ressource_img_src; ?>"> <?php echo missing_msg($msg); ?>
									</div>
									
									<div class="col-sm-3">
										<img class="img-circle" src="upload/ressources/<?php echo $ressource_img_src; ?>" width="150" height="150">
									</div>
								</div>

								<div class="form-group">
									<label for="ressource_img_alt" class="col-sm-3 control-label">ALT *</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" id="ressource_img_alt" name="ressource_img_alt" value="<?php echo $ressource_img_alt; ?>"> <?php echo missing_msg($msg); ?>
									</div>
								</div>
							</fieldset>
						</div><!-- /.box-body -->


						<div class="box-footer">
							<input class="btn btn-warning btn-block btn-flat" type="submit" name="submit" value="Modifier">
						</div><!-- /.box-footer -->
					</form>
				</div><!-- /.box -->

			</div>
		
		</div>
		</section><!-- /.content -->
            
            