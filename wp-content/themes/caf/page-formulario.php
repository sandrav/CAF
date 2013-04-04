<?php
/*
Template Name: formulario
*/
?>
<!-- TEMPLATE PAGE-FORMULARIO-->
<?php get_header();?>

<div id="mainZone">
	<div id="col1">
		<div class="postsContainerTop"></div>
		<div id="postsContainer">
			<?php if (have_posts()) : ?>
			<?php $i = 1; while (have_posts() && $i < 3) : the_post(); ?>					
				<?php the_content(__('Leer completo »', 'CAF')); ?>       				
			<?php $i++; endwhile; else: ?>
			<?php _e('No se encontró ningún resultado para esta búsqueda', 'CAF'); ?>
		<?php endif; ?>
		</div>
		<div class="postsContainerBottom"></div>
	</div>
	
	<div id="col2">
		<div id="suscribe" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Recibir Noticias','CAF') ?></h2>
				</div>			
			<div class="sideBoxBotton"></div>
			<?php include (TEMPLATEPATH . '/sidebarLang.php'); ?>
		</div>
		<div id="" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Archivo','CAF') ?></h2>
				</div>			
			<div class="sideBoxBotton"></div>
			<ul class="sideLink">
				<?php wp_get_archives('type=monthly&limit=12'); ?>
			</ul>
		</div>
		<div id="" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Etiquetas','CAF') ?></h2>
				</div>			
			<div class="sideBoxBotton"></div>
			<ul class="sideLink">
				<?php $tags = get_tags();
					if ($tags) {
						foreach ($tags as $tag) {
						echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "$tag->name" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> </li>';}
					}
				?>
			</ul>
		</div>		
	</div>

	</div>   
	
<?php get_footer(); ?>
