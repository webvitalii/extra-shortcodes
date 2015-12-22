<?php
/*
Plugin Name: Extra-shortcodes
Plugin URI: http://wordpress.org/plugins/extra-shortcodes/
Description: [bloginfo show="name"], [site_name], [site_desc], [date format="l jS \\of F Y h:i:s A" timestamp="+2 years +3 months -20 days -10 hours +30 minutes"], [date_i18n], [time], [year plus="2"], [month minus="3"], [month_name], [day], [weekday]
Version: 1.6
Author: webvitaly
Author URI: http://web-profile.com.ua/wordpress/plugins/
License: GPLv3
*/


if ( !function_exists('bloginfo_shortcode') ) {
	function bloginfo_shortcode( $atts ) {
		extract(shortcode_atts(array(
			'show' => 'name'
		), $atts));
		return get_bloginfo($show);
	}
	add_shortcode('bloginfo', 'bloginfo_shortcode');
}


if ( !function_exists('site_name_shortcode') ) {
	function site_name_shortcode() {
		return get_bloginfo('name');
	}
	add_shortcode( 'site_name', 'site_name_shortcode' ); // shortcode names should be all lowercase and use all letters, numbers and underscores (not dashes!)
	add_shortcode( 'sitename', 'site_name_shortcode' ); // just in case
	add_shortcode( 'site_title', 'site_name_shortcode' ); // just in case
	add_shortcode( 'sitetitle', 'site_name_shortcode' ); // just in case
}


if ( !function_exists('site_desc_shortcode') ) {
	function site_desc_shortcode() {
		return get_bloginfo('description');
	}
	add_shortcode( 'site_desc', 'site_desc_shortcode' ); // shortcode names should be all lowercase and use all letters, numbers and underscores (not dashes!)
	add_shortcode( 'sitedesc', 'site_desc_shortcode' ); // just in case
	add_shortcode( 'site_description', 'site_desc_shortcode' ); // just in case
	add_shortcode( 'sitedescription', 'site_desc_shortcode' ); // just in case
}


if ( !function_exists('site_url_shortcode') ) {
	function site_url_shortcode() {
		return get_bloginfo('url');
	}
	add_shortcode( 'site_url', 'site_url_shortcode' ); // shortcode names should be all lowercase and use all letters, numbers and underscores (not dashes!)
	add_shortcode( 'siteurl', 'site_url_shortcode' ); // just in case
}


if ( !function_exists('wp_version_shortcode') ) {
	function wp_version_shortcode() {
		return get_bloginfo('version');
	}
	add_shortcode( 'wp_version', 'wp_version_shortcode' ); // shortcode names should be all lowercase and use all letters, numbers and underscores (not dashes!)
	add_shortcode( 'wpversion', 'wp_version_shortcode' ); // just in case
}


if ( !function_exists('date_shortcode') ) {
	function date_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'format' => 'l jS \of F Y',
			'timestamp' => 'now',
			'use_wordpress_timezone' => '0'
		), $atts ) );
		if ( $use_wordpress_timezone == 1 OR $use_wordpress_timezone == '1' OR $use_wordpress_timezone == true OR $use_wordpress_timezone == 'true' ) {
			//$date = get_gmt_from_date();
			if ( get_option( 'timezone_string' ) AND get_option( 'timezone_string' ) != '' ) {
				date_default_timezone_set( get_option( 'timezone_string' ) );
				$date = date( $format, strtotime( $timestamp ) );
				date_default_timezone_set(@date_default_timezone_get()); // set default timezone
			} elseif ( get_option( 'gmt_offset' ) AND get_option( 'gmt_offset' ) != '' ) {
				$date = date( $format, strtotime( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS.' seconds' ) ) . get_option( 'gmt_offset' );
			} else {
				$date = date( $format, strtotime( $timestamp ) );
			}
		} else {
			$date = date( $format, strtotime( $timestamp ) );
		}

		return $date;
	}
	add_shortcode( 'date', 'date_shortcode' );
}


if ( !function_exists('date_i18n_shortcode') ) {
	function date_i18n_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'format' => 'l jS \of F Y',
			'timestamp' => 'now'
		), $atts ) );
		return date_i18n( $format, strtotime( $timestamp ) );
	}
	add_shortcode( 'date_i18n', 'date_i18n_shortcode' );
}


if ( !function_exists('time_shortcode') ) {
	function time_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'format' => 'h:i:s A',
			'timestamp' => 'now'
		), $atts ) );
		return date( $format, strtotime( $timestamp ) );
	}
	add_shortcode( 'time', 'time_shortcode' );
}


if ( !function_exists('year_shortcode') ) {
	function year_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if( !empty( $plus ) ){
			$year = date( 'Y', strtotime( '+'.intval($plus).' years' ) );
		}elseif( !empty( $minus ) ){
			$year = date( 'Y', strtotime( '-'.intval($minus).' years' ) );
		}else{
			$year = date( 'Y', strtotime( $timestamp ) );
		}
		return $year;
	}
	add_shortcode( 'year', 'year_shortcode' );
}


if ( !function_exists('month_shortcode') ) {
	function month_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if( !empty( $plus ) ){
			$month = date( 'm', strtotime( '+'.intval($plus).' months' ) );
		}elseif( !empty( $minus ) ){
			$month = date( 'm', strtotime( '-'.intval($minus).' months' ) );
		}else{
			$month = date( 'm', strtotime( $timestamp ) );
		}
		return $month;
	}
	add_shortcode( 'month', 'month_shortcode' );
}


if ( !function_exists('month_name_shortcode') ) {
	function month_name_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if( !empty( $plus ) ){
			$month_name = date( 'F', strtotime( '+'.intval($plus).' months' ) );
		}elseif( !empty( $minus ) ){
			$month_name = date( 'F', strtotime( '-'.intval($minus).' months' ) );
		}else{
			$month_name = date( 'F', strtotime( $timestamp ) );
		}
		return $month_name;
	}
	add_shortcode( 'month_name', 'month_name_shortcode' ); // shortcode names should be all lowercase and use all letters, numbers and underscores (not dashes!)
	add_shortcode( 'monthname', 'month_name_shortcode' ); // just in case
}


if ( !function_exists('day_shortcode') ) {
	function day_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if( !empty( $plus ) ){
			$day = date( 'd', strtotime( '+'.intval($plus).' days' ) );
		}elseif( !empty( $minus ) ){
			$day = date( 'd', strtotime( '-'.intval($minus).' days' ) );
		}else{
			$day = date( 'd', strtotime( $timestamp ) );
		}
		return $day;
	}
	add_shortcode( 'day', 'day_shortcode' );
}


if ( !function_exists('weekday_shortcode') ) {
	function weekday_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if( !empty( $plus ) ){
			$weekday = date( 'l', strtotime( '+'.intval($plus).' days' ) );
		}elseif( !empty( $minus ) ){
			$weekday = date( 'l', strtotime( '-'.intval($minus).' days' ) );
		}else{
			$weekday = date( 'l', strtotime( $timestamp ) );
		}
		return $weekday;
	}
	add_shortcode( 'weekday', 'weekday_shortcode' ); // shortcode names should be all lowercase and use all letters, numbers and underscores (not dashes!)
	add_shortcode( 'week_day', 'weekday_shortcode' ); // just in case
}


if ( !function_exists('hours_shortcode') ) {
	function hours_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if( !empty( $plus ) ){
			$hours = date( 'H', strtotime( '+'.intval($plus).' hours' ) );
		}elseif( !empty( $minus ) ){
			$hours = date( 'H', strtotime( '-'.intval($minus).' hours' ) );
		}else{
			$hours = date( 'H', strtotime( $timestamp ) );
		}
		return $hours;
	}
	add_shortcode( 'hours', 'hours_shortcode' );
	add_shortcode( 'hour', 'hours_shortcode' ); // just in case
}


if ( !function_exists('minutes_shortcode') ) {
	function minutes_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if( !empty( $plus ) ){
			$minutes = date( 'i', strtotime( '+'.intval($plus).' minutes' ) );
		}elseif( !empty( $minus ) ){
			$minutes = date( 'i', strtotime( '-'.intval($minus).' minutes' ) );
		}else{
			$minutes = date( 'i', strtotime( $timestamp ) );
		}
		return $minutes;
	}
	add_shortcode( 'minutes', 'minutes_shortcode' );
	add_shortcode( 'minute', 'minutes_shortcode' ); // just in case
}


if ( !function_exists('seconds_shortcode') ) {
	function seconds_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if( !empty( $plus ) ){
			$seconds = date( 's', strtotime( '+'.intval($plus).' seconds' ) );
		}elseif( !empty( $minus ) ){
			$seconds = date( 's', strtotime( '-'.intval($minus).' seconds' ) );
		}else{
			$seconds = date( 's', strtotime( $timestamp ) );
		}
		return $seconds;
	}
	add_shortcode( 'seconds', 'seconds_shortcode' );
	add_shortcode( 'second', 'seconds_shortcode' ); // just in case
}


if( ! function_exists( 'extra_shortcodes_unqprfx_plugin_meta' ) ) {
	function extra_shortcodes_unqprfx_plugin_meta( $links, $file ) { // add 'Support' and 'Donate' links to plugin meta row
		if ( strpos( $file, 'extra-shortcodes.php' ) !== false ) {
			$links = array_merge( $links, array( '<a href="http://web-profile.com.ua/wordpress/plugins/extra-shortcodes/" title="Plugin page">Extra-shortcodes</a>' ) );
			$links = array_merge( $links, array( '<a href="http://web-profile.com.ua/donate/" title="Support the development">Donate</a>' ) );
		}
		return $links;
	}
	add_filter( 'plugin_row_meta', 'extra_shortcodes_unqprfx_plugin_meta', 10, 2 );
}