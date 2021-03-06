<?php
/*
Plugin Name: Lumo Slider
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

	private function __construct() {

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
	static function get_instance(){
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
		$this->register_cpt_lumo_slides();

		add_action( 'admin_head', array($this, 'plugin_header_image') );
		add_action( 'admin_head', array($this, 'lumo_cpt_icons') );

		add_action('admin_menu', array($this, 'admin_menus') );

		add_action('wp_enqueue_scripts', array($this, 'enqueue') );

		/**
		 *	Set Custom Main Slider Image size
		 */
		add_image_size('home-slider-image', 1600, 600);
		add_image_size('home-slider-image-lowrez', 1366, 512);
	}

	function admin_menus(){
		$pagename = 'edit.php?post_type=lumo_slide';

		add_submenu_page($pagename, 'Lumo Slider Settings', 'Settings', 'manage_options', 'lumo-slider-settings', array($this, 'settings_page'), plugins_url('/images/projection-screen-32x32.png', __FILE__) );
	}

	function enqueue(){
		wp_enqueue_style('lumo-slider-css', plugins_url('css/lumo-slider.css', __FILE__) );

		wp_enqueue_script('jquery');
		wp_enqueue_script('plusSlider', plugins_url('js/PlusSlider/js/jquery.plusslider-min.js', __FILE__), array('jquery') );
		wp_enqueue_script('lumo-slider', plugins_url('js/lumo-slider.js', __FILE__), array('jquery', 'plusSlider'));
	}

	function register_cpt_lumo_slides() {

		$labels = array(
			'name' => _x( 'Lumo Slides', 'lumo_slide' ),
			'singular_name' => _x( 'Lumo Slide', 'lumo_slide' ),
			'add_new' => _x( 'Add New', 'lumo_slide' ),
			'add_new_item' => _x( 'Add New Lumo Slide', 'lumo_slide' ),
			'edit_item' => _x( 'Edit Lumo Slide', 'lumo_slide' ),
			'new_item' => _x( 'New Lumo Slide', 'lumo_slide' ),
			'view_item' => _x( 'View Lumo Slide', 'lumo_slide' ),
			'search_items' => _x( 'Search Lumo Slides', 'lumo_slide' ),
			'not_found' => _x( 'No lumo slides found', 'lumo_slide' ),
			'not_found_in_trash' => _x( 'No lumo slides found in Trash', 'lumo_slide' ),
			'parent_item_colon' => _x( 'Parent Lumo Slide:', 'lumo_slide' ),
			'menu_name' => _x( 'Lumo Slides', 'lumo_slide' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'Slides for the home page of LUMOback',
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),

			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 100,
			'show_in_nav_menus' => false,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'has_archive' => false,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => false,
			'capability_type' => 'post'
		);

		register_post_type( 'lumo_slide', $args );
	}

	// Adds icon to the page head
	function plugin_header_image() {
		$post_type = get_current_screen()->post_type;

		if ( 'lumo_slide' != $post_type )
			return;
?>
			 <style type="text/css">
				.icon32.icon32-posts-lumo_slide {
				   background: url(<?php echo plugins_url('/images/projection-screen-32x32.png', __FILE__); ?>) !important;
				}
			 </style>
<?php
	}
	function lumo_cpt_icons() {
	?>
		<style type="text/css" media="screen">
			#menu-posts-lumo_slide .wp-menu-image {
				background: url(<?php echo plugins_url('images/projection-screen-presentation.png', __FILE__); ?>) no-repeat 6px -17px !important;
			}
			#menu-posts-lumo_slide:hover .wp-menu-image,
			#menu-posts-lumo_slide.wp-has-current-submenu .wp-menu-image {
				background-position: 6px 7px!important;
			}
		</style>
	<?php
	}

	function settings_page(){
?>
		<div id="lumo-slider-settings" class="wrap">
			<div id="icon_card" class="icon32"></div>
			<h2 id="lumo-slider-page-title">
				<?php esc_html_e( 'Lumo Slider Settings', 'lumo-slider' ); ?>
			</h2>
			</div>
		</div>
<?php
	}
}
onebigidea_ClownCarSlider::get_instance();

if( class_exists('onebigidea_ClownCarSlider') && false ) :
	function lumo_slider(){

		echo '<div id="lumo-slider">';
		for($i=1;$i<=3;$i++) {
			echo '<li>';
?>
				<object data='/wp-content/uploads/lumo-slides/slide<?php echo $i; ?>.svg' type="image/svg+xml">
				  <!--[if lte IE 8]>
				  <img src="//wp-content/uploads/lumo-slides/slide<?php echo $i; ?>/image<?php echo $i; ?>_768.jpg" alt="Fallback for IE">
				  <![endif]-->
				</object>
<?php
				echo '<div class="hero">';
					echo '<h4 class="hero">'.get_the_title().'</h4>';
					the_content();
				echo '</div>';
			echo '</li>';
		}
		echo '</div>';
	}
endif;

if( class_exists('onebigidea_ClownCarSlider') && true ) :
	function lumo_slider(){
	// based on this concept - http://wellcaffeinated.net/articles/2012/12/10/very-simple-css-only-proportional-resizing-of-elements/
		$slides = new Lumo_Slider_Query();

		if( $slides->have_posts() ) :
			$display = "";
			echo '<ul id="lumo-slider">';
			while( $slides->have_posts() ) : $slides->the_post();
				$slide_image = get_the_post_thumbnail(get_the_ID(), 'home-slider-image-lowrez');
				$slide_image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'home-slider-image') );

				$set_width_fullrez = sprintf('width="100%%" data-fullrez="%s"', esc_url($slide_image_url) );

				$slide_image = preg_replace('/width="\d+" +height="\d+"/', $set_width_fullrez, $slide_image);

				echo '<li class="lumo-slide" style="'.$display.'">';
					echo $slide_image;
					echo '<div class="hero-placeholder"></div>';
					echo '<div class="hero">';
							echo '<h4 class="hero">'.get_the_title().'</h4>';
							the_content();
					echo '</div>';
				echo '</li>';
				$display = " display:none; ";
			endwhile;
			wp_reset_postdata();
			echo '</ul>';
		endif;
	}
endif;

require_once('classes/class-Lumo-Slider-Query.php');
