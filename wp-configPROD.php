<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'cafweb');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'cafweb');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Caf2011.0');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'cafweb.db.7141211.hostedresource.com');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'nasod asdal djaskld j12l3j 12lj 12l4jk 1l23 j12l3j 1'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'asdkj haskdj ahskdjahwke jhk23jhe 2k3jrh 2k3j4h23'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'pol23k jerh2 kg3kj4g23kj42g 4jk2gh 34k23a'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'podk fjsdh fkjh rk23jh 2kl3j4h 23kl4h 23 aleatoria'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'psdkfj hgk234j25 oi347y 2934 23r hfksdhf sdf sdf sa'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'pon  sfgsdf sdf sd7f9sd6f 8sd76f8sd76f sd78f storia'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', 'ponsdfo sdu87f9 8sd7f9sd6f 87sdf68sd76fsd78f6 s78d6fsd78 f6sd78f sdria'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', 'ponsd9f 76sd87f6 sd87f6sd8 7f6s8d76 f8sd7f6 sd786fria'); // Cambia esto por tu frase aleatoria.
/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define ('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
