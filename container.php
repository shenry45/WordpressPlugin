<?php 

    // HTML Container for admin UI
    if( !function_exists("test_admin_container")) {
        function test_admin_container($content) {
            ?>
                <div class="test_admin container">
                    <?php $content(); ?>
                </div>
            <?php            
        }
    }

    /*
    ----------
    Admin Pages that use HTML Container
    ----------
    */
    if( !function_exists("test_admin_main_menu_container")) {
        function test_admin_main_menu_container() {
            test_admin_container('test_admin_main_page');
        }
    }

    if( !function_exists("test_admin_sub_page_container")) {
        function test_admin_sub_page_container() {
            test_admin_container('test_admin_sub_page');
        }
    }


?>