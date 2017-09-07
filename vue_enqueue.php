<?php

/**
 * Gets the contents of the Create React App manifest file
 *
 * @return array|bool|string
 */
function get_app_manifest() {
	$manifest = file_get_contents( get_template_directory_uri() . '/assets/app/dist/asset-manifest.json' );
	$manifest = (array) json_decode( $manifest );
	return $manifest;
}
/**
 * Gets the path to the stylesheet compiled by Create React App
 *
 * @return string
 */
function get_app_stylesheet() {
	$manifest = get_app_manifest();
	return get_template_directory_uri() . '/assets/app/dist/' . $manifest['app.css'];
}
/**
 * Gets the path to the built javascript file compiled by Create React App
 *
 * @return string
 */
function get_app_script() {
	$manifest = get_app_manifest();
	return get_template_directory_uri() . '/assets/app/dist/' . $manifest['app.js'];
}
function get_manifest_script() {
	$manifest = get_app_manifest();
	return get_template_directory_uri() . '/assets/app/dist/' . $manifest['manifest.js'];
}
function get_vendor_script() {
	$manifest = get_app_manifest();
	return get_template_directory_uri() . '/assets/app/dist/' . $manifest['vendor.js'];
}
/**
 * Enqueues the scripts
 */
add_action( 'wp_enqueue_scripts', function() {
	enqueue_vue_app();
} );
/**
 * Enqueues the stylesheet and js
 */
function enqueue_vue_app() {
	wp_enqueue_script( 'wp-vue-manifest', get_manifest_script(), array(), false, true );
	wp_enqueue_script( 'wp-vue-vendor', get_vendor_script(), array(), false, true );
	wp_enqueue_script( 'wp-vue-app', get_app_script(), array(), false, true );
	wp_enqueue_style( 'wp-vue-styles', get_app_stylesheet(), array(), false, false );
}