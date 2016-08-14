<?php
if (!function_exists('posttype')) {
	function posttype($args = array()) {
		return new CustomPostType\PostType\Builder();
	}
}

if (!function_exists('metabox')) {
	function metabox($args = array()) {
		return new CustomPostType\MetaBox\Builder();
	}
}

if (!function_exists('taxonomy')) {
	function taxonomy($args = array()) {
		return new CustomPostType\Taxonomy\Builder();
	}
}
