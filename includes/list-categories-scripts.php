<?php
/**loading css and js scripts */
function lc_load_resources(){

    /** loading style.css file */
    wp_enqueue_style('lc_main-style',plugins_url().'/list-categories/includes/css/style.css');

    /**loading main.js script file */
    wp_enqueue_script('lc_main-script',plugins_url().'/list-categories/includes/js/main.js');

}
add_action('wp_enqueue_scripts','lc_load_resources');