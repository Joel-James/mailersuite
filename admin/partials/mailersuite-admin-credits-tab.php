<div class="wrap">
    <br>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <div class="postbox">
                    <h3 class="hndle"><span><?php _e('About the plugin & developer', 'lazy-facebook-comments'); ?></span></h3>
                    <div class="inside">
                        <div class="c4p-clearfix">
                            <div class="c4p-left">
                                <img src="<?php echo LFC_PATH . 'admin/images/foxe.png'; ?>" class="c4p-author-image" />
                            </div>
                            <div class="c4p-left" style="width: 70%">
                                <?php $uname = ( $current_user->user_firstname == '' ) ? $current_user->user_login : $current_user->user_firstname; ?>
                                <p><?php printf(__('Yo %s!', 'lazy-facebook-comments'), '<strong>' . $uname . '</strong>'); ?> <?php _e('Thank you for using Lazy Facebook Comments', 'lazy-facebook-comments'); ?></p>
                                <p>
                                    <?php _e('This plugin is brought to you by', 'lazy-facebook-comments'); ?> <a href="https://thefoxe.com/" class="i4t3-author-link" target="_blank" title="<?php _e('Visit author website', 'lazy-facebook-comments'); ?>"><strong>The Foxe</strong></a>, <?php _e('a personal website managed by Joel James.', 'lazy-facebook-comments'); ?>
                                </p>
                                <p>
                                <hr/>
                                </p>
                                <p>
                                    <?php _e('So you installed this plugin and how is it doing? Feel free to', 'lazy-facebook-comments'); ?> <a href="https://thefoxe.com/contact/" class="i4t3-author-link" target="_blank" title="<?php _e('Contact the developer', 'lazy-facebook-comments'); ?>"><?php _e('get in touch with me', 'lazy-facebook-comments'); ?></a> <?php _e('anytime for help. I am always happy to help.', 'lazy-facebook-comments'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="postbox">
                    <h3 class="hndle"><span><?php _e('Debugging Data', 'lazy-facebook-comments'); ?></span></h3>
                    <div class="inside">
                        <div class="c4p-clearfix">
                            <div class="c4p-left" style="width: 70%">
                                <?php echo LFC_Admin::get_debug_data(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="postbox-container-1" class="postbox-container">

                <div class="postbox">
                    <h3 class="hndle ui-sortable-handle"><span class="dashicons dashicons-info"></span> <?php _e('Plugin Information', 'lazy-facebook-comments'); ?></h3>
                    <div class="inside">
                        <div class="misc-pub-section">
                            <label><?php _e('Name', 'lazy-facebook-comments'); ?> : </label>
                            <span><strong><?php _e('Lazy Facebook Comments', 'lazy-facebook-comments'); ?></strong></span>
                        </div>
                        <div class="misc-pub-section">
                            <label><?php _e('Version', 'lazy-facebook-comments'); ?> : v<?php echo $this->version; ?></label>
                            <span></span>
                        </div>
                        <div class="misc-pub-section">
                            <label><?php _e('Author', 'lazy-facebook-comments'); ?> : <a href="https://thefoxe.com/" class="i4t3-author-link" target="_blank" title="<?php _e('Visit author website', 'lazy-facebook-comments'); ?>">The Foxe</a></label>
                            <span></span>
                        </div>
                        <div class="misc-pub-section">
                            <label><a href="https://thefoxe.com/docs/docs/category/lazy-facebook-comments/" class="i4t3-author-link" target="_blank" title="<?php _e('Visit plugin website', 'lazy-facebook-comments'); ?>"><strong><?php _e('Plugin documentation', 'lazy-facebook-comments'); ?></strong></a></label>
                            <span></span>
                        </div>
                        <div class="misc-pub-section">
                            <label><a href="" class="i4t3-author-link" target="_blank" title="<?php _e('Visit plugin website', 'lazy-facebook-comments'); ?>"><strong><?php _e('More details about the plugin', 'lazy-facebook-comments'); ?></strong></a></label>
                            <span></span>
                        </div>
                        <div class="misc-pub-section">
                            <label><?php _e('Need help?', 'lazy-facebook-comments'); ?></label>
                            <span><strong><a href="https://thefoxe.com/contact/"><?php _e('contact support', 'lazy-facebook-comments'); ?></a></strong></span>
                        </div>
                    </div>
                </div>
                <div class="postbox">
                    <h3 class="hndle ui-sortable-handle"><span class="dashicons dashicons-smiley"></span> <?php _e('Like the plugin', 'lazy-facebook-comments'); ?>?</h3>
                    <div class="inside">
                        <div class="misc-pub-section">
                            <span class="dashicons dashicons-star-filled"></span> <label><strong><a href="https://wordpress.org/support/view/plugin-reviews/lazy-facebook-comments?filter=5#postform" target="_blank" title="<?php _e('Rate now', 'lazy-facebook-comments'); ?>"><?php _e('Rate this on WordPress', 'lazy-facebook-comments'); ?></a></strong></label>
                        </div>
                        <div class="misc-pub-section">
                            <label><span class="dashicons dashicons-heart"></span> <strong><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XUVWY8HUBUXY4" target="_blank" title="<?php _e('Donate now', 'lazy-facebook-comments'); ?>"><?php _e('Make a small donation', 'lazy-facebook-comments'); ?></a></strong></label>
                        </div>
                        <div class="misc-pub-section">
                            <label><span class="dashicons dashicons-admin-plugins"></span> <strong><a href="https://github.com/joel-james/lazy-facebook-comments/" target="_blank" title="<?php _e('Contribute now', 'lazy-facebook-comments'); ?>"><?php _e('Contribute to the Plugin', 'lazy-facebook-comments'); ?></a></strong></label>
                        </div>
                        <div class="misc-pub-section">
                            <label><span class="dashicons dashicons-twitter"></span> <strong><a href="https://twitter.com/home?status=I%20am%20using%20Lazy%20Facbook%20Comments%20plugin%20by%20%40Joel_James%20for%20commenting%20in%20my%20%40WordPress%20site%20-%20it%20is%20awesome!%20%3E%20https://wordpress.org/plugins/lazy-facebook-comments/" target="_blank" title="<?php _e('Tweet now', 'lazy-facebook-comments'); ?>"><?php _e('Tweet about the Plugin', 'lazy-facebook-comments'); ?></a></strong></label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
