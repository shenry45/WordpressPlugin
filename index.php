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
            add_menu_page( 'Development Testing Menu Page', 'Test', 'manage_options', 'test-menu', 'test_admin_page', 'dashicons-media-code', '75' );
            add_submenu_page( 'test-menu', 'Main Page', 'Main Menu', 'manage_options', 'test-sub-menu', 'test_admin_page' );
            add_submenu_page( 'test-menu', 'Sub Menu Page', 'Sub Menu', 'manage_options', 'test-sub-sec', 'test_admin_sub_page' );

            remove_submenu_page( 'test-menu', 'test-menu' );
        }

        add_action( 'admin_menu', 'test_admin' );
        add_action( 'admin_init', 'update_test_admin' );
    }

    if ( !function_exists("test_admin_sub_page") ) {
        function test_admin_sub_page() {
            ?>
            <div>
                <h1>Yay Sub Menu Page!</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, quidem non tempora officia, optio ut quaerat expedita, tenetur iure quisquam laudantium aliquam vel accusantium nihil quis facere quibusdam aperiam dicta.</p>
            </div>
            <?php
        }
    }

    if ( !function_exists("test_admin_page") ) {
        function test_admin_page() {
            ?>
            <div class="test_admin container">
                <h1>Sample Admin Menu Page</h1>
                <p class="description">Here we have a display of an admin plugin page created with PHP. The basics of my skills are shown below leveraging actions, filters, and form submission. Please contact me if you like what you see!<br>My email: <a href="mailto:shawn45henry@gmail.com">shawn45henry@gmail.com</a></p>
                <form method="post" action="options.php">
                <?php settings_fields( 'test_admin_settings' ); ?>
                <?php do_settings_sections( 'test_admin_settings' ); ?>
                    <table class="form-table">
                        <h2>Fill out the Form</h2>
                        <tr valign="top">
                            <td>
                                <label for="test_admin_info">Contact Info:</label>
                                <input type="text" name="test_admin_info" size="35" value="<?php echo get_option( 'test_admin_info' ); ?>" />
                                <label for="test_admin_email">Contact Email:</label>
                                <input type="email" name="test_admin_email" size="35" value="<?php echo get_option( 'test_admin_email' ); ?>" />
                                <label for="test_admin_date">Contact Start Date:</label>
                                <input type="date" name="test_admin_date" size="35" value="<?php echo get_option( 'test_admin_date' ); ?>">
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
            register_setting( 'test_admin_settings', 'test_admin_date', array(
                'type' => 'string',
                'description' => 'date logged'
                )
            );
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