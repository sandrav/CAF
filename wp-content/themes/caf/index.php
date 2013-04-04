<?php get_header();?>
<!-- TEMPLATE INDEX-->
<div id="mainZone">
	<div id="col1">
		<div class="postsContainerTop"></div>
		<div id="postsContainer">
			<h2 id="novedades-title"><?php _e('Novedades','CAF') ?></h2>
			<a href="<?php bloginfo('siteurl'); ?>/noticaf" title="Ver todas las novedades en NotiCAF" class="novedades"><?php _e('Ver todas las novedades en NotiCAF','CAF') ?></a>
			<?php if (have_posts()) : ?>
			<?php $i = 1; while (have_posts() && $i < 3) : the_post(); ?>
				<div class="post">       
					<h2 class="titulos">
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</h2>
					<span class="postDate"><?php the_time('l j F Y'); ?></span>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array( 110,110 )) ?></a>
					<?php the_content(__('Leer completo »', 'CAF')); ?>       
				</div>		
			<?php $i++; endwhile; else: ?>
			<?php _e('No se encontró ningún resultado para esta búsqueda.', 'CAF'); ?>
			<?php endif; ?>
		</div>
		<div class="postsContainerBottom"></div>
		<div id="infoQueHacemos" class="clearfix">
			<div class="bigSideBoxTop"></div>
			<div class="bigSideBoxContent">
				<h2><?php _e('¿Qué hacemos?','CAF') ?></h2>
			</div>
			<div class="bigSideBoxBottom"></div>
			<p id="slideShowList">
				<?php _e('Contamos con distintos servicios y programas que se adaptan a las necesidades de cada chico.','CAF') ?>
			</p>
			<div id="slideshow">
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide1.png" alt="" />
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide2.png" alt="" />
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide3.png" alt="" />
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide4.png" alt="" />
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide5.png" alt="" />
			</div>
			<a href="<?php bloginfo('siteurl'); ?>/que-hacemos/" title="M&aacute;s informaci&oacute;n"><?php _e('Más información','CAF')?> »</a>
		</div>
	</div>
	
	<div id="col2">
		

		<div id="suscribe" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Recibir Noticias','CAF') ?></h2>
				</div>			
			<div class="sideBoxBotton"></div>
			<?php include (TEMPLATEPATH . '/sidebarLang.php'); ?>
			<!--<a class="sideLink" href="#">Suscribirse »</a>-->
		</div>
		<div id="about" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Sobre nosotros','CAF') ?></h2>
				</div>			
			<div class="sideBoxBotton"></div>
			<p><?php _e('En el Centro de Apoyo Familiar (CAF) Santa Clotilde nos comprometemos para que los niños y jóvenes del barrio Las Tunas puedan acceder a una educación integral y de calidad, con énfasis no sólo en lo pedagógico y académico, sino también en el apoyo y contención personal.','CAF') ?></p>
			<a class="sideLink" href="<?php bloginfo('siteurl'); ?>/quienes-somos/sobre-el-caf/" title="¿quienes somos?"><?php _e('Conocenos más','CAF') ?> »</a>
		</div>	
	</div>
		<div id="sumate" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Sumate al CAF','CAF') ?></h2>
					<a target="_blank" href="https://www.resnonverba.org/forms/v2/cafsantaclotilde/1/espanol" title="Don&aacute; ahora" class="donaAhora"><?php _e('Doná ahora', 'CAF') ?> </a>
					<a href="<?php bloginfo('siteurl'); ?>/como-ayudar/donaciones/" title="Conocé cómo podés ayudarnos"><?php _e('Conocé cómo podés ayudarnos','CAF') ?></a>
				</div>			
			<div class="sideBoxBotton"></div>
		</div>  
	</div>   
	

<script language="javascript" type="text/javascript">
	jQuery(document).ready(function() {	
				jQuery('#slideshow').slideshow({
				timeout: 5000,
				type: 'random',
				pauselink: 'pause1',
				pausecallback: function(self){
					self.html('Play')
				},
				playcallback: function(self){
					self.html('Pause');
				}
			});
	});
</script>


<?php get_footer(); ?>
