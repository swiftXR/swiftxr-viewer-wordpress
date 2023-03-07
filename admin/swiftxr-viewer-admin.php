<?php

class SwiftXRViewerAdmin {

    private $db;

    function __construct($database){

        $this->db = $database;

        add_action( 'admin_enqueue_scripts', array($this, 'enqueue_admin_script') );

    }

    function enqueue_admin_script() {
        wp_enqueue_script( 'swiftxr-admin-js', plugin_dir_url( __FILE__ ) . '/js/swiftxr-viewer-admin.js' );

        wp_enqueue_style( 'swiftxr-admin-css', plugin_dir_url( __FILE__ ) . '/css/swiftxr-viewer-admin.css' );

        wp_localize_script( 'swiftxr-admin-js', 'my_script_vars', array(
            'admin_url' => esc_url( admin_url( 'admin.php?page=swiftxr-app-dashboard' ) ),
        ) );
    }

    public function render_dashboard() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $shortcodes = $this->db->get_all_shortcode_entries();

        include( plugin_dir_path( __FILE__ ) . 'views/dashboard.php' );

    }

    public function render_tutorial() {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        include( plugin_dir_path( __FILE__ ) . 'views/tutorial.php' );

    }

    public function render_form() {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $message = '';
        $shortcode = null;
        $id = null;

        $query_id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : null;

        if($query_id){
            $shortcode = $this->db->get_shortcode_entry_by_id($query_id);

            if($shortcode['id']){
                $id = $shortcode['id'];
            }
        }

        $width = '200px';
        $height = '200px';

        // Check if form submitted
        if ( isset( $_POST['swiftxr-shortcode-submit'] ) ) {

            $url = sanitize_text_field( $_POST['swiftxr-url'] );
            $width = sanitize_text_field( $_POST['swiftxr-width'] );
            $height = sanitize_text_field( $_POST['swiftxr-height'] );
            $width_unit = sanitize_text_field( $_POST['swiftxr-w-unit'] );
            $height_unit = sanitize_text_field( $_POST['swiftxr-h-unit'] );

            if ( empty( $url ) ) {
                $message = '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Please enter a URL.', 'swiftxr-shortcodes' ) . '</p></div>';
            } 
            else {

                if ( $id ) {
                    // Update existing shortcode

                    $update_state = $this->db->add_update_shortcode_entry($id, $url, $width . $width_unit, $height . $height_unit);

                    if(! $update_state){
                        $message = '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Could not update shortcode, try again.', 'swiftxr-shortcodes' ) . '</p></div>';
                    }
                    else{
                        $message = '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Shortcode updated.', 'swiftxr-shortcodes' ) . '</p></div>';

                    }
                } 
                else {
                    // Add new shortcode

                    $add_state = $this->db->add_update_shortcode_entry(null, $url, $width . $width_unit, $height . $height_unit);

                    if(!$add_state){
                        $message = '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Could not create shortcode, try again.', 'swiftxr-shortcodes' ) . '</p></div>';
                    }
                    else{
                        $message = '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Shortcode added.', 'swiftxr-shortcodes' ) . '</p></div>';

                        $id = $add_state;
                    }
                    
                }
            }

        }
        elseif ( isset($_GET['action']) && $_GET['action'] == 'swiftxr-shortcode-delete' ) {

            //Delete Shortcode

            if ( $id ) {

                $del_state = $this->db->delete_shortcode_entry($id);


                if(! $del_state){
                    $message = '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Could not delete shortcode, try again.', 'swiftxr-shortcodes' ) . '</p></div>';
                }
                else{
                    $message = '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Shortcode Deleted.', 'swiftxr-shortcodes' ) . '</p></div>';

                }

            }
        }
        else{

            // If we're updating a shortcode, populate the form with its current values

            if ( $id !== null ) {

                $url = $shortcode['url'];
                $width = $shortcode['width'];
                $height = $shortcode['height'];

                $width_unit = $this->get_dimension_unit($width);

                $height_unit = $this->get_dimension_unit($height);

            }

        }

        include( plugin_dir_path( __FILE__ ) . 'views/form.php' );

    }

    function get_dimension_unit($string){

        if(strpos($string, 'px') !== false){
            return 'px';
        }

        return '%';
        
    }

    public function get_shortcode_index_by_id( $shortcodes, $shortcode_id ) {
        foreach ( $shortcodes as $index => $shortcode ) {
            if ( $shortcode['id'] == $shortcode_id ) {
                return $index;
            }
        }
        return false; // Shortcode not found
    }
}
