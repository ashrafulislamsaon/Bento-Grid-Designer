<?php
/**
 * Plugin Name:       Bento Grid Designer
 * Plugin URI:        https://boomdevs.com/bento-grid-designer
 * Description:       This is a description of the plugin.
 * Version:           1.0.0
 * Author:            BoomDevs
 * Author URI:        https://boomdevs.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bento-grid-designer
 * Domain Path:       /languages
 */

// Abort if this file is called directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue styles and scripts for the Bento Grid Designer editor.
 */
function bento_grid_designer_editor()
{
    wp_enqueue_style(
        'bento_grid_designer_style',
        plugin_dir_url(__FILE__) . 'grid-generator/dist/bento-grid.css',
        array(),
        '1.0.0',
        'all'
    );
    
    wp_enqueue_script(
        'bento_grid_designer_script',
        plugin_dir_url(__FILE__) . 'grid-generator/dist/bento-grid.js',
        array('jquery'),
        '1.0.0',
        false
    );
    
    // Return the editor HTML content
    ob_start();
    echo '<div id="snap-grid"></div>';
    return ob_get_clean();
}
add_shortcode('bento_grid_designer_editor_shortcode', 'bento_grid_designer_editor');

/**
 * Modify script tag to load as a module.
 */
// function wpdocs_load_module($tag, $handle)
// {
//     if ('bento_grid_designer_script' === $handle) {
//         return str_replace('<script ', '<script type="module" ', $tag);
//     }
//     return $tag;
// }
// add_filter('script_loader_tag', 'wpdocs_load_module', 10, 2);
