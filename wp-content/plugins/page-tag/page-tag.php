<?php
/*
Plugin Name: Enable Tags in WordPress Pages
Plugin URI: http://www.sitepoint.com/
Description: Enables tags in all content
Version: 1.0
Author: Craig Buckler
Author URI: http://twitter.com/craigbuckler
License: Free to use and adapt
*/

// add tag support to pages
function tags_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
    if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

?>