<?php

namespace WP_React;


/**
 * Class Menu
 *
 * @package WP_React
 */
class Menu {

	/**
	 * @var
	 */
	public $slug;
	/**
	 * @var
	 */
	public $name;

	/**
	 * Menu constructor.
	 *
	 * @param $slug
	 * @param $name
	 */
	public function __construct( $slug, $name ) {
		$this->slug = $slug;
		$this->name = $name;
	}

	/**
	 * create
	 */
	public function create() {
		add_action( 'init', array( $this, 'register' ) );
		add_action( 'rest_api_init', array( $this, 'endpoint' ) );
	}

	/**
	 * register
	 */
	public function register() {
		register_nav_menu( $this->slug, __( $this->name ) );
	}

	/**
	 * @param $request
	 *
	 * @return array|false
	 */
	public function get_menu( $request ) {
		return wp_get_nav_menu_items( $request['term_id'] );
	}

	/**
	 * endpoint
	 */
	public function endpoint() {
		register_rest_route( Core::name, '/menu/(?P<term_id>\d+)', array(
			'methods' => 'GET',
			'callback' => array( $this, 'get_menu' ),
		) );
	}


}