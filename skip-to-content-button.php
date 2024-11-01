<?php
/*
  Plugin Name: Skip To Content Button
  Description: A plugin that adds a skip to content button for accessibility and assistive technology
  Version: 1.0
  Author: Twenty Eighty Online
  Author URI: https://twenty-eighty.co.uk
  License: GPL2
  Text Domain: stcb
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

add_action( 'plugins_loaded', 'stcb_plugin_init' );

function stcb_plugin_init() {
  add_action( 'wp_body_open', 'stcb_skip_to_content_button' );

  add_action( 'admin_menu', 'stcb_add_settings_page' );
  add_action( 'admin_init', 'stcb_register_settings' );
}

function stcb_skip_to_content_button() {
  $button_attributes = get_option('stcb_button_attributes');
  $link = $button_attributes['link'] ? $button_attributes['link'] : '#main';
  $class = $button_attributes['css_class'] ? $button_attributes['css_class'] : 'screen-reader-text';
  $text = $button_attributes['text'] ? $button_attributes['text'] : __('Skip to Content', 'stcb');

  echo '<a href="#' . apply_filters( 'stcb_skip_to_content_button_link', $link ) . '" class="' . apply_filters( 'stcb_skip_to_content_button_css_class', $class ) . '">' . apply_filters( 'stcb_skip_to_content_button_text', $text ) . '</a>';
}

function stcb_add_settings_page() {
  add_options_page( __('Skip to Content Button Settings', 'stcb'), __('Skip to Content Button', 'stcb'), 'manage_options', 'skip-to-content-button', 'stcb_render_plugin_settings_page' );
}

function stcb_register_settings() {
  register_setting( 'stcb_button_attributes', 'stcb_button_attributes', 'stcb_button_attributes_validate' );
  add_settings_section( 'button-attributes', __( 'Button Attributes', 'stcb'),  'stcb_attribute_section', 'skip_to_content_button' );

  add_settings_field( 'stcb_button_link', __( 'Main Content ID', 'stcb'), 'stcb_button_link', 'skip_to_content_button', 'button-attributes' );
  add_settings_field( 'stcb_button_css_class', __( 'Button CSS Class', 'stcb'), 'stcb_button_css_class', 'skip_to_content_button', 'button-attributes' );
  add_settings_field( 'stcb_button_text', __( 'Button Text', 'stcb'), 'stcb_button_text', 'skip_to_content_button', 'button-attributes' );
}


function stcb_attribute_section() {
  echo '<p>' . __('Here you can set all the options for the Skip to Content Button', 'stcb') . '</p>';
}

function stcb_button_link() {
  $options = get_option( 'stcb_button_attributes' );
  echo '<input id="stcb_button_attributes_link" name="stcb_button_attributes[link]" type="text" value="' . esc_attr( $options['link'] ) . '" />';
}

function stcb_button_css_class() {
  $options = get_option( 'stcb_button_attributes' );
  echo '<input id="stcb_button_attributes_css_class" name="stcb_button_attributes[css_class]" type="text" value="' . esc_attr( $options['css_class'] ) . '" />';
}

function stcb_button_text() {
  $options = get_option( 'stcb_button_attributes' );
  echo '<input id="stcb_button_attributes_text" name="stcb_button_attributes[text]" type="text" value="' . esc_attr( $options['text'] ) . '" />';
}

function stcb_render_plugin_settings_page() { ?>
  <h2><?php _e('Skip to Content Button Settngs', 'stcb' ) ?></h2>
  <form action="options.php" method="post">
    <?php settings_fields( 'stcb_button_attributes' );
    do_settings_sections( 'skip_to_content_button' ); ?>
    <input name="submit" class="button button-primary" type="submit" value="<?php esc_attr_e( 'Save', 'stcb' ); ?>" />
  </form>
<?php }
