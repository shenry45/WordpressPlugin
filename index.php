<?php
    /*
    Plugin Name: Wordpress Development Plugin
    Description: A development plugin to test functionality and implimentation
    Version: 0.1
    Author: Shawn Henry
    License: GPL2
    */

    if ( !function_exists("test_admin") ) {
        function test_admin() {
            $page_title = 'Development Testing Menu Page';
            $menu_title = 'Test Menu';
            $capabile = 'manage_options';
            $menu_slug = 'test-menu';
            $function = 'test_admin_page';
            $icon_url = 'dashicons-media-code';
            $position = 75;
            
            add_menu_page( $page_title, $menu_title, $capabile, $menu_slug, $function, $icon_url, $position);
        }

        add_action( 'admin_menu', 'test_admin');
    }

    if ( !function_exists("test_admin_page") ) {
        function test_admin_page() {
            ?>

            <h1>Development Testing Menu Page</h1>
            <form method="post" action="options.php">
            <?php settings_fields( 'test_admin_settings' ); ?>
            <?php do_settings_sections( 'test_admin_settings' ); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Sample Field:</th>
                        <td>
                            <input type="text" name="test_admin_info" value="<?php echo get_option( 'test_admin_info' ); ?>" />
                        </td>
                    </tr>
                </table>
            <?php submit_button(); ?>
            </form>
            <?php
        }
    }

?>