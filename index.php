<?php
    /*
    Plugin Name: Wordpress Development Plugin
    Description: A development plugin to test functionality and implimentation
    Version: 0.1
    Author: Shawn Henry
    License: GPL2
    */

    add_action( 'admin_menu', 'test_admin');
    function test_admin() {
        $page_title = 'Development Testing Menu Page';
        $menu_title = 'Test Menu';
        $capabile = 'manage_options';
        $menu_slug = 'test-menu';
        $function = 'text_menu_page';
        $icon_url = 'dashicons-media-code';
        $position = 75;

        add_menu_page( $page_title, $menu_title, $capabile, $menu_slug, $function, $icon_url, $position);
    }
?>