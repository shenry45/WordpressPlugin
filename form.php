<?php
    
    /* ADMIN PAGES */
    if ( !function_exists("test_admin_sub_page") ) {
        function test_admin_sub_page() {
            ?>
            <div class="test_admin container">
                <h1>Yay Sub Menu Page!</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, quidem non tempora officia, optio ut quaerat expedita, tenetur iure quisquam laudantium aliquam vel accusantium nihil quis facere quibusdam aperiam dicta.</p>
                <form method="post" action="options.php">
                    <?php
                        settings_fields( 'admin_test' ); 
                        do_settings_sections( 'admin_test' );
                    ?>
                    <table class="form-table">
                        <tr valign="top">
                            <td>
                                <label for="admin_button_link">Link for redirect</label>
                                <input type="text" name="admin_button_link" value="<?php echo get_option( 'admin_button_link' ); ?>"></input>
                                <label for="admin_button_target">What should this button link to?</label>
                                <select name="admin_button_target" selected="<?php echo get_option( 'admin_button_target' ); ?>">
                                    <option value="_blank">New Window</option>
                                    <option value="_self">Replace the current page</option>
                                    <option value="_parent">New tab at the front of window</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <?php submit_button(); ?>
                </form>
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
                    <?php
                        settings_fields( 'admin_test' ); 
                        do_settings_sections( 'admin_test' );
                    ?>
                    <table class="form-table">
                        <h2>Fill out the Form</h2>
                        <tr valign="top">
                            <td>
                                <label for="test_admin_info">Contact Info:</label>
                                <input type="text" name="test_admin_info" size="35" value="<?php echo get_option( 'test_admin_info' ); ?>"></input>
                                <label for="test_admin_email">Contact Email:</label>
                                <input type="email" name="test_admin_email" size="35" value="<?php echo get_option( 'test_admin_email' ); ?>"></input>
                                <label for="test_admin_date">Contact Start Date:</label>
                                <input type="date" name="test_admin_date" size="35" value="<?php echo get_option( 'test_admin_date' ); ?>"></input>
                            </td>
                        </tr>
                    </table>
                    <?php submit_button(); ?>
                </form>
            </div>
            <?php
        }
    }

    /* SAVE FIELDS */
    if ( !function_exists( "update_test_admin" ) ) {
        function update_test_admin() {
            register_setting( 'admin_test', 'test_admin_info' );
            register_setting( 'admin_test', 'test_admin_email' );
            register_setting( 'admin_test', 'test_admin_date' );

            register_setting( 'admin_test', 'admin_button_link' );
            register_setting( 'admin_test', 'admin_button_target' );

        }
    }

?>