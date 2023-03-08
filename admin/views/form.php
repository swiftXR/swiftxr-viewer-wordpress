<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<div class="wrap">

    <h1 class="wp-heading-inline"><?php echo $id !== null ? esc_html_e( 'Update 3D Entry', 'swiftxr-shortcodes' ):  esc_html_e( 'Create 3D Entry', 'swiftxr-shortcodes' ); ?></h1>

    <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-dashboard' ); ?>" class="page-title-action">Back</a>

    <?php echo $message; ?>

    <div class="swiftxr-admin-form">
        <form method="post">

            <div class="swiftxr-column">

                <div class="swiftxr-card">
                    <div class="text-wrap">
                        <h5><?php esc_html_e( 'Enter SwiftXR Published Project Link', 'swiftxr-shortcodes' ); ?></h5>

                        <a href="<?php echo "https://swiftxr.io/hub"; ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Generate URL?' ); ?></a>
                    </div>

                    <input type="url" name="swiftxr-url" id="swiftxr-url" class="regular-text" value="<?php echo isset( $url ) ? esc_attr( $url ) : ''; ?>">

                    <p class="swiftxr-text-muted"><?php esc_html_e( 'This is the URL link generated from publishing your project on the SwiftXR Platform', 'swiftxr-shortcodes' ); ?></p>
                </div>

                <div class="swiftxr-card">

                    <h5><?php esc_html_e( 'Canvas Dimension', 'swiftxr-shortcodes' ); ?></h5>

                    <div class="swiftxr-card-dimension">

                        <div>
                            <h5><?php esc_html_e( 'Width', 'swiftxr-shortcodes' ); ?></h5>

                            <div class="swiftxr-custom-number-input">
                                <input type="number" name="swiftxr-width" id="swiftxr-width" class="regular-text" value="<?php echo isset( $width ) ? esc_attr( str_replace(array('%', 'px'), '', $width) ) : ''; ?>">

                                <select name="swiftxr-w-unit">
                                    <option value="px" <?php echo isset($width_unit) === 'px'? 'selected': '' ?>><?php esc_html_e( 'px', 'swiftxr-shortcodes' ); ?></option>
                                    <option value="%" <?php echo isset($width_unit) === '%'? 'selected': '' ?>><?php esc_html_e( '%', 'swiftxr-shortcodes' ); ?></option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <h5><?php esc_html_e( 'Height', 'swiftxr-shortcodes' ); ?></h5>

                            <div class="swiftxr-custom-number-input">
                                <input type="number" name="swiftxr-height" id="swiftxr-height" class="regular-text" value="<?php echo isset( $height ) ? esc_attr( str_replace(array('%', 'px'), '', $height) ) : ''; ?>">

                                <select name="swiftxr-h-unit">
                                    <option value="px" <?php echo isset($height_unit) === 'px'? 'selected': '' ?>><?php esc_html_e( 'px', 'swiftxr-shortcodes' ); ?></option>
                                    <option value="%" <?php echo isset($height_unit) === '%'? 'selected': '' ?>><?php esc_html_e( '%', 'swiftxr-shortcodes' ); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <?php if($woo_commerce_products) {?>

                    <div class="swiftxr-card">
                        <h5><?php esc_html_e( 'WooCommerce Product (Optional)', 'swiftxr-shortcodes' ); ?></h5>

                        <select name="swiftxr-woocommerce-product-id">

                            <option value=""><?php esc_html_e( "None", 'swiftxr-shortcodes' ); ?></option>
                        
                            <?php foreach ( $woo_commerce_products as $woo ) { ?>

                                <option value="<?php echo esc_attr( $woo->get_id() ); ?>" <?php echo isset($wc_id) && $wc_id == $woo->get_id()? 'selected': '' ?>><?php esc_html_e( $woo->get_name(), 'swiftxr-shortcodes' ); ?></option>

                            <?php } ?>
                        </select>

                        <p class="swiftxr-text-muted"><?php esc_html_e( 'The SwiftXR project above will be linked to this WooCommerce product', 'swiftxr-shortcodes' ); ?></p>

                    </div>

                <?php } ?>
                
            </div>

            <?php wp_nonce_field( 'swiftxr-shortcode-form', 'swiftxr-shortcode-form-nonce' ); ?>

            <div class="swiftxr-form-action">
                <?php submit_button( esc_html__( $id? 'Update Shortcode': 'Add Entry', 'swiftxr-shortcodes' ), 'primary', 'swiftxr-shortcode-submit' ) ?>

                <?php if ($id) { ?>

                    <p class="submit">
                        <a 
                            href="<?php echo admin_url('admin.php?page=swiftxr-app-form&action=swiftxr-shortcode-delete&redirect=dashboard&id=' . $id); ?>" 

                            class="button button-secondary swiftxr-button-danger" 

                            onclick="return confirm('<?php esc_attr_e('Are you sure you want to delete this shortcode?', 'swiftxr-shortcodes'); ?>')">
                            
                            <?php esc_html_e('Delete', 'swiftxr-shortcodes'); ?>
                        </a>
                    </p>
                <?php } ?>
            </div>

        </form>

        <div class="swiftxr-card">
            <h5 for="swiftxr-iframe"><?php esc_html_e( '3D Object Preview', 'swiftxr-shortcodes' ); ?></h5>

            <iframe name="swiftxr-iframe" id="swiftxr-iframe" class="swiftxr-iframe" width="100%" height="500px" src="<?php echo isset( $url ) ? esc_url( $url ) : ''; ?>"></iframe>
        </div>
    </div>

    
</div>

