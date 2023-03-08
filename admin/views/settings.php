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

    <h1 class="wp-heading-inline"><?php esc_html_e( 'Settings', 'swiftxr-shortcodes' ); ?></h1>

    <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-dashboard' ); ?>" class="page-title-action"><?php esc_html_e( 'Back', 'swiftxr-shortcodes' ); ?></a>

    <?php echo $message; ?>

    <div class="swiftxr-admin-form">

        <form action="">

            <div class="swiftxr-column">

                <h5><?php esc_html_e( 'E-Commerce  Viewer Settings', 'swiftxr-shortcodes' ); ?></h5>

                <div class="swiftxr-card">
                    <h5><?php esc_html_e( 'Product Viewer Position', 'swiftxr-shortcodes' ); ?></h5>

                    <select name="swiftxr-w-unit">
                        <option value="woocommerce_before_add_to_cart_button" <?php echo isset($wc_placement) === 'px'? 'selected': '' ?>><?php esc_html_e( 'After Product Description', 'swiftxr-shortcodes' ); ?></option>

                        <option value="woocommerce_before_single_product_summary" <?php echo isset($wc_placement) === '%'? 'selected': '' ?>><?php esc_html_e( 'Top of Product', 'swiftxr-shortcodes' ); ?></option>

                        <option value="woocommerce_product_thumbnails" <?php echo isset($wc_placement) === '%'? 'selected': '' ?>><?php esc_html_e( 'In Product Gallery', 'swiftxr-shortcodes' ); ?></option>

                        <option value="woocommerce_before_single_product" <?php echo isset($wc_placement) === '%'? 'selected': '' ?>><?php esc_html_e( 'With Product Summary', 'swiftxr-shortcodes' ); ?></option>

                        <option value="woocommerce_after_single_product_summary" <?php echo isset($wc_placement) === '%'? 'selected': '' ?>><?php esc_html_e( 'After Product Summary', 'swiftxr-shortcodes' ); ?></option>
                        
                    </select>

                </div>

                <div class="swiftxr-card">
                    <h5><?php esc_html_e( 'Product Viewer Height', 'swiftxr-shortcodes' ); ?></h5>

                    <div class="swiftxr-custom-number-input">
                        <input type="number" name="swiftxr-height" id="swiftxr-height" class="regular-text" value="<?php echo isset( $height ) ? esc_attr( str_replace(array('%', 'px'), '', $height) ) : ''; ?>">

                        <select name="swiftxr-h-unit">
                            <option value="px" <?php echo isset($height_unit) === 'px'? 'selected': '' ?>><?php esc_html_e( 'px', 'swiftxr-shortcodes' ); ?></option>
                            <!-- <option value="%" <?php echo isset($height_unit) === '%'? 'selected': '' ?>><?php esc_html_e( '%', 'swiftxr-shortcodes' ); ?></option> -->
                        </select>
                    </div>
                </div>

                <div class="swiftxr-form-action">
                    <?php submit_button( esc_html__('Save', 'swiftxr-shortcodes' ), 'primary', 'swiftxr-settings-submit' ) ?>

                </div>

            </div>
            
        </form>
    </div>

</div>
