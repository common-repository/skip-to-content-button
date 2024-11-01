=== Plugin Name ===
Contributors: twentyeighty
Tags: accessibility, a11y, wcag
Requires at least: 5.2.0
Tested up to: 5.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin that adds a skip to content button for accessibility and assistive technology

== Description ==

The Skip to Content Button plugin adds a visually hidden but assistive technology/keyboard accessible button after the opening body tag that helps users using assistive technology to skip to a defined area on the page (by default an element with the id of "main").

The Skip to Content Button plugin features a settings area where users can define a custom button class, a custom target, and a custom string that is the label for the button.

== Installation ==

To install the Skip to Content Button plugin:

1. Upload `skip-to-content-button.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to the Skip To Content Button page within the Settings menu
1. Assign the correct destination to the Destination ID

== Frequently Asked Questions ==

= How do I find out what my destination URL is? =

The most straight forward way to do this would be to view the page source of the front-end of your website (in most browsers, right click and press view page source) - and then look for the main content area of your site (typically this should be a <main> element) and copy the ID of that tag.

= Can I change this programatically without using the settings page? =

Absolutely! The Skip to Content Button has 3 filters:

* stcb_skip_to_content_button_link - This filters the destination URL in the button
* stcb_skip_to_content_button_css_class - This filters the CSS Class in the button
* stcb_skip_to_content_button_text - This filters the Button Text in the button

= The button isn't displaying in my theme! =

This plugin requires the wp_body_open(); to be present in the theme for the button to load. If this isn't in your theme edit your theme (or child theme) and place wp_body_open(); after the opening <body> tag.
