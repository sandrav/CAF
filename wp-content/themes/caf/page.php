<?php get_header();?>
<!-- TEMPLATE PAGE-->
<div id="mainZone">



	<h2 class="pageTitle"><?php the_title(); ?>  </h2>
	
	
	<div id="pageMenu">			
		<div class="bg-pageMenuT"></div>	
			<div class="pageMenuContent">				
				<?php
					if($post->post_parent)
						$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
					else
						$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
					if ($children) { ?>
						<ul>
							<?php echo $children; ?>
						</ul>
				<?php } ?>				
			</div>			
		<div class="bg-pageMenuB"></div>		
	</div>	
	<div id="pageContent">
		<?php if (have_posts()) : ?>
			<?php $i = 1; while (have_posts() && $i < 3) : the_post(); ?>					
				<?php the_content(__('Leer completo »', 'CAF')); ?>       				
			<?php $i++; endwhile; else: ?>
			<?php _e('No se encontró ningún resultado para esta búsqueda.'); ?>
		<?php endif; ?>
	</div>
</div>   
	

	
<?php get_footer(); ?>
