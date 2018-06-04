<?php

Namespace WP_React;

/**
 * Class Core
 *
 * @package WP_React
 */
Class Core {

	Const name = 'WP_React';

	public function init() {
		$this->load();


		$menu = new namespace\Menu('header_menu', 'Header Menu' );
		$menu->create();
	}

	public function actions() {
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );

	}

	public function load() {
		require_once 'Menu.php';
	}

	public function theme_support() {
		add_theme_support( 'post-thumbnails' );
	}

	public function enqueue_assets() {
		wp_enqueue_script( 'js', get_stylesheet_directory_uri() . 'js/dist/bundle.js' );
	}
}


