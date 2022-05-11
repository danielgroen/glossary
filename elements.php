<?php
/*
	Plugin Name: Begrippenlijst
	Plugin URI: https://danielgroen.nl/
	Description: Get only the files you need from your production environment. Don't ever run this in production!
	Version: 1.0.0
	Author: Daniel Groen
	Author URI: https://www.danielgroen.nl/
*/
define('GLOS_PATH',   plugin_dir_path(__FILE__));
define('GLOS_URL',    plugin_dir_url(__FILE__));
define('GLOS_BASE',    plugin_basename(__FILE__));

define('GLOS_NAME', 'glossary');

include_once(GLOS_PATH . 'src/options-page.php');
include_once(GLOS_PATH . 'src/index.php');
