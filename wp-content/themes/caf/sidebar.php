<!-- TEMPLATE SIDEBAR-->
<div id="sidebar">
<ul>
<?php //wp_list_pages('depth=1&title_li='); ?>
</ul>

<?php
if(function_exists('dynamic_sidebar')){
    dynamic_sidebar('sidebar2');
    // Donde pone 'Sidebar Personalizada' ira el nombre
    // que hayas puesto a tu sidebar al definirla
}
?>


</div>
