<?php add_action( 'after_setup_theme', 'lsvr_lore_theme_setup' );
if ( ! function_exists( 'lsvr_lore_theme_setup' ) ) {
	function lsvr_lore_theme_setup() {

		// Include additional files
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		require_once( get_template_directory() . '/inc/classes/lsvr-lore-header-menu-walker.php' );
		require_once( get_template_directory() . '/inc/actions.php' );
		require_once( get_template_directory() . '/inc/ajax-search.php' );
		require_once( get_template_directory() . '/inc/core-functions.php' );
		require_once( get_template_directory() . '/inc/customizer-config.php' );
		require_once( get_template_directory() . '/inc/custom-colors-template.php' );
		require_once( get_template_directory() . '/inc/editor-custom-colors-template.php' );
		require_once( get_template_directory() . '/inc/frontend-functions.php' );
		require_once( get_template_directory() . '/inc/metaboxes-config.php' );
		require_once( get_template_directory() . '/inc/tgm-settings.php' );

		// Include LSVR Knowledge Base functions
		if ( class_exists( 'Lsvr_CPT_KBA' ) ) {
			require_once( get_template_directory() . '/inc/lsvr-knowledge-base/lsvr-knowledge-base.php' );
		}

		// Include LSVR FAQ functions
		if ( class_exists( 'Lsvr_CPT_FAQ' ) ) {
			require_once( get_template_directory() . '/inc/lsvr-faq/lsvr-faq.php' );
		}

		// Include bbPress functions
		if ( class_exists( 'bbpress' ) ) {
			require_once( get_template_directory() . '/inc/bbpress/bbpress.php' );
		}

		// Set content width
		if ( ! isset( $content_width ) ) {
			$content_width = 500;
		}

		// Load textdomain
		load_theme_textdomain( 'lore', get_template_directory() . '/languages' );

    	// HTML 5 support
		add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

		// Manage site logo via Customizer
		add_theme_support( 'custom-logo', array(
			'flex-height' => true,
			'flex-height' => true,
		));

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Enable post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

    	// Load CSS & JS
		add_action( 'wp_enqueue_scripts', 'lsvr_lore_load_theme_assets' );
		if ( ! function_exists( 'lsvr_lore_load_theme_assets' ) ) {
			function lsvr_lore_load_theme_assets() {

				$version = wp_get_theme( 'lore' );
				$version = $version->Version;
				$suffix = defined( 'WP_DEBUG' ) && true == WP_DEBUG ? '' : '.min';

				// Main style.css
				wp_enqueue_style( 'lsvr-lore-main-style', get_bloginfo( 'stylesheet_url' ), array(), $version );

				// Load comment reply JS for blog posts
				if ( is_singular( 'post' ) ) {
					wp_enqueue_script( 'comment-reply' );
				}

				// Load masonry
				if ( has_blocks() ) {
					wp_enqueue_script( 'masonry' );
				}

				// Third party scripts
				wp_enqueue_script( 'lsvr-lore-third-party-scripts', get_template_directory_uri() . '/assets/js/lore-third-party-scripts.min.js', array( 'jquery' ), $version, true );

				// Main theme scripts
				wp_enqueue_script( 'lsvr-lore-main-scripts', get_template_directory_uri() . '/assets/js/lore-scripts' . $suffix . '.js', array( 'jquery' ), $version, true );

				// Load additional assets
				do_action( 'lsvr_lore_load_assets' );

			}
		}

		// Load editor assets
		add_action( 'enqueue_block_editor_assets', 'lsvr_lore_load_editor_assets' );
		if ( ! function_exists( 'lsvr_lore_load_editor_assets' ) ) {
			function lsvr_lore_load_editor_assets() {

				$version = wp_get_theme( 'lore' );
				$version = $version->Version;

				// Editor style
				wp_enqueue_style( 'lsvr-lore-editor-style', get_template_directory_uri() . '/editor-style.css', false, $version );

				// Editor RTL style
				if ( is_rtl() ) {
					wp_enqueue_style( 'lsvr-lore-editor-rtl-style', get_template_directory_uri() . '/editor-style-rtl.css', false, $version );
				}

				// Load additional editor assets
				do_action( 'lsvr_lore_load_editor_assets' );

			}
		}

    	// Register menus
		register_nav_menu( 'lsvr-lore-header-menu', esc_html__( 'Header Menu', 'lore' ) );
		register_nav_menu( 'lsvr-lore-footer-menu', esc_html__( 'Footer Menu', 'lore' ) );

	    // Register sidebars
	    add_action( 'widgets_init', 'lsvr_lore_register_sidebars' );
		if ( ! function_exists( 'lsvr_lore_register_sidebars' ) ) {
			function lsvr_lore_register_sidebars() {

				// Default sidebar
				register_sidebar( array(
					'name' => esc_html__( 'Default Sidebar', 'lore' ),
					'id' => 'lsvr-lore-default-sidebar',
					'class' => '',
					'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget__inner">',
					'after_widget' => '</div></div>',
					'before_title' => '<h3 class="widget__title">',
					'after_title' => '</h3>',
				));

				// Footer widgets
				register_sidebar( array(
					'name' => esc_html__( 'Footer Widgets', 'lore' ),
					'id' => 'lsvr-lore-footer-widgets',
					'description' => esc_html__( 'Widget area located in the footer of the site. You can change the number of columns under Customizer / Footer with Widget Columns option.', 'lore' ),
					'class' => '',
					'before_widget' => lsvr_lore_get_footer_widgets_before_widget(),
					'after_widget' => lsvr_lore_get_footer_widgets_after_widget(),
					'before_title' => '<h3 class="widget__title">',
					'after_title' => '</h3>',
				));

				// Custom sidebars
				$custom_sidebars = lsvr_lore_get_custom_sidebars();
				if ( ! empty( $custom_sidebars ) ) {
					foreach ( $custom_sidebars as $sidebar_id => $sidebar_label ) {

						register_sidebar( array(
							'name' => $sidebar_label,
							'id' => $sidebar_id,
							'description' => esc_html__( 'Custom Sidebars can be managed under Customizer / Custom Sidebars.', 'lore' ),
							'class' => '',
							'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget__inner">',
							'after_widget' => '</div></div>',
							'before_title' => '<h3 class="widget__title">',
							'after_title' => '</h3>',
						));

					}
				}

			}
		}

	}
}
//add bootstrap

/* Add bootstrap support to the Wordpress theme*/

function theme_add_bootstrap() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'bs-css', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" );
	wp_enqueue_script( 'bootstrap-js', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" );
}

add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );
// Demo import config, it has to be loaded outside of "after_setup_theme" hook
require_once( get_template_directory() . '/inc/demo-import-config.php' );

//talwinder

add_filter('acf/format_value/type=textarea', 'do_shortcode');

function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );




 ?>

