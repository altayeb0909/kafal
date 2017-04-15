<?php
/**
 * Kafal Theme Customizer
 *
 * @package kafal
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kafal_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Header Text
	 */

	$wp_customize->add_setting( 'kafal_headline' , array(
		'default' => 'Kafal',
		'transport' => 'postMessage',
		'sanitize_callback' => 'kafal_text_sanitize',
	) );

	$wp_customize->add_control( 'kafal_headline' , array(
		'type' => 'text',
		'label' => __( 'Headline' , 'kafal' ),
		'default' => 'Kafal',
		'section' => 'kafal_header_text',
		'priority' => 4,
	) );

	$wp_customize->add_setting( 'kafal_subheading' , array(
		'default' => 'Clean Bootstrap Theme',
		'transport' => 'postMessage',
		'sanitize_callback' => 'kafal_text_sanitize',
	) );

	$wp_customize->add_control( 'kafal_subheading' , array(
		'type' => 'text',
		'label' => __( 'Subheading' , 'kafal' ),
		'default' => 'Kafal',
		'section' => 'kafal_header_text',
		'priority' => 5,
	) );

	$wp_customize->add_section( 'kafal_header_text', array(
		'title' => __( 'Header Text', 'kafal' ),
		'panel' => '',
		'priority' => 50,
		'capability' => 'edit_theme_options',
	) );
}
add_action( 'customize_register', 'kafal_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kafal_customize_preview_js() {
	wp_enqueue_script( 'kafal_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kafal_customize_preview_js' );

/**
 * Function for sanitize header text
 */
function kafal_text_sanitize( $text ) {
	return esc_html( $text );
}
