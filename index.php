<?php

/*
  Plugin Name: Rv Bloques
  Description: Agrega bloques personalizados o de ajustes
  Version: 1.0
  Author: Jonathan Rodríguez
  Author URI: https://www.instagram.com/silicatopa/
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class RvBloquesGuten {
  function __construct() {
    add_action('init', array($this, 'adminAssets'));
  }

  function adminAssets() {
    wp_register_script('rvbloques', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
    register_block_type('rvbloques/rvimagen', array(
      'editor_script' => 'rvbloques',
      'render_callback' => array($this, 'theHTML')
    ));
  }

  function theHTML($attributes) {
    ob_start(); ?>
    <img class="img-fluid mt-3" style="margin: auto;display: block;" src="<?php echo esc_html($attributes['url']) ?>" alt="">
    <?php return ob_get_clean();
  }
}

$rvBloques = new RvBloquesGuten();