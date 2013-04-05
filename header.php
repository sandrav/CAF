<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/jquery.slideshow.min.js"></script>





</head>
<body>
	<div id="contentSite">
	<div id="header">
		<div id="headerContent">
			<h1 id="logo">
				<a id="mainLogo" href="<?php bloginfo('siteurl'); ?>" title="Volver al Inicio">
					<span class="displayNone">Centro de Ayuda Familiar - Santa Clotilde</span>
				</a>
			</h1>		
			<div id="facebook"><a href="<?php the_permalink() ?>¿como-ayudar/contacto/">Contacto</a><a id="icon" href="http://www.facebook.com/home.php?#!/pages/CAF-Santa-Clotilde/209306331250?ref=ts" title="Facebook"><span class="displayNone">Facebook</span></a></div>
			<div id="hMenu">
				<ul>
					<?php wp_list_pages('depth=1&title_li='); ?>
				</ul>
			</div>
		</div>
	</div>
	<div id="mainContainer">
  