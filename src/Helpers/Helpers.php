<?php

/**
 * Registrar languages for posttype module
 */
if (!function_exists('lang_post_type_domain')) {
	function lang_post_type_domain() {
		load_textdomain('wba_posttype', dirname(dirname(__FILE__)) . '/PostType/languages');
		//load_theme_textdomain('wba_posttype', dirname(dirname(__FILE__)) . '/PostType/languages');
		//load_plugin_textdomain('wba_posttype', false, dirname(dirname(__FILE__)) . '/PostType/languages');

		load_textdomain('wba_taxonomy', dirname(dirname(__FILE__)) . '/Taxonomy/languages');
	}
}
add_action('init', 'lang_post_type_domain', 0);

if (!function_exists('posttype')) {
	function posttype($singular, $plural = NULL, $options = NULL, $labels = NULL) {
		return new CustomPostType\PostType\Builder($singular, $plural, $options, $labels);
	}
}

if (!function_exists('metabox')) {
	function metabox($args = array()) {
		return new CustomPostType\MetaBox\Builder();
	}
}

if (!function_exists('taxonomy')) {
	function taxonomy($post_types, $singular, $plural = NULL, $options = NULL, $labels = NULL) {
		return new CustomPostType\Taxonomy\Builder($post_types, $singular, $plural, $options, $labels);
	}
}
