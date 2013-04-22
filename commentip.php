<?php
/*
Plugin Name: CommentIP
Plugin URI: http://shop.on-ua.com
Description: Определение IP комментатора через WorldIP API (wipmania.com)
Author: Bogdan 'Als von Dante' Zabavchuk
Version: 1.0 @ 22.04.2012
Author URI: http://shop.on-ua.com
*/

$counter_comment_author_IP = 0;

add_filter('get_comment_author_IP','comment_author_World_IP');
function comment_author_World_IP($comment_author_IP) {
  global $counter_comment_author_IP;
	if ($counter_comment_author_IP++%2)
		return $comment_author_IP . ' ' . get_WorldIP($comment_author_IP);
	else
		return $comment_author_IP;
}

function get_WorldIP($IP) {
	if ($IP)
		return @file_get_contents ("http://api.wipmania.com/$IP?".get_option('home'));
	else
		return null;
}

?>
