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

	/* Get the theme prefix ("shell"). */
	$prefix = hybrid_get_prefix();

	/* register skin option */
	add_filter( "shell_skins", 'shell_child_skin_register' );

	/* add skin css */
	add_filter( "{$prefix}_styles", 'shell_child_skin_css' );
}

/**
 * Register Skin.
 * @since 0.1.0
 */
function shell_child_skin_register( $skins ){

	/* register "valentine" skin */
	$skins['valentine'] = array(
		'name' => 'Valentine',
		'screenshot' => get_stylesheet_directory_uri() . '/valentine.png',
		'description' => 'Skin For Valentine Day',
	);

	/* register "halloween" skin */
	$skins['halloween'] = array(
		'name' => 'Halloween',
		'screenshot' => get_stylesheet_directory_uri() . '/halloween.png',
		'description' => 'Skin For Halloween Day',
	);

	/* register "christmas" skin */
	$skins['christmas'] = array(
		'name' => 'Christmas',
		'screenshot' => get_stylesheet_directory_uri() . '/christmas.png',
		'description' => 'Skin For Christmas Day',
	);

	return $skins;
}


/**
 * Skins CSS
 * @since 0.1.0
 */
function shell_child_skin_css( $styles ){

	/* get active skin */
	$active_skin = shell_active_skin();

	/* if "valentine" selected */
	if ( $active_skin == 'valentine' ){
		$styles['skin'] = array(
			'src' => get_stylesheet_directory_uri() . '/valentine.css',
		);
	}
	/* if "halloween" selected */
	if ( $active_skin == 'halloween' ){
		$styles['skin'] = array(
			'src' => get_stylesheet_directory_uri() . '/halloween.css',
		);
	}
	/* if "christmas" selected */
	if ( $active_skin == 'christmas' ){
		$styles['skin'] = array(
			'src' => get_stylesheet_directory_uri() . '/christmas.css',
		);
	}

	return $styles;
}

