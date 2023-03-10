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

<div class="wrap swiftxr-wrap">

    <div class="swiftxr-header">

        <h1 class="wp-heading-inline"><?php echo $id !== null ? esc_html_e( 'Update 3D Entry', 'swiftxr-shortcodes' ):  esc_html_e( 'Create 3D Entry', 'swiftxr-shortcodes' ); ?></h1>

        <div>
            <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-dashboard' ); ?>" class="button"><?php esc_html_e( 'Back', 'swiftxr-shortcodes' ); ?></a>
        </div>

    </div>    
    
    <?php echo $message; ?>

    <div class="swiftxr-column swiftxr-bigger">

        <div class="swiftxr-admin-form">

            <form method="post">

                <div class="swiftxr-column-odn">

                    <div class="swiftxr-card">
                        <div class="text-wrap">
                            <h5><?php esc_html_e( 'Enter SwiftXR Published Project Link', 'swiftxr-shortcodes' ); ?></h5>

                            <a href="<?php echo "https://swiftxr.io/hub"; ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Generate URL?' ); ?></a>
                        </div>

                        <input type="url" name="swiftxr-url" id="swiftxr-url" class="regular-text" value="<?php echo isset( $url ) ? esc_attr( $url ) : ''; ?>">

                        <p class="swiftxr-text-muted"><?php esc_html_e( 'This is the URL link generated from publishing your project on the SwiftXR Platform', 'swiftxr-shortcodes' ); ?></p>
                    </div>

                    <div class="swiftxr-toggle-parent">
                        <p><?php esc_html_e( 'Website Mode' ); ?></p>
                        <label class="swiftxr-toggle">
                            <input type="checkbox" id="swiftxr-mode-toggle" name="swiftxr-mode" value="1" <?php checked('1', $wc_product? '1': '0'); ?> onchange="RunCheckBoxSelect()">
                            <span class="swiftxr-slider"></span>
                        </label>
                        <p><?php esc_html_e( 'E-Commerce Mode' ); ?></p>
                    </div>

                    <div class="swiftxr-column-odn <?php echo $wc_product ? esc_attr( "swiftxr-hide" ) : ''; ?>" id="website-mode">

                        <div class="swiftxr-card">

                            <h5><?php esc_html_e( 'Viewer Dimension', 'swiftxr-shortcodes' ); ?></h5>

                            <div class="swiftxr-card-dimension">

                                <div>
                                    <h5><?php esc_html_e( 'Width', 'swiftxr-shortcodes' ); ?></h5>

                                    <div class="swiftxr-custom-number-input">
                                        <input type="number" name="swiftxr-width" id="swiftxr-width" class="regular-text" value="<?php echo isset( $width ) ? esc_attr( str_replace(array('%', 'px'), '', $width) ) : ''; ?>">

                                        <select name="swiftxr-w-unit">
                                            <option value="px" <?php echo isset($width_unit) && $width_unit === 'px'? 'selected': '' ?>><?php esc_html_e( 'px', 'swiftxr-shortcodes' ); ?></option>

                                            <option value="%" <?php echo isset($width_unit) && $width_unit === '%'? 'selected': '' ?>><?php esc_html_e( '%', 'swiftxr-shortcodes' ); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <h5><?php esc_html_e( 'Height', 'swiftxr-shortcodes' ); ?></h5>

                                    <div class="swiftxr-custom-number-input">
                                        <input type="number" name="swiftxr-height" id="swiftxr-height" class="regular-text" value="<?php echo isset( $height ) ? esc_attr( str_replace(array('%', 'px'), '', $height) ) : ''; ?>">

                                        <select name="swiftxr-h-unit">
                                            <option value="px" <?php echo isset($height_unit) && $height_unit === 'px'? 'selected': '' ?>><?php esc_html_e( 'px', 'swiftxr-shortcodes' ); ?></option>

                                            <option value="%" <?php echo isset($height_unit) && $height_unit === '%'? 'selected': '' ?>><?php esc_html_e( '%', 'swiftxr-shortcodes' ); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="swiftxr-column-odn <?php echo !$wc_product ? esc_attr( "swiftxr-hide" ) : ''; ?>" id="ecommerce-mode">

                        <div class="swiftxr-card">

                            <div class="text-wrap">
                                <h5><?php esc_html_e( 'WooCommerce Product', 'swiftxr-shortcodes' ); ?></h5>

                                <?php if(isset($wc_product)) {?>

                                    <button class="button-link" onclick="OpenProductPicker(event)"><?php esc_html_e( 'Change Product' ); ?></button>

                                <?php }else{ ?>

                                    <button class="button-link" onclick="OpenProductPicker(event)"><?php esc_html_e( 'Select Product' ); ?></button>

                                <?php } ?>   
                                
                            </div>

                            <input type="text" name="swiftxr-woocommerce-product-id" value="<?php echo isset( $wc_product ) ? esc_attr( $wc_id ) : ''; ?>" class="swiftxr-hide">

                            <div class="swiftxr-product-item" id="swiftxr-wc-selected-product">

                                <?php if($wc_product) {?>

                                    <img src="<?php echo esc_attr( wp_get_attachment_image_src( $wc_product->get_image_id(), 'thumbnail' )[0] ); ?>" alt="<?php echo esc_attr( $wc_product->get_name() ); ?>">

                                    <p><?php echo esc_html( $wc_product->get_name() ); ?></p>

                                <?php }else{ ?>

                                    <button class="button button-secondary" onclick="OpenProductPicker(event)"><?php echo esc_html( "Select Product" ); ?></button>

                                <?php } ?>

                            </div>

                            <?php if($woo_commerce_products) {?>

                                <p class="swiftxr-text-muted"><?php esc_html_e( 'The SwiftXR project above will be linked to this WooCommerce product', 'swiftxr-shortcodes' ); ?></p>

                            <?php }else{ ?>
                                <p class="swiftxr-text-muted"><?php esc_html_e( 'It appears that you currently do not have any published products or have not installed WooCommerce. To continue, please either install WooCommerce or add a product' ); ?></p>
                            <?php } ?>

                        </div>

                    </div>
                    
                </div>

                <?php wp_nonce_field( 'swiftxr-shortcode-form', 'swiftxr-shortcode-form-nonce' ); ?>

                <div class="swiftxr-form-action">
                    
                    <?php if ($id) { ?>

                        <p class="submit">
                            <a 
                                href="<?php echo admin_url('admin.php?page=swiftxr-app-form&action=swiftxr-shortcode-delete&redirect=dashboard&id=' . $id); ?>" 

                                class="button button-secondary swiftxr-button-danger" 

                                onclick="return confirm('<?php esc_attr_e('Are you sure you want to delete this Entry?', 'swiftxr-shortcodes'); ?>')">
                                
                                <?php esc_html_e('Delete', 'swiftxr-shortcodes'); ?>
                            </a>
                        </p>
                    <?php } ?>

                    <?php submit_button( esc_html__( $id? 'Update Entry': 'Add Entry', 'swiftxr-shortcodes' ), 'primary', 'swiftxr-shortcode-submit' ) ?>
                </div>

            </form>

            <div class="swiftxr-modal swiftxr-hide" id="productModal">
                <div class="modal-content">

                    <div class="modal-header">

                        <h1 class="modal-title fs-5" id="productModalLabel"><?php echo esc_html( "Add WooCommerce Product" ); ?></h1>

                        <button class="swiftxr-modal-close" type="button" onclick="CloseProductPicker()"><?php echo esc_html( "X" ); ?></button>
                    </div>

                    <div class="modal-body">
                        <div class="input-group">

                            <span><?php echo esc_html( "@" ); ?></span>

                            <input type="text" placeholder="Search products" aria-label="Search products" oninput="SearchProducts()" id="swiftxr-search-products">

                            <button class="button button-primary" type="button" onclick="SearchProducts()"><?php echo esc_html( "Search" ); ?></button>
                        </div>

                        <div class="modal-body-content" id="swiftxr-product-modal">
                            <?php foreach ( $woo_commerce_products as $woo ) { ?>
                                <div data-product-id="<?php echo esc_attr( $woo->get_id() ); ?>">
                                
                                    <label class="swiftxr-product-item">

                                        <input type="radio" id="wc-product-id" name="swiftxr-product" value="<?php echo esc_attr( $woo->get_id() ); ?>" oninput="SelectProduct(this)">

                                        <img src="<?php echo esc_attr( wp_get_attachment_image_src( $woo->get_image_id(), 'thumbnail' )[0] ); ?>" alt="<?php echo esc_attr( $woo->get_name() ); ?>">

                                        <p><?php echo esc_html( $woo->get_name() ); ?></p>

                                    </label>
                                </div>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button class="button button-secondary" id="product-picker-picker" onclick="CloseProductPicker()"><?php echo esc_html( "Close" ); ?></button>

                        <button class="button button-primary" id="product-picker-select" disabled onclick="AddSelectedProduct()"><?php echo esc_html( "Add" ); ?></button>
                    </div>
                    
                </div>
            </div>



            <div class="swiftxr-card">
                <h5 for="swiftxr-iframe"><?php esc_html_e( '3D Object Preview', 'swiftxr-shortcodes' ); ?></h5>

                <iframe name="swiftxr-iframe" id="swiftxr-iframe" class="swiftxr-iframe" width="100%" height="500px" src="<?php echo isset( $url ) ? esc_url( $url ) : ''; ?>"></iframe>
            </div>

        </div>

        
    </div>

    
</div>

