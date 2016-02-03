
		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Se connecter
            <small>Entrez vos informations</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
		

		<div class="hold-transition ">
			<div class="login-box">
			  <div class="login-logo"><b>Espace membre</b></div><!-- /.login-logo -->
			  <div class="login-box-body">
				<p class="login-box-msg"><?php echo $msg; ?></p>
				<form action="index.php?p=login" method="post">
				  <div class="form-group has-feedback">
					<input type="email" class="form-control" name="login" id="login" value="" placeholder="Adresse email" required>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
				  <div class="row">
					<div class="col-xs-4 col-xs-push-8">
					  <input type="submit" class="btn btn-primary btn-block btn-flat" type="submit" name="submit" value="connexion">
					</div><!-- /.col -->
				  </div>
				</form>

			  </div><!-- /.login-box-body -->
			</div><!-- /.login-box -->
		</div>
		
		
		
		</section><!-- /.content -->
            
            