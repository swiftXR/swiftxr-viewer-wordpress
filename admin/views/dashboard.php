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

    <h1 class="wp-heading-inline"><?php esc_html_e( 'SwiftXR App Dashboard', 'swiftxr-shortcodes' ); ?></h1>

    <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-form' ); ?>" class="page-title-action"><?php esc_html_e( 'Add New', 'swiftxr-shortcodes' ); ?></a>

    <a href="<?php echo "https://swiftxr.io/hub"; ?>" target="_blank" rel="noopener" class="page-title-action"><?php esc_html_e( 'Go to SwiftXR Hub', 'swiftxr-shortcodes' ); ?></a>

    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th>ID</th>
                <td>Shortcode</td>
                <th>Published Project Link</th>
                <th>Width</th>
                <th>Height</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $shortcodes as $shortcode ) { ?>
                <tr>
                    <td><?php echo $shortcode['id']; ?></td>
                    <td>[swiftxr id=<?php echo $shortcode['id']; ?>]</td>
                    <td><?php echo $shortcode['url']; ?></td>
                    <td><?php echo $shortcode['width']; ?></td>
                    <td><?php echo $shortcode['height']; ?></td>

                    <td>
                        <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-form&id=' . $shortcode['id'] ); ?>" class="button"><?php esc_html_e( 'Edit', 'swiftxr-shortcodes' ); ?></a>

                        <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-form&action=swiftxr-shortcode-delete&redirect=dashboard&id=' . $shortcode['id'] ); ?>" class="button"><?php esc_html_e( 'Delete', 'swiftxr-shortcodes' ); ?></a>
                    </td>

                    <!-- <td><a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-form&id=' . $shortcode['id'] ); ?>">Edit</a></td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
