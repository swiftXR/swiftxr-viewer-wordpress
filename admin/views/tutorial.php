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
        <h1 class="wp-heading-inline"><?php esc_html_e( 'Guide', 'swiftxr-shortcodes' ); ?></h1>

        <div>

            <a href="<?php echo admin_url( 'admin.php?page=swiftxr-app-dashboard' ); ?>" class="button"><?php esc_html_e( 'Back', 'swiftxr-shortcodes' ); ?></a>

        </div>
    </div>

    <div class="swiftxr-card">
        <h4><?php esc_html_e( 'Setup Instructions', 'swiftxr-shortcodes' ); ?></h4>

        <p><?php esc_html_e( 'Lets get started by following this guide.', 'swiftxr-shortcodes' ); ?></p>

    </div>

    <div class="swiftxr-card">
        <h4><?php esc_html_e( 'Step 1 - Go to the SwiftXR Hub', 'swiftxr-shortcodes' ); ?></h4>

        <p><?php esc_html_e( 'To publish your 3D Model, visit the SwiftXR Hub in the Viewer Dashboard. SwiftXR accepts multiple file formats such as fbx, obj, stl, gltf, and images. In the SwiftXR Editor design tab, under "Dimension" set the viewer height to (100%) and width to (100%).', 'swiftxr-shortcodes' ); ?></p>

        <p class="swiftxr-text-muted"><?php esc_html_e( 'Important: To make sure that only your 3D model is visible remove any other components on the SwiftXR Canvas.', 'swiftxr-shortcodes' ); ?></p>

        <img src="<?php echo htmlspecialchars('https://swiftxr-static-assets.nyc3.digitaloceanspaces.com/plugin-assets/step-2-min.jpg', ENT_QUOTES); ?>" alt="Welcome Image">

    </div>

    <div class="swiftxr-card">
        <h4><?php esc_html_e( 'Step 2 - Publish your SwiftXR Project' ); ?></h4>

        <p><?php esc_html_e( 'To publish your project, click the "Publish" button located at the top right corner of the SwiftXR Editor and then select "Publish Project".', 'swiftxr-shortcodes' ); ?></p>

        <p class="swiftxr-text-muted"><?php esc_html_e( '(Optional) You can give different names to the sites where you publish your projects.', 'swiftxr-shortcodes' ); ?></p>

        <img src="<?php echo htmlspecialchars('https://swiftxr-static-assets.nyc3.digitaloceanspaces.com/plugin-assets/step-3-min.jpg', ENT_QUOTES); ?>" alt="Welcome Image">

    </div>

    <div class="swiftxr-card">
        <h4><?php esc_html_e( 'Step 3 - Copy the link provided after your project is published on SwiftXR.' ); ?></h4>

        <p><?php esc_html_e( 'After publishing your project, you can view it by opening the URL provided and you can also copy the URL to share it with others.', 'swiftxr-shortcodes' ); ?></p>

        <p class="swiftxr-text-muted"><?php esc_html_e( 'Important: Make sure that your project URL has the "swiftxr.app" domain, otherwise our servers will mark it as invalid.', 'swiftxr-shortcodes' ); ?></p>

        <img src="<?php echo htmlspecialchars('https://swiftxr-static-assets.nyc3.digitaloceanspaces.com/plugin-assets/step-4-min.jpg', ENT_QUOTES); ?>" alt="Welcome Image">

    </div>

    <div class="swiftxr-card">
        <h4><?php esc_html_e( 'Step 4 - Create a 3D Entry on the Admin Dashboard' ); ?></h4>

        <p><?php esc_html_e( 'Paste the link you copied after publishing your project into the "Published Project Link" and specify if you want to link it to the product or directly emded it on your website', 'swiftxr-shortcodes' ); ?></p>

        <p class="swiftxr-text-muted"><?php esc_html_e( 'Note: A SwiftXR Shortcode will be created for every entry, use this code to embded it on your website', 'swiftxr-shortcodes' ); ?></p>

        <img src="<?php echo htmlspecialchars('https://swiftxr-static-assets.nyc3.digitaloceanspaces.com/plugin-assets/wix-step-4.jpg', ENT_QUOTES); ?>" alt="Welcome Image">

    </div>

    <div class="swiftxr-card">
        <h4><?php esc_html_e( 'Step 5 - Specify the Position for the SwiftXR Viewer in your Shop Page (E-Commerce Users Only)' ); ?></h4>

        <p><?php esc_html_e( 'Paste the link you copied after publishing your project into the "Published Project Link" and specify if you want to link it to the product or directly emded it on your website', 'swiftxr-shortcodes' ); ?></p>

        <p>
            <p><?php esc_html_e( 'To set the position and height of the 3D/AR/VR view in your shop product page:' ); ?></p>

            <ol class="tutorial-steps">
                <li><?php esc_html_e( 'Go to the SwiftXR Plugin settings page' ); ?></li>
                <li><?php esc_html_e( 'Adjust the viewer position to your desired position.' ); ?></li>
                <li><?php esc_html_e( 'Adjust the viewer height to your desired dimension.' ); ?></li>
            </ol>

            <p><?php esc_html_e( 'We suggest placing it at the top of the product page for visibility. The viewer will be automatically hidden if there is no corresponding SwiftXR URL for the product.' ); ?></p>
        </p>

        <p class="swiftxr-text-muted"><?php esc_html_e( 'Note: A SwiftXR Shortcode will be created for every entry, use this code to embded it on your website', 'swiftxr-shortcodes' ); ?></p>

        <img src="<?php echo htmlspecialchars('https://swiftxr-static-assets.nyc3.digitaloceanspaces.com/plugin-assets/wix-step-6-min-min.jpg', ENT_QUOTES); ?>" alt="Welcome Image">

    </div>

    <div class="swiftxr-card">
        <h4><?php esc_html_e( 'Congratulations! You have successfully added 3D/AR/VR views to your Shop or Website. Enjoy exploring your products in a whole new way!' ); ?></h4>

        <p><?php esc_html_e( 'SwiftXR automatically switches between different views depending on the product and shows the correct link as specified in the product dashboard.', 'swiftxr-shortcodes' ); ?></p>

        <p class="swiftxr-text-muted"><?php esc_html_e( 'Note: Keep adding your 3D models to your store to make it more interactive.', 'swiftxr-shortcodes' ); ?></p>

        <img src="<?php echo htmlspecialchars('https://swiftxr-static-assets.nyc3.digitaloceanspaces.com/plugin-assets/wix-completed.jpg', ENT_QUOTES); ?>" alt="Welcome Image">

    </div>

    
</div>
