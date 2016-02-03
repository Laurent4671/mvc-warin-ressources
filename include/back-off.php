<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Warin Créations - Ressources | Panel d'administration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
	<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

	<?php
		if ($page == 'login'){
			echo '<link rel="stylesheet" href="plugins/iCheck/square/blue.css">';
		}
	?>
				
    <!-- HTML5 elements and media queries -->
    <!-- Respond.js -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="hold-transition skin-blue layout-boxed">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index.php?p=login&action=accueil" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>WCR</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>WC Ressources</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
			
			<?php
                if(isset($_SESSION["admin_user_id"]) && !empty($_SESSION["admin_user_id"]) && is_numeric($_SESSION["admin_user_id"])){
            ?>
				
				
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->
			  
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $_SESSION["admin_pseudo"]; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION["admin_pseudo"]; ?>- Intégrateur web
                      <small>Membre depuis toujours.</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-12 text-center">
                      <a href="index.php?p=admin_password">Modifier le mot de passe</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="index.php?p=login&action=exit" class="btn btn-default btn-flat">Déconnexion</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
			  
			  <?php
                }
              ?>
			  
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

		<?php
			if(isset($_SESSION["admin_user_id"]) && !empty($_SESSION["admin_user_id"]) && is_numeric($_SESSION["admin_user_id"])){
		?>
		
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION["admin_pseudo"]; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Recherche">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGATION PRINCIPALE</li>
            <!-- Optionally, you can add icons to the links -->
			
            <li class="treeview<?php if ($page == 'admin_categories_liste' || $page == 'admin_sous_categs_liste' || $page == 'admin_ressources_liste'){echo ' active';} ?>">
				<a href="#"><i class="fa fa-files-o"></i> <span>Ressources</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li<?php if ($page == 'admin_categories_liste'){echo ' class="active"';} ?>><a href="index.php?p=admin_categories"><i class="fa fa-circle-o text-red"></i> Catégories</a></li>
					<li<?php if ($page == 'admin_sous_categs_liste'){echo ' class="active"';} ?>><a href="index.php?p=admin_sous_categs"><i class="fa fa-circle-o text-yellow"></i> Sous-catégories</a></li>
					<li<?php if ($page == 'admin_ressources_liste'){echo ' class="active"';} ?>><a href="index.php?p=admin_ressources"><i class="fa fa-circle-o text-aqua"></i> Liens ajoutés</a></li>
				</ul>
			</li>
			
            <li class="treeview">
				<a href="#"><i class="fa fa-link"></i> <span>Autres pages</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-circle-o text-white"></i> Accueil</a></li>
					<li><a href="#"><i class="fa fa-circle-o text-lime"></i> Snippets</a></li>
					<li><a href="#"><i class="fa fa-circle-o text-fuchsia"></i> WC Grid</a></li>
				</ul>
			</li>
			
          </ul><!-- /.sidebar-menu -->
		  
		  <?php
			}
		  ?>
		  
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
	  
	  
        <!-- Content Header (Page header) -> VOIR LA VUE -->
        

		<?php

			if(file_exists("view/".$page.".php")){
				include_once("view/".$page.".php");
			}else{
				echo "<h2>Erreur !</h2>";
				echo "<p>Vue non définie</p>";
				exit;
			}
		?>

        <!-- /.content -> VOIR LA VUE  -->
		
		
      </div><!-- /.content-wrapper -->
		<?php
		if ($page == 'login'){
			echo '
				<!-- Main Footer -->
				<footer class="main-footer">
				<!-- To the right -->
				<div class="pull-right hidden-xs">Tous droits réservés.</div>
				<!-- Default to the left -->
				Copyright &copy; 2016  &#8226;  <a href="#">Warin Créations</a>
				</footer>
		  ';
			}
		?>

      <!-- Control Sidebar -->

		<?php
			if(isset($_SESSION["admin_user_id"]) && !empty($_SESSION["admin_user_id"]) && is_numeric($_SESSION["admin_user_id"])){
		?>
	  
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
	  
	  <?php
		}
	  ?>
	  
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

	
	
  </body>
</html>
