<?php
    /*
    Plugin Name: Wordpress Development Plugin
    Description: A development plugin to test functionality and implimentation
    Version: 0.1
    Author: Shawn Henry
    License: GPL2
    */

    include( 'container.php' );
    include( 'form.php' );

    /* INFO ADMIN NOTICE */
    function test_admin_notice() {
        ?>
        <div class="notice notice-info">
            <p><?php _e( 'Keep up the good work coding! I believe in you.', 'sample-text-domain' ); ?></p>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'test_admin_notice' );
    
    /* ADMIN MENU */
    if ( !function_exists("test_admin") ) {
        function test_admin() {
            add_menu_page( 'Development Testing Menu Page', 'Test', 'manage_options', 'test-menu', 'test_admin_page', 'dashicons-media-code', '75' );

            $subpages = array(
                array(
                    'name' => 'Main Page',
                    'title' => 'Main Menu',
                    'alias' => 'test-sub-menu',
                ),
                array(
                    'name' => 'Sub Menu Page',
                    'title' => 'Sub Menu',
                    'alias' => 'test-sub-sec'
                )
            );

            foreach ($subpages as $page) {
                add_submenu_page('test-menu', $page['name'], $page['title'], 'manage_options', $page['alias'], 'test_admin_container_callback');
            }

            // add_submenu_page( 'test-menu', 'Main Page', 'Main Menu', 'manage_options', 'test-sub-menu', 'test_admin_page' );
            // add_submenu_page( 'test-menu', 'Sub Menu Page', 'Sub Menu', 'manage_options', 'test-sub-sec', 'test_admin_container_callback' );

            remove_submenu_page( 'test-menu', 'test-menu' );
        }

        add_action( 'admin_menu', 'test_admin' );
        add_action( 'admin_init', 'update_test_admin' );
    }

    /* ALLOW SUBMITTED CONTENT ON FRONT END */
    if ( !function_exists( "test_admin_info" ) ) {
        function test_admin_info($content) {
            $button = array(
                'link' => get_option( 'admin_button_link' ),
                'target' => get_option( 'admin_button_target' )
            );
            $button_html = "<a href='$button[link]' target='$button[target]'><button>Click Me</button></a>";
            $test_admin = get_option( 'test_admin_info' ) . get_option( 'test_admin_date ');
            return $button_html . $test_admin . $content;
        }
        add_filter( 'the_content', 'test_admin_info' );
    }

    /* CSS INIT */
    if ( !function_exists( "load_admin_style" ) ) {
        function load_admin_style() {
            wp_register_style( 'test-admin', plugins_url( 'wordpress-plugin/assets/css/style.css' ) );
            wp_enqueue_style( 'test-admin' );
        }

        add_action( 'admin_enqueue_scripts', 'load_admin_style' );
    }

?>