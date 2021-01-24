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
        add_action( 'admin_init', 'update_test_admin' );
    }

    if ( !function_exists("test_admin_page") ) {
        function test_admin_page() {
            ?>
            <div class="test_admin container">
                <h1>Development Testing Menu Page</h1>
                <p>Nulla purus enim, luctus eu quam ut, feugiat malesuada ipsum. Nunc pellentesque commodo urna, a eleifend lacus lacinia sed. Fusce faucibus odio ut libero ultricies efficitur. Sed finibus dolor aliquam, tristique enim fringilla, ultricies lectus. Aenean mi risus, maximus vel imperdiet ut, faucibus eu ligula.</p>
                <form method="post" action="options.php">
                <?php settings_fields( 'test_admin_settings' ); ?>
                <?php do_settings_sections( 'test_admin_settings' ); ?>
                    <table class="form-table">
                        <tr valign="top">
                            <td>
                                <label for="test_admin_info">Test Admin Info:</th>
                                <input type="text" name="test_admin_info" value="<?php echo get_option( 'test_admin_info' ); ?>" />
                                <label for="test_admin_email">Test Admin Email:</th>
                                <input type="email" name="test_admin_email" value="<?php echo get_option( 'test_admin_email' ); ?>" />
                            </td>
                        </tr>
                    </table>
                <?php submit_button(); ?>
                </form>
            </div>
            <?php
        }
    }

    if ( !function_exists( "update_test_admin" ) ) {
        function update_test_admin() {
            register_setting( 'test_admin_settings', 'test_admin_info' );
            register_setting( 'test_admin_settings', 'test_admin_email' );
        }
    }

    if ( !function_exists( "test_admin_info" ) ) {
        function test_admin_info($content) {
            $test_admin = get_option( 'test_admin_info' );
            return $content . $test_admin;
        }
        add_filter( 'the_content', 'test_admin_info' );
    }

    // Load in Admin CSS from plugin
    if ( !function_exists( "load_admin_style" ) ) {
        function load_admin_style() {
            wp_register_style( 'test-admin', plugins_url('wordpress-plugin/admin.css') );
            wp_enqueue_style( 'test-admin' );
        }
        add_action( 'admin_enqueue_scripts', 'load_admin_style' );
    }
?>