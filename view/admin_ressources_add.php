

		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Ajouter une ressource</h1>
          <ol class="breadcrumb">
            <li><a href="index.php?p=login"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="index.php?p=admin_ressources"> Liste des ressources</a></li>
            <li class="active">Ajouter une ressource</li>
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
					<form class="form-horizontal" action="index.php?p=admin_ressources&action=add" method="post">
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
									foreach($result_sous_categ as $r){
										$sous_categ_id    = convertFromDB($r["sous_categ_id"]);
										$sous_categ_titre = convertFromDB($r["sous_categ_titre"]);
										$is_visible       = convertFromDB($r["is_visible"]);
										
										if($is_visible == "1"){
											$selected = ($post_sous_categ_id == $sous_categ_id) ? "selected='selected'" : "";
											$sous_categorie .= "<option value='$sous_categ_id'>$sous_categ_titre</option>\n\t\t\t\t\t\t";
										}
									}
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
							<input class="btn btn-success btn-block btn-flat" type="submit" name="submit" value="Ajouter">
						</div><!-- /.box-footer -->
					</form>
				</div><!-- /.box -->

			</div>
		
		</div>
		</section><!-- /.content -->
            
            