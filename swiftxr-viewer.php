<?php

// Kill Unauthorized Access
if ( !defined( 'ABSPATH' ) ) {
  die;
}


/**
* Plugin Name: swiftxr-viewer
* Plugin URI: https://home.swiftxr.io/
* Description: Publish 3D and 2D contents to Web3D and XR.
* Version: 0.1
* Author: SwiftXR
* Author URI: https://home.swiftxr.io/
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
**/

/*
swiftxr-viewer is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

swiftxr-viewer is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with swiftxr-viewer. If not, see  https://www.gnu.org/licenses/gpl-2.0.html.
*/

class SwiftXRViewerPlugin{

  private $admin;
  private $database;

  function __construct(){

    // Load the admin class
    require_once plugin_dir_path( __FILE__ ) . 'admin/swiftxr-viewer-admin.php';

    require_once plugin_dir_path( __FILE__ ) . 'swiftxr-db.php';

    $db_name = 'swiftxr_shortcodes';

    $this->database = new SwiftXRDatabase($db_name);

    $this->admin = new SwiftXRViewerAdmin($this->database);
    
    // Register the admin menu.
    add_action( 'admin_menu', array($this,'add_admin_menu') );

    // Register the shortcode.
    add_shortcode("swiftxr", array($this,'swiftxr_shortcode'));

  }

  function activate(){
    flush_rewrite_rules();
  }

  function deactivate(){
    flush_rewrite_rules();
  }

  function add_admin_menu() {

		add_menu_page(
      'SwiftXR Viewer',
      'SwiftXR Viewer',
      'manage_options',
      'swiftxr-app-dashboard',
      array( $this->admin, 'render_dashboard' ),
      'dashicons-image-filter',
      20
    );

    add_submenu_page(
      'swiftxr-app-dashboard',
      'My Published Links',
      'My Published Links',
      'manage_options',
      'swiftxr-app-dashboard',
      array( $this->admin, 'render_dashboard' )
    );

    add_submenu_page(
      'swiftxr-app-dashboard',
      'SwiftXR App Form',
      'Add New',
      'manage_options',
      'swiftxr-app-form',
      array( $this->admin, 'render_form' )
    );

    add_submenu_page(
      'swiftxr-app-dashboard',
      'SwiftXR Documentation',
      'Guide',
      'manage_options',
      'swiftxr-tutorial',
      array( $this->admin, 'render_tutorial' )
    );
	}
  
  function swiftxr_shortcode( $atts ) {

    // Get the saved SwiftXR shortcodes
    $swiftxr_shortcodes = get_option( 'swiftxr_shortcodes', array() );
    if ( ! $swiftxr_shortcodes ) {
      return '';
    }

    // Get the shortcode attributes
    $atts = shortcode_atts( array(
      'id' => '',
    ), $atts );

    $shortcode_data = $this->database->get_shortcode_entry_by_id($atts['id']);

    if ( ! isset($shortcode_data['id']) ) {
      return '';
    }

    // Extract the URL and dimensions from the SwiftXR data
    $swiftxr_url = isset( $shortcode_data['url'] ) ? $shortcode_data['url'] : '';
    $swiftxr_width = isset( $shortcode_data['width'] ) ? $shortcode_data['width'] : '250px';
    $swiftxr_height = isset( $shortcode_data['height'] ) ? $shortcode_data['height'] : '250px';

    return '
      <iframe title="SwiftXR Embed ' . esc_attr( $atts['id'] ) . '" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="fullscreen; autoplay; vr camera; midi; encrypted-media" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share width="' . esc_attr( $swiftxr_width ) . '" height="' . esc_attr( $swiftxr_height ) . '" src="' . esc_url( $swiftxr_url ) . '"></iframe>
    ';
  }

}

if (class_exists('SwiftXRViewerPlugin')) {
  $swiftxrViewerPlugin = new SwiftXRViewerPlugin();
}

//Activate
register_activation_hook( __FILE__, array($swiftxrViewerPlugin,'activate') );

//Deactivate
register_deactivation_hook( __FILE__, array($swiftxrViewerPlugin,'deactivate') );




