<?php get_header();?>
<!-- TEMPLATE DATE-->
<div id="mainZone">
	<div id="col1">
		<div class="postsContainerTop"></div>
		<div id="postsContainer">
			<h2 id="novedades-title"><?php _e('NotiCAF','CAF') ?> - <?php _e('Archive','CAF') ?> <?php the_time('F Y') ?></h2>
			<?php global $more; ?>
			<?php rewind_posts(); query_posts($query_string . '&order=DESC'); while (have_posts()) : the_post(); ?> 
			<?php $more = 0; ?>
				<div class="post">       
					<h2 class="titulos">
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</h2>
					<span class="postDate"><?php the_time('l j F Y'); ?></span>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array( 110,110 )) ?></a>
					<?php the_content(__('Read more','CAF').' &raquo;'); ?> 
				</div>	
			
			<?php endwhile;	?>
		</div>
		<div class="postsContainerBottom"></div>
	</div>
	
	<div id="col2">
		<div id="suscribe" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Get the News','CAF') ?></h2>
				</div>			
			<div class="sideBoxBotton"></div>
			<?php include (TEMPLATEPATH . '/sidebarLang.php'); ?>
		</div>
		<div id="" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Archive','CAF')?></h2>
				</div>			
			<div class="sideBoxBotton"></div>
			<ul class="sideLink">
				<?php wp_get_archives('type=monthly&limit=12'); ?>
			</ul>
		</div>
		<div id="" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Labels','CAF')?></h2>
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
