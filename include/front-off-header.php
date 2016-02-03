<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <title>Crearchitech - Accueil</title>
        <meta name="description" content="Description de la page">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<link rel="icon" type="image/png" href="favicon.png">
        <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
        <link rel="stylesheet" type="text/css" href="css/site/960.min.css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/site/styles.min.css" media="screen">
		
		<?php
			if ($page == 'public_index'){
				echo '<link rel="stylesheet" type="text/css" href="css/site/nivo-slider.min.css" media="screen">
				<link rel="stylesheet" type="text/css" href="css/site/theme_slider/light.min.css" media="screen">';
			}
			
			if ($page == 'public_projets'){
				echo '<link rel="stylesheet" type="text/css" href="css/site/lightbox.min.css" media="screen">';
			}
		?>
		
		<!--[if lt IE 7]>.clearfix{zoom:1}<![endif]-->
    </head>


        <!--header-->
		
		
		<header role="banner">
            <div id="capsule_head" class="container_12">
				<div class="grid_12">
					<div>
						<h1>
							<a href="index.php"><img src="images/logo.png" alt="Logo Crearchitech" width="125" height="70" /></a>
						</h1>
					</div>
					<nav id="nav_head" role="navigation">
						<ul>
                            <li><a <?php if ($page == 'public_index'){echo 'class="active"';} ?> href="index.php?p=public_index">Home</a></li>
							<li><a <?php if ($page == 'public_equipe'){echo 'class="active"';} ?> href="index.php?p=public_equipe">Equipe</a></li>
							<li><a <?php if ($page == 'public_projets'){echo 'class="active"';} ?> href="index.php?p=public_projets">Projets</a></li>
							<li><a <?php if ($page== 'public_news'){echo 'class="active"';} ?> href="index.php?p=public_news">News</a></li>
							<li><a <?php if ($page == 'public_contact'){echo 'class="active"';} ?> href="index.php?p=public_contact">Contact</a></li>
						</ul>
					</nav>
				</div>
            </div>
        </header>


<!--contenu-->