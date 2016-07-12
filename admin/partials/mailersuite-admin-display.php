<?php
if ( ! defined( 'WPINC' ) ) {
    die( 'Nice try dude. But I am sorry' );
}
/**
 * Provide a dashboard view for the plugin
 *
 * This file is used to markup the dashboard pages of the plugin.
 *
 * @category   Core
 * @package    MailerSuite
 * @subpackage Admin View
 * @author     Joel James <j@thefoxe.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://mailersuite.com/
 */
?>

<!-- This should be primarily consist of HTML with a little bit of PHP in it. -->

<div class="wrap">
    <h2><?php _e( 'Mailer Suite', MAILERSUITE_DOMAIN ); ?> | <?php _e( 'Settings', MAILERSUITE_DOMAIN ); ?></h2><br>
    <h2 class="nav-tab-wrapper">
        <a href="?page=mailersuite-settings&tab=general" class="nav-tab nav-tab-active"><?php _e( 'Settings', MAILERSUITE_DOMAIN ); ?></a>
        <a href="?page=mailersuite-settings&tab=credits" class="nav-tab"><span class="dashicons dashicons-editor-help"></span> <?php _e( 'Help & Info', MAILERSUITE_DOMAIN ); ?></a>
    </h2>
</div>

<?php include_once('mailersuite-admin-general-tab.php');