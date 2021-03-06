<?php
function cgd_eer_remove_filter_by_classname( $filter, $classname, $priority ) {
	global $wp_filter;
	$match = false;
	if( !empty( $wp_filter[$filter] ) && !empty( $wp_filter[$filter][$priority] ) ) {
		foreach( $wp_filter[$filter][$priority] as $added_filter ) {
			if( is_array( $added_filter['function'] ) && get_class( $added_filter['function'][0] ) === $classname ) {
				$match = $added_filter;
				break;
			}
		}
	}
	if( $match ) {
		remove_filter( $filter, $match['function'], $priority, $match['accepted_args'] );
	}
}