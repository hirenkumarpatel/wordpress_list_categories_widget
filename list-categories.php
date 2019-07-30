<?php
/*
Plugin Name: List Categories
Plugin URI: https://sourceextension.com
Description:List Categories Widget
Version: 1.0.0
Author: Hiren Patel
Author URI: http://sourceextension.com
License: GPL2 or Later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lc-domain
*/

/** restricting direct access to file */
if(!defined('ABSPATH')){
    die;
}

/**include list-categories-scripts.php file to load css and js resources */
require_once(plugin_dir_path(__FILE__).'/includes/list-categories-scripts.php');

/**include list-categories-class.php file to load widget class  */
require_once(plugin_dir_path(__FILE__).'/includes/list-categories-class.php');

/**register widget class to wordpress using register_widget method */

function register_list_categories(){
    /** 
     * registering class name to wordpress
     * @param name of the class to be register */
    register_widget('ListCategories_Widget');
}

/**hook in function to call register function using add_action */
add_action('widgets_init','register_list_categories');