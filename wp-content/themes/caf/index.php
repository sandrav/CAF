<?php get_header();?>
<!-- TEMPLATE INDEX-->
<div id="mainZone">
	<div id="col1">
		<div class="postsContainerTop"></div>
		<div id="postsContainer">
			<h2 id="novedades-title"><?php _e('News','CAF') ?></h2>
			<a href="<?php bloginfo('siteurl'); ?>/noticaf" title="See all NotiCAF news" class="novedades"><?php _e('See all NotiCAF news','CAF') ?></a>
			<?php if (have_posts()) : ?>
			<?php $i = 1; while (have_posts() && $i < 3) : the_post(); ?>
				<div class="post">       
					<h2 class="titulos">
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</h2>
					<span class="postDate"><?php the_time('l j F Y'); ?></span>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array( 110,110 )) ?></a>
					<?php the_content(__('Read more','CAF').' &raquo;'); ?>  
				</div>		
			<?php $i++; endwhile; else: ?>
			<?php _e('Results not found', 'CAF'); ?>
			<?php endif; ?>
		</div>
		<div class="postsContainerBottom"></div>
		<div id="infoQueHacemos" class="clearfix">
			<div class="bigSideBoxTop"></div>
			<div class="bigSideBoxContent">
				<h2><?php _e('What We Do','CAF') ?></h2>
			</div>
			<div class="bigSideBoxBottom"></div>
			<p id="slideShowList">
				<?php _e('our programs','CAF') ?>
			</p>
			<div id="slideshow">
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide1.png" alt="" />
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide2.png" alt="" />
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide3.png" alt="" />
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide4.png" alt="" />
				<img src="http://www.cafsantaclotilde.org.ar/wp-content/uploads/2011/08/slide5.png" alt="" />
			</div>
			<a href="<?php bloginfo('siteurl'); ?>/que-hacemos/" title="<?php _e('More information','CAF')?>"><?php _e('More information','CAF')?> &raquo;</a>
		</div>
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
		<div id="about" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('About us','CAF') ?></h2>
				</div>			
			<div class="sideBoxBotton"></div>
			<p><?php _e('commitment','CAF') ?></p>
			<a class="sideLink" href="<?php bloginfo('siteurl'); ?>/quienes-somos/sobre-el-caf/" title="<?php _e('Know more about us','CAF') ?>"><?php _e('Know more about us','CAF') ?> &raquo;</a>
		</div>	
	</div>
		<div id="sumate" class="sideBox">
			<div class="sideBoxTop"></div>	
				<div class="sideBoxContent">
					<h2 class="sideTitle"><?php _e('Join CAF','CAF') ?></h2>
					<a target="_blank" href="https://donaronline.org/caf-santa-clotilde/sumate-al-caf" title="<?php _e('Donate now', 'CAF') ?>" class="donaAhora"><?php _e('Donate now', 'CAF') ?> </a>
					<a href="<?php bloginfo('siteurl'); ?>/como-ayudar/donaciones/" title="<?php _e('Learn how to help us','CAF') ?>"><?php _e('Learn how to help us','CAF') ?></a>
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
