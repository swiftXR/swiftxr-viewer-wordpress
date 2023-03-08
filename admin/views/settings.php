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

    
</div>
