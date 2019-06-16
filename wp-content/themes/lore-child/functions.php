<?php add_action( 'after_setup_theme', 'lsvr_lore_child_theme_setup' );
if ( ! function_exists( 'lsvr_lore_child_theme_setup' ) ) {
    function lsvr_lore_child_theme_setup() {

        /**
         * Load parent and child style.css
         *
         * @link https://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme
         */
        add_action( 'wp_enqueue_scripts', 'lsvr_lore_child_enqueue_parent_styles' );
        if ( ! function_exists( 'lsvr_lore_child_enqueue_parent_styles' ) ) {
            function lsvr_lore_child_enqueue_parent_styles() {

                // Load parent theme's style.css
                $parent_version = wp_get_theme( 'lore' );
                $parent_version = $parent_version->Version;
                wp_enqueue_style( 'lsvr-lore-main-style', get_template_directory_uri() . '/style.css', array(), $parent_version );

                // Load child theme's style.css
                $child_version = wp_get_theme();
                $child_version = $child_version->Version;
                wp_enqueue_style( 'lsvr-lore-child-style', get_stylesheet_directory_uri() . '/style.css', array(), $child_version );

            }
        }

        /* Load editor style */
        add_action( 'enqueue_block_editor_assets', 'lsvr_lore_child_load_editor_assets' );
        if ( ! function_exists( 'lsvr_lore_child_load_editor_assets' ) ) {
            function lsvr_lore_child_load_editor_assets() {

                $child_version = wp_get_theme();
                $child_version = $child_version->Version;
                wp_enqueue_style( 'lsvr-lore-child-editor-style', get_stylesheet_directory_uri() . '/editor-style.css', array(), $child_version );

            }
        }

        /* Add your code after this comment */

    }
} ?>