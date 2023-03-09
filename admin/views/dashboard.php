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

<div class="wrap swiftxr-column">

    <div class="swiftxr-header">
        <h1 class="wp-heading-inline"><?php esc_html_e( 'SwiftXR Viewer', 'swiftxr-shortcodes' ); ?></h1>

        <div>
            
            <a href="<?php echo admin_url( 'admin.php?page=swiftxr-tutorial' ); ?>" class="button"><?php esc_html_e( 'Guide', 'swiftxr-shortcodes' ); ?></a>

            <a href="<?php echo admin_url( 'admin.php?page=swiftxr-settings' ); ?>" class="button"><?php esc_html_e( 'Settings', 'swiftxr-shortcodes' ); ?></a>

            <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-form' ); ?>" class="button button-primary"><?php esc_html_e( 'Add New Entry', 'swiftxr-shortcodes' ); ?></a>

        </div>
    </div>

    <div class="swiftxr-card main-card" >

        <div>
            <h5><?php esc_html_e( 'App Dashboard' ); ?></h5>

            <p>
                <?php esc_html_e( 'Your SwiftXR plugin app is all set to elevate your content to the next level with 3D/AR and VR!' ); ?>
            </p>

            <p>
                <?php esc_html_e( 'Are you ready to see it in action? Start filling your app with entries to view on your website or in your e-commerce store.' ); ?>
            </p>


            <a href="<?php echo "https://swiftxr.io/hub"; ?>" target="_blank" rel="noopener" class="button"><?php esc_html_e( 'Go to SwiftXR Hub', 'swiftxr-shortcodes' ); ?></a>

            <p>
                <?php esc_html_e( 'Learn more about SwiftXR Viewer on Shopify by checking out this tutorial 📚' ); ?>
            </p>
        </div>

        <div>
            <img src="<?php echo htmlspecialchars('https://swiftxr-static-assets.nyc3.digitaloceanspaces.com/home-trophy.png', ENT_QUOTES); ?>" alt="Welcome Image">
        </div>


    </div>

    <table class="wp-list-table widefat fixed striped">
        <thead class="swiftxr-table">
            <tr>
                <th class="shortcode-id">ID</th>
                <th>Shortcode</th>
                <th>Published Project Link</th>
                <th>Product</th>
                <th>Width</th>
                <th>Height</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $shortcodes as $shortcode ) { ?>
                <tr>
                    <?php $wc_product = $this->get_woocommerce_product_by_id($shortcode['wc_product_id']) ?>

                    <td class="shortcode-id"><?php echo $shortcode['id']; ?></td>
                    <td>[swiftxr id=<?php echo $shortcode['id']; ?>]</td>
                    <td><?php echo $shortcode['url']; ?></td>
                    <td><?php echo $wc_product? $wc_product->get_name():'-' ?></td>
                    <td><?php echo $shortcode['width']; ?></td>
                    <td><?php echo $shortcode['height']; ?></td>

                    <td>
                        <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-form&id=' . $shortcode['id'] ); ?>" class="button"><?php esc_html_e( 'Edit', 'swiftxr-shortcodes' ); ?></a>

                        <!-- <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-form&action=swiftxr-shortcode-delete&redirect=dashboard&id=' . $shortcode['id'] ); ?>" class="button swiftxr-button-danger"><?php esc_html_e( 'Delete', 'swiftxr-shortcodes' ); ?></a> -->
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
