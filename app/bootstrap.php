<?php
// Load the config file
require_once 'config/config.php';


// // Load all libraries 
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

// AUTOLOADER FOR ALL CORE LIBRARIES
// Every new library added will be auto loaded here 
spl_autoload_register(
    function($className) {
        require_once 'libraries/'. $className .'.php';
    }
)

?>