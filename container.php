<?php 

    if( !function_exists("test_admin_container_callback")) {
        function test_admin_container_callback() {
            test_admin_container('test_admin_sub_page');
        }
    }

    if( !function_exists("test_admin_container")) {
        function test_admin_container($content) {
            ?>
                <div class="test_admin container">
                    <?php $content(); ?>
                </div>
            <?php            
        }
    }

?>