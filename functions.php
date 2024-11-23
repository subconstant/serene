<?php

use Timber\Timber;

// load composer
require_once __DIR__ . '/vendor/autoload.php';

// disable commenting
require_once __DIR__ . '/src/util/nocomment.php';

// meta field setup
require_once __DIR__ . '/src/meta.php';
require_once __DIR__ . '/src/util/timber_cf.php';

// custom post types
require_once __DIR__ . '/src/types.php';

// custom taxonomies
require_once __DIR__ . '/src/taxonomy.php';

// load built css/js
add_action('wp_enqueue_scripts', function() {
  wp_deregister_script( 'jquery' );
  wp_enqueue_style('styles', get_template_directory_uri() . '/build/main.css', [], false);
  wp_enqueue_script('vendor-js', get_template_directory_uri() . '/build/vendor.js', [], 'false', true);
  wp_enqueue_script('manifest-js', get_template_directory_uri() . '/build/manifest.js', [], 'false', true);
  wp_enqueue_script('theme-js', get_template_directory_uri() . '/build/main.js', [], 'false', true);
});

//gutenberg specifics
add_editor_style( '/build/editor.css' );
function serene_gutenberg_scripts() {
  wp_enqueue_script('editor-js', get_template_directory_uri() . '/src/js/editor.js', array( 'wp-blocks' ), false, true);
  wp_enqueue_script('gutenberg-js', get_template_directory_uri( ) . '/src/util/gutenberg_hook.js',
		array( 'wp-block-editor' ),
	);
}
add_action('enqueue_block_editor_assets', 'serene_gutenberg_scripts');



// disable theme directory updates + customize page
add_filter('site_transient_update_themes', function($transient) {
  if (is_object($transient) && isset($transient->response) && is_array($transient->response)) {
      $theme_slug = get_template();
      if (array_key_exists($theme_slug, $transient->response)) {
          unset($transient->response[$theme_slug]);
      }
  }
  return $transient;
});

add_action('admin_menu', function() {
  $customize_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
	remove_submenu_page( 'themes.php', $customize_url );
}, 999);

// remove frontend emoji code
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// clean up dashboard
remove_action('welcome_panel', 'wp_welcome_panel');
function wp_remove() {
	remove_meta_box( 'dashboard_primary', get_current_screen(), 'side' );
}
add_action( 'wp_network_dashboard_setup', 'wp_remove', 20 );
add_action( 'wp_user_dashboard_setup',    'wp_remove', 20 );
add_action( 'wp_dashboard_setup',         'wp_remove', 20 );

// timber init
require_once __DIR__ . '/src/setup.php';

Timber::init();
new SiteSetup();
new \Timber\Integrations\CarbonFields();