
		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Gestion du mot de passe</h1>
          <ol class="breadcrumb">
            <li><a href="index.php?p=login"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Gestion du mot de passe</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class="row">
		
			<div class="col-md-12">
			
				<?php echo $msg; ?><!-- /.box-body -->
				
				<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title">Modifier le mot de passe</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form class="form-horizontal" action="index.php?p=admin_password&action=update" method="post">
					
					  <div class="box-body">
					  
						<div class="form-group">
						  <label for="old_password" class="col-sm-3 control-label">Mot-de-passe actuel *</label>
						  <div class="col-sm-7">
							<input type="text" class="form-control" id="old_password" name="old_password" value="<?php echo $post_old_password; ?>"><?php echo missing_msg($msg); ?>
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="new_password" class="col-sm-3 control-label">Nouveau mot-de-passe *</label>
						  <div class="col-sm-7">
							<input type="text" class="form-control" id="new_password" name="new_password" value="<?php echo $post_new_password; ?>"><?php echo missing_msg($msg); ?>
						  </div>
						</div>
						
						<div class="form-group">
						  <label for="repeat_password" class="col-sm-3 control-label">Répétition mot-de-passe *</label>
						  <div class="col-sm-7">
							<input type="text" class="form-control" id="repeat_password" name="repeat_password" value="<?php echo $post_repeat_password; ?>"><?php echo missing_msg($msg); ?>
						  </div>
						</div>
						
					  </div><!-- /.box-body -->
					  
					  <div class="box-footer">
						<input type="submit" name="submit" class="btn btn-warning btn-block btn-flat" value="Modifier"/>
					  </div><!-- /.box-footer -->
					  
					</form>
				  </div>
			</div>
		
		</div>
		</section><!-- /.content -->
            
            