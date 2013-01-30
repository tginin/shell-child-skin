<?php
/**
 * This is child themes functions.php file. All modifications should be made in this file.
 *
 * All style changes should be in child themes style.css file.
 *
 * @package ShellChild
 * @subpackage Functions
 */

/* Adds the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'shell_child_skin_setup', 11 );

/**
 * Setup function.  All child themes should run their setup within this function.  The idea is to add/remove 
 * filters and actions after the parent theme has been set up.  This function provides you that opportunity.
 *
 * @since 0.1.0
 */
function shell_child_skin_setup() {

	/* Get the theme prefix ("path"). */
	$prefix = hybrid_get_prefix();

	/* register skin option */
	add_filter( "shell_skin", 'shell_child_skin_register' );

	/* add skins style */
	add_filter( "{$prefix}_styles", 'shell_child_skin_style' );

}

/**
 * Add this skin to skin array
 */
function shell_child_skin_register( $skins ){

	/* register "red" skin */
	$skins['violet'] = array( 'name' => 'Violet (Shell Child)', 'image' => get_stylesheet_directory_uri() . '/skins/violet-ss.jpg' );

	/* register "blue" skin */
	$skins['green'] = array( 'name' => 'Green (Shell Child)', 'image' => get_stylesheet_directory_uri() . '/skins/green-ss.jpg' );

	return $skins;
}

/**
 * Add Stylesheet
 */
function shell_child_skin_style( $styles ){

	/* get option */
	$option = hybrid_get_setting( 'skin' );

	/* version */
	$theme = wp_get_theme();
	$version = $theme->get( 'Version' );

	/* red skin selected */
	if ( $option == 'violet' ){
		/* add media queries css */
		$styles['skin'] = array(
			'src' => get_stylesheet_directory_uri() . '/skins/violet.css',
			'media' => 'all',
			'deps' => 'style',
			'version' => 'violet' . $version,
		);
	}

	/* blue skin selected */
	elseif ( $option == 'green' ){
		/* add media queries css */
		$styles['skin'] = array(
			'src' => get_stylesheet_directory_uri() . '/skins/green.css',
			'media' => 'all',
			'deps' => 'style',
			'version' => 'green' . $version,
		);
	}

	return $styles;
}

