<?php

/**
 * Eazy Facebook Plugin
 *
 * @package     PluginPackage
 * @author      Alexander Weese
 * @copyright   2018 Alexander Weese Webdesign
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Eazy Facebook Plugin
 * Plugin URI:  https://alexweese.de/
 * Description: Display Facebook-Posts of your own Profile or Share Posts in your timeline. 
 * Version:     1.0.0
 * Author:      Alexander Weese
 * Author URI:  https://alexweese.de/
 * Text Domain: eazy_facebook
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */
/**
 * 
 */
include_once 'defines.php';

/**
 * 
 */
include_once 'includes.php';

/**
 * 
 */
include_once 'init.php';


/**
 * Activation Hook registrieren
 */
register_activation_hook(__FILE__, 'activate_eazy_facebook');

function activate_eazy_facebook() {
    $system = new EazyFacebookSystem();

    if ($system->getSettings()->tableExists() === false) {
        $system->getSettings()->createSettings();
    }
}

/**
 * Deactivate Hook registrieren
 */
register_deactivation_hook(__FILE__, 'deactivate_eazy_facebook');

function deactivate_eazy_facebook() {
    
}

/**
 * Uninstall Hook registrieren
 */
register_uninstall_hook(__FILE__, 'uninstall_eazy_facebook');

function uninstall_eazy_facebook() {
    
}
