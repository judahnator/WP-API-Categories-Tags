=== Plugin Name ===
Contributors: judahnator
Tags: comments, tags, wp-api, api
Requires at least: 4.3
Tested up to: 4.4.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows users to post, submit, and view tags and categories in the WordPress REST API (v2)

== Description ==

This plugin will allow the inclusion of a given posts categories and tags in both reading from and writing to the WP REST API.

I have also included a few of my own endpoints, (found at: /wp-json/e_ct/v1/) "categories" and "tags." These endpoints will print out all
categories on that site, and if you provide a post ID it will give you the categories/tags for that post.

NOTE:
For future compatibility I have prefixed everything with "e_"
This is so if the WordPress team eventually supports this functionality, this plugin will not interfear with their API

== Installation ==

1. Double check you have the WordPress REST (v2) API installed and active
1. Upload the plugin folder to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

= None Yet =

Ask Away!

== Changelog ==

= 1.0 =
* Initial release!

