<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/jquery.slideshow.min.js"></script>



<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34640901-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<!-- TEMPLATE HEADER-->
<body>
	<div id="contentSite">
	<div id="header">
		<div id="headerContent">
			<h1 class="logo">
				<a id="mainLogo" href="<?php bloginfo('siteurl'); ?>" title="Volver al Inicio">
					<span class="displayNone">Centro de Ayuda Familiar - Santa Clotilde</span>
				</a>
			</h1>		
			<div id="social"><a href="<?php bloginfo('siteurl'); ?>/como-ayudar/contacto/" class="contacto"><?php _e('Contacto','CAF') ?></a>
				<a id="icon-twitter" href="http://www.twitter.com/CAFStaClotilde" target="_blank" title="Twitter"><span class="displayNone">Twitter</span></a>
				<a id="icon-facebook" href="http://www.facebook.com/home.php?#!/pages/CAF-Santa-Clotilde/209306331250?ref=ts" target="_blank" title="Facebook"><span class="displayNone">Facebook</span></a>
			</div>
			<div id="hMenu">
				<ul>
					<li class="page_item"><a title="Inicio" href="<?php bloginfo('siteurl'); ?>"><?php _e('Inicio','CAF')?></a></li>
					<?php wp_list_pages('depth=1&title_li='); ?>
				</ul>
			</div>
		</div>
	</div>
	<div id="mainContainer">
  