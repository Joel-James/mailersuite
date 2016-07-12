<div class="wrap">
    <form method="post" action="options.php">
        <p>
        <?php settings_fields( 'mailersuite_options' ); ?>
        <?php $options = get_option( 'mailersuite_options' ); ?>
        <table class="form-table">
            <tbody>

                <tr>
                    <th><?php _e( 'API Key', MAILERSUITE_DOMAIN ); ?></th>
                    <td>
                        <input type="text" name="mailersuite_options[api_key]" value="<?php echo $options['api_key']; ?>" required>
                        <p class="description"><?php _e( 'Enter your Mailgun API key. Get the public key from <a href="https://mailgun.com/app/account/settings">here</a>', MAILERSUITE_DOMAIN ); ?></p>
                    </td>
                </tr>

            </tbody>
        </table>
        <?php submit_button( __( 'Save All Changes', MAILERSUITE_DOMAIN ) ); ?>
        </p>
    </form>
</div>