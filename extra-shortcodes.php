<?php
/*
Plugin Name: Extra Shortcodes
Plugin URI: http://wordpress.org/plugins/extra-shortcodes/
Description: [extra_archives], [extra_taxonomies], [bloginfo show="name"], [date format="l jS \\of F Y h:i:s A" timestamp="+2 years +3 months -20 days -10 hours +30 minutes"], [date_i18n], [time], [year plus="2"], [month minus="3"], [month_name], [day], [weekday]
Version: 2.2
Author: webvitaly
Text Domain: extra-shortcodes
Author URI: http://web-profile.com.ua/wordpress/plugins/
License: GPLv3
*/


class Extra_Shortcodes {

	public static function init() {

		// Note: shortcode names should be all lowercase and use all letters, numbers and underscores (not dashes!)

		add_shortcode( 'extra_archives', array( __CLASS__, 'archives_shortcode' ) );

		add_shortcode( 'extra_taxonomies', array( __CLASS__, 'taxonomies_shortcode' ) );

		add_shortcode( 'bloginfo', array( __CLASS__, 'bloginfo_shortcode' ) );

		add_shortcode( 'site_name', array( __CLASS__, 'site_name_shortcode' ) );
		add_shortcode( 'site_desc', array( __CLASS__, 'site_desc_shortcode' ) );
		add_shortcode( 'site_url', array( __CLASS__, 'site_url_shortcode' ) );
		add_shortcode( 'wp_version', array( __CLASS__, 'wp_version_shortcode' ) );

		add_shortcode( 'date', array( __CLASS__, 'date_shortcode' ) );
		add_shortcode( 'date_i18n', array( __CLASS__, 'date_i18n_shortcode' ) );

		add_shortcode( 'time', array( __CLASS__, 'time_shortcode' ) );
		add_shortcode( 'year', array( __CLASS__, 'year_shortcode' ) );
		add_shortcode( 'month', array( __CLASS__, 'month_shortcode' ) );
		add_shortcode( 'month_name', array( __CLASS__, 'month_name_shortcode' ) );
		add_shortcode( 'day', array( __CLASS__, 'day_shortcode' ) );
		add_shortcode( 'weekday', array( __CLASS__, 'weekday_shortcode' ) );
		add_shortcode( 'hours', array( __CLASS__, 'hours_shortcode' ) );
		add_shortcode( 'minutes', array( __CLASS__, 'minutes_shortcode' ) );
		add_shortcode( 'seconds', array( __CLASS__, 'seconds_shortcode' ) );

		add_filter( 'plugin_row_meta', array( __CLASS__, 'plugin_row_meta' ), 10, 2 );

	}


	public static function archives_shortcode( $atts ) {
		$defaults = array(
			'type' => 'monthly',
			'limit' => '',
			//'format' => 'html',
			//'before' => '',
			//'after' => '',
			'show_post_count' => 0,
			//'echo' => 0,
			'order' => 'DESC'
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$archives_args = array(
			'type' => $type,
			'limit' => $limit,
			'format' => 'html',
			'before' => '',
			'after' => '',
			'show_post_count' => $show_post_count,
			'echo' => 0,
			'order' => $order
		);

		return '<ul>'."\n".wp_get_archives( $archives_args ).'</ul>'."\n".'<!-- Powered by Extra Shortcodes wordpress.org/plugins/extra-shortcodes/ -->';
	}


	public static function taxonomies_shortcode( $atts ) {
		$defaults = array(
			//'show_option_all' => '',
			'orderby' => 'name',
			'order' => 'ASC',
			//'style' => 'list',
			'show_count' => 0,
			'hide_empty' => 1,
			'use_desc_for_title' => 1,
			'child_of' => 0,
			'exclude' => '',
			'exclude_tree' => '',
			'include' => '',
			'hierarchical' => 1,
			//'title_li' => '',
			'number' => null,
			//'echo' => 0,
			'depth' => 0,
			'taxonomy' => 'category',
		);
		extract( shortcode_atts( $defaults, $atts ) );
		$categories_args = array(
			'show_option_all' => '',
			'orderby' => $orderby,
			'order' => $order,
			'style' => 'list',
			'show_count' => $show_count,
			'hide_empty' => $hide_empty,
			'use_desc_for_title' => $use_desc_for_title,
			'child_of' => $child_of,
			'exclude' => $exclude,
			'exclude_tree' => $exclude_tree,
			'include' => $include,
			'hierarchical' => $hierarchical,
			'title_li' => '',
			'number' => $number,
			'echo' => 0,
			'depth' => $depth,
			'taxonomy' => $taxonomy,
		);

		return '<ul>'."\n".wp_list_categories( $categories_args ).'</ul>'."\n".'<!-- Powered by Extra Shortcodes wordpress.org/plugins/extra-shortcodes/ -->';
	}


	public static function bloginfo_shortcode( $atts ) {
		extract(shortcode_atts(array(
			'show' => 'name'
		), $atts));
		return get_bloginfo($show);
	}


	public static function site_name_shortcode() {
		return get_bloginfo('name');
	}


	public static function site_desc_shortcode() {
		return get_bloginfo('description');
	}


	public static function site_url_shortcode() {
		return get_bloginfo('url');
	}


	public static function wp_version_shortcode() {
		return get_bloginfo('version');
	}


	public static function date_shortcode( $atts ) {
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


	public static function date_i18n_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'format' => 'l jS \of F Y',
			'timestamp' => 'now'
		), $atts ) );
		return date_i18n( $format, strtotime( $timestamp ) );
	}


	public static function time_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'format' => 'h:i:s A',
			'timestamp' => 'now'
		), $atts ) );
		return date( $format, strtotime( $timestamp ) );
	}


	public static function year_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if ( !empty( $plus ) ) {
			$year = date( 'Y', strtotime( '+'.intval($plus).' years' ) );
		} elseif ( !empty( $minus ) ) {
			$year = date( 'Y', strtotime( '-'.intval($minus).' years' ) );
		} else {
			$year = date( 'Y', strtotime( $timestamp ) );
		}
		return $year;
	}


	public static function month_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if ( !empty( $plus ) ) {
			$month = date( 'm', strtotime( '+'.intval($plus).' months' ) );
		} elseif ( !empty( $minus ) ) {
			$month = date( 'm', strtotime( '-'.intval($minus).' months' ) );
		} else {
			$month = date( 'm', strtotime( $timestamp ) );
		}
		return $month;
	}


	public static function month_name_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if ( !empty( $plus ) ) {
			$month_name = date( 'F', strtotime( '+'.intval($plus).' months' ) );
		} elseif ( !empty( $minus ) ) {
			$month_name = date( 'F', strtotime( '-'.intval($minus).' months' ) );
		} else {
			$month_name = date( 'F', strtotime( $timestamp ) );
		}
		return $month_name;
	}


	public static function day_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if ( !empty( $plus ) ) {
			$day = date( 'd', strtotime( '+'.intval($plus).' days' ) );
		} elseif ( !empty( $minus ) ) {
			$day = date( 'd', strtotime( '-'.intval($minus).' days' ) );
		} else {
			$day = date( 'd', strtotime( $timestamp ) );
		}
		return $day;
	}


	public static function weekday_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if ( !empty( $plus ) ) {
			$weekday = date( 'l', strtotime( '+'.intval($plus).' days' ) );
		} elseif ( !empty( $minus ) ) {
			$weekday = date( 'l', strtotime( '-'.intval($minus).' days' ) );
		} else {
			$weekday = date( 'l', strtotime( $timestamp ) );
		}
		return $weekday;
	}


	public static function hours_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if ( !empty( $plus ) ) {
			$hours = date( 'H', strtotime( '+'.intval($plus).' hours' ) );
		} elseif ( !empty( $minus ) ) {
			$hours = date( 'H', strtotime( '-'.intval($minus).' hours' ) );
		} else {
			$hours = date( 'H', strtotime( $timestamp ) );
		}
		return $hours;
	}


	public static function minutes_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if ( !empty( $plus ) ) {
			$minutes = date( 'i', strtotime( '+'.intval($plus).' minutes' ) );
		} elseif ( !empty( $minus ) ) {
			$minutes = date( 'i', strtotime( '-'.intval($minus).' minutes' ) );
		} else {
			$minutes = date( 'i', strtotime( $timestamp ) );
		}
		return $minutes;
	}


	public static function seconds_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'plus' => 0,
			'minus' => 0,
			'timestamp' => 'now'
		), $atts ) );
		if ( !empty( $plus ) ) {
			$seconds = date( 's', strtotime( '+'.intval($plus).' seconds' ) );
		} elseif ( !empty( $minus ) ) {
			$seconds = date( 's', strtotime( '-'.intval($minus).' seconds' ) );
		} else {
			$seconds = date( 's', strtotime( $timestamp ) );
		}
		return $seconds;
	}


	public static function plugin_row_meta( $links, $file ) {
		if ( $file == plugin_basename( __FILE__ ) ) {
			$row_meta = array(
				'support' => '<a href="http://web-profile.com.ua/wordpress/plugins/extra-shortcodes/" target="_blank"><span class="dashicons dashicons-editor-help"></span> ' . __( 'Extra Shortcodes', 'extra-shortcodes' ) . '</a>',
				'donate' => '<a href="http://web-profile.com.ua/donate/" target="_blank"><span class="dashicons dashicons-heart"></span> ' . __( 'Donate', 'extra-shortcodes' ) . '</a>',
				'pro' => '<a href="http://codecanyon.net/item/silver-bullet-pro/15171769?ref=webvitalii" target="_blank" title="Speedup and protect WordPress in a smart way"><span class="dashicons dashicons-star-filled"></span> ' . __( 'Silver Bullet Pro', 'extra-shortcodes' ) . '</a>'
			);
			$links = array_merge( $links, $row_meta );
		}
		return (array) $links;
	}

}


Extra_Shortcodes::init();
