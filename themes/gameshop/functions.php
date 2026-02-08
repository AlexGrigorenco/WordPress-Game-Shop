<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gameshop
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function gameshop_styles()
{
	wp_enqueue_style(
		'gameshop-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get('Version')
	);

	// Global styles
	wp_enqueue_style(
		'gameshop-reset',
		get_template_directory_uri() . '/assets/css/reset.css',
		['gameshop-style'], // зависимость
		wp_get_theme()->get('Version')
	);

	// Global styles
	wp_enqueue_style(
		'gameshop-main',
		get_template_directory_uri() . '/assets/css/global-styles.css',
		['gameshop-reset'], // зависимость
		wp_get_theme()->get('Version')
	);
}
add_action('wp_enqueue_scripts', 'gameshop_styles');

function gameshop_scripts()
{
	wp_enqueue_script(
		'gameshop-main',
		get_template_directory_uri() . '/assets/js/global-scripts.js',
		[],
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('wp_enqueue_scripts', 'gameshop_scripts');

function gamestore_google_font()
{
	$font_url = '';
	$font = 'Urbanist';
	$font_extra = 'ital,wght@0,400;0,700;1,400;1,700';

	if ('off' !== _x('on', 'Google font: on or off', 'gamestore')) {
		$query_args = array(
			'family' => urldecode($font . ':' . $font_extra),
			'subset' => urldecode('latin,latin-ext'),
			'display' => urldecode('swap'),
		);
		$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css2');
	}

	return $font_url;
}

function gamestore_google_font_script()
{
	wp_enqueue_style('gamestore-google-font', gamestore_google_font(), [], '1.0.0');
}

add_action('wp_enqueue_scripts', 'gamestore_google_font_script');
