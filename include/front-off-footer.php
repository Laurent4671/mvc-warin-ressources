<!--footer-->

        <footer role="contentinfo">
            <div id="capsule_footer" class="container_12">
                <div class="grid_3">
                    <a href="index.html"><img src="images/logo_1.png" alt="Logo CrearchitecX" width="125" height="24" /></a>
                    <p>Rejoignez-nous...</p>
                    <div class="sociaux">
                        <a href="#" title="Facebook"><img src="images/facebook.png" alt="Facebook" width="27" height="27" /></a>
                        <a href="#" title="Twitter"><img src="images/twitter.png" alt="Twitter" width="27" height="27" /></a>
                        <a href="#" title="Vimeo"><img src="images/vimeo.png" alt="Vimeo" width="27" height="27" /></a>
                        <a href="#" title="Linked"><img src="images/linked.png" alt="Linked" width="27" height="27" /></a>
                        <a href="#" title="Flickr"><img src="images/flickr.png" alt="Flickr" width="27" height="27" /></a>
                    </div>
                </div>
                
                <div class="grid_3">
                    <h3>Contact</h3>
                    <ul>
                        <li><strong>Adresse:</strong><span>Rue Saint-Laurent, 33<br />
                                4000 Liège</span>

                            <div class="clear"></div></li>
                        <li><strong>Tel:</strong> +32 (0)4 223 11 31</li>
                        <li><strong>Email:</strong> info@architex.com</li>
                    </ul>
                </div>
                
                <div class="grid_3">
                    <h3>Derniers Tweets</h3>
					<a class="twitter-timeline"  href="https://twitter.com/Laurent4671"  data-widget-id="447562232679763968">Tweets de @Laurent4671</a>
					<script>
						!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
					</script>
                </div>
                
                <div class="grid_3">
                    <h3>Dernières news</h3>
                    <ul>
                        <li><a href="#">Lauréat</a></li>
                        <li><a href="#">Maison passive</a></li>
                        <li><a href="#">Nouveau collaborateur</a></li>
                        <li><a href="#">Inauguration</a></li>
                        <li><a href="#">Interview</a></li>
                        <li><a href="#">Europa Nostra</a></li>
                    </ul>
                </div>

            </div>

            <div id="capsule_footer_copy" class="container_12">

                <div class="copyright">@Copyright 2014 <a href="public_index.php">Crearchitech.</a> All Rights Reserved. - <a href="#">Plan du site</a></div>
            </div>
        </footer>
		
		<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
		
		<?php if ($page == 'public_index'){
		echo '<!-- Slider: http://nivo.dev7studios.com -->
		<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(window).load(function() {
				$("#slider").nivoSlider();
			});
		</script>';
		} ?>
		
		<?php if ($page == 'public_projets'){
		echo '<!-- Lightbox: http://lokeshdhakar.com/projects/lightbox2/ -->
		<script src="js/lightbox-2.6.min.js" type="text/javascript"></script>';
		} ?>
		
		<?php if ($page == 'public_news' || $page == 'public_news_id'){
		echo '<!-- news accordéon -->
		<script type="text/javascript">
			$(document).ready( function () {
				// Cacher les listes de la sidebar:
				$("#sidebar ul").hide();    
			});
			// Remplacer les h5 par la balise a (cliquable):
			$("#sidebar h5").each( function () {
				$(this).replaceWith(\'<a class="sous-menu" href="#" title="Dérouler le sous-menu">\' + $(this).text() + \'<\/a>\');
			});
			// Modifier l\'évênement "click" sur les liens précédemment créés:
			$("#sidebar .sous-menu").click( function () {
				// Si le sous-menu était déjŕ ouvert, on le referme :
				if ($(this).next("#sidebar ul:visible").length != 0) {
					$(this).next("#sidebar ul").slideUp("normal");
				}
				// Si le sous-menu est caché, on ferme les autres et on l\'affiche:
				else {
					$("#sidebar ul").slideUp("normal");
					$(this).next("#sidebar ul").slideDown("normal");
				}
				// On empęche le navigateur de suivre le lien:
				return false;
			});
		</script>';
		} ?>
    </body>
</html>