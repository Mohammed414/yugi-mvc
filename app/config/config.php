<?php 
/**
 * This folder is used to define constants that will be used all over the place
 */

// To define a constant in php don't forget to use the define function.

// ...app/config/config.php -> ...app/config/ -> ...app/ 
$directory = dirname(dirname(__FILE__)); 


/**
 * CONSTANTS
 */
// APP-ROOT
define('APPROOT', $directory);
// APP-URL
define('URLROOT', 'http://localhost/yugi-mvc');
// SITENAME
define('SITENAME', 'YuGiMVC');


?>
