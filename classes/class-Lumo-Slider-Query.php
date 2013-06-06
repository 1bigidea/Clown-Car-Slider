<?php

class Lumo_Slider_Query extends WP_Query {

	function __construct( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'post_type' => 'lumo_slide',
			'orderby' => 'menu_order',
			'post_status' => 'publish',
			'order' => 'ASC',
			// Turn off paging
			'posts_per_page' => -1,
			// Since, we won't be paging,
			// no need to count rows
			'no_found_rows' => true
		) );

		parent::__construct( $args );

	}

}