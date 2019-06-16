<?php // Config Visual Composer Page Builder
add_action( 'plugins_loaded', 'lsvr_faq_vc_config' );
if ( ! function_exists( 'lsvr_faq_vc_config' ) ) {
	function lsvr_faq_vc_config() {

		if ( function_exists( 'vc_set_as_theme' ) ) {

			// Set as theme
			add_action( 'vc_before_init', 'lsvr_faq_vc_init' );
			if ( ! function_exists( 'lsvr_faq_vc_init' ) && function_exists( 'vc_set_as_theme' ) ) {
				function lsvr_faq_vc_init() {
					vc_set_as_theme();
				}
			}

			// Register VC elements
			add_action( 'init', 'lsvr_faq_register_vc_elements' );
			if ( ! function_exists( 'lsvr_faq_register_vc_elements' ) ) {
				function lsvr_faq_register_vc_elements() {

					 if ( function_exists( 'lsvr_framework_vc_map' ) ) {

						// FAQ List Widget
						if ( class_exists( 'Lsvr_Shortcode_FAQ_List_Widget' ) ) {
							lsvr_framework_vc_map(array(
				                'base' => 'lsvr_faq_list_widget',
				                'name' => esc_html__( 'LSVR FAQ Widget', 'lsvr-faq' ),
				                'description' => esc_html__( 'List of FAQ posts', 'lsvr-faq' ),
				                'category' => esc_html__( 'LSVR Widgets', 'lsvr-faq' ),
				                'content_element' => true,
				                'show_settings_on_create' => true,
				                'params' => Lsvr_Shortcode_FAQ_List_Widget::lsvr_shortcode_atts(),
							));
						}

						// Featured FAQ Widget
						if ( class_exists( 'Lsvr_Shortcode_FAQ_Featured_Widget' ) ) {
							lsvr_framework_vc_map(array(
				                'base' => 'lsvr_faq_featured_widget',
				                'name' => esc_html__( 'LSVR Featured FAQ Widget', 'lsvr-faq' ),
				                'description' => esc_html__( 'Single FAQ post', 'lsvr-faq' ),
				                'category' => esc_html__( 'LSVR Widgets', 'lsvr-faq' ),
				                'content_element' => true,
				                'show_settings_on_create' => true,
				                'params' => Lsvr_Shortcode_FAQ_Featured_Widget::lsvr_shortcode_atts(),
							));
						}

					}

				}
			}

		}

	}
}
?>