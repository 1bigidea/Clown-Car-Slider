<?php
/*
Plugin Name: Clown Car Slider
Plugin URI: http://geek.1bigidea.com/
Description: Basic slider that uses SVG to load images based on breakpoints
Version: 1.0
Author: Tom Ransom
Author URI: http://1bigidea.com
Network Only: false

Copyright 2013 Tom Ransom (email: transom@1bigidea.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

class onebigidea_ClownCarSlider {
	private static $_this;
	var $plugin_slug = "onebigidea_ClownCarSlider";
	var $plugin_name = "Clown Car Slider";
	var $plugin_version = "1.0";

	function __construct() {

		register_activation_hook(   __FILE__, array( __CLASS__, 'activate'   ) );
		register_deactivation_hook( __FILE__, array( __CLASS__, 'deactivate' ) );

		add_action('init', array($this, 'init'));

	}
	function __destruct(){
	}
	function activate() {
		// Add options, initiate cron jobs here
		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );
	}
	function deactivate() {
		// Remove cron jobs here
	}
	function uninstall() {
		// Delete options here
	}
	static function this(){
		// enables external management of filters/actions
		// http://hardcorewp.com/2012/enabling-action-and-filter-hook-removal-from-class-based-wordpress-plugins/
		// enables external management of filters/actions
		// http://hardcorewp.com/2012/enabling-action-and-filter-hook-removal-from-class-based-wordpress-plugins/
		// http://7php.com/how-to-code-a-singleton-design-pattern-in-php-5/
		if( !is_object(self::$_this) ) self::$_this = new onebigidea_ClownCarSlider();

		return self::$_this;
	}
	/*
	 *	Functions below actually do the work
	 */
	function init(){

	}
}

if ( ! class_exists( 'Autoload_WP' ) ) {
	/**
	 * Generic autoloader for classes named in WordPress coding style.
	 */
	class Autoload_WP {

		public $dir = __DIR__;

		function __construct( $dir = '' ) {

			if ( ! empty( $dir ) )
				$this->dir = $dir;

			spl_autoload_register( array( $this, 'spl_autoload_register' ) );
		}

		function spl_autoload_register( $class_name ) {

			$class_path = $this->dir . '/class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';

			if ( file_exists( $class_path ) )
				include $class_path;
		}
	}
}
new onebigidea_ClownCarSlider();