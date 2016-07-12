<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'Damn it.! Dude you are looking for what?' );
}

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and enqueue the dashboard-specific stylesheet, JavaScript
 * and all other admin side functions.
 *
 * @category   Core
 * @package    MailerSuite
 * @subpackage Admin
 * @author     Joel James <j@thefoxe.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       
 */
class MailerSuite_Admin {

    /**
     * The options from db.
     *
     * @since  1.0.0
     * @access private
     * @var    string  $options Get the options saved in db.
     */
    private $options;

    /**
     * Initialize the class and set its properties.
     *
     * @param array $options Options data from db.
     * 
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function __construct( $options ) {

        $this->options = $options;
    }

    /**
     * Creating admin menus.
     *
     * @since  1.0.0
     * @access public
     * @uses   add_submenu_page Action hook to add new admin menu page.
     * 
     * @return void
     */
    public function create_menu() {

        add_menu_page(
            __( 'Mailer Suite', MAILERSUITE_DOMAIN ),
            __( 'Mailer Suite', MAILERSUITE_DOMAIN ),
            MAILERSUITE_PERMISSION,
            'mailersuite-settings',
            array(
                $this,
                'admin_page'
            ),
            ' dashicons-email-alt'
        );
    }

    /**
     * Output buffer function
     *
     * To avoid header already sent issue
     * - https://tommcfarlin.com/wp_redirect-headers-already-sent/
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function add_buffer() {

        ob_start();
    }

    /**
     * Admin options page display.
     *
     * Includes admin page contents to manage settings.
     * All html parts will be included in this page.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function admin_page() {

        require MAILERSUITE_PLUGIN_DIR . '/admin/partials/mailersuite-admin-display.php';
    }

    /**
     * Registering mailer suite options.
     * 
     * This function is used to register all settings options to the db using
     * WordPress settings API.
     * If we want to register another setting, we can include that here.
     *
     * @since  1.0.0
     * @access public
     * @action hooks  register_setting Hook to register options in db.
     * 
     * @return void
     */
    public function register_options() {

        register_setting(
            'mailersuite_options',
            'mailersuite_options'
        );
    }

    /**
     * Custom footer text for mailer suite pages.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return mixed
     */
    public function dashboard_footer() {

        global $pagenow;

        if ( ( $pagenow == 'options-general.php' ) && ( in_array( $_GET['page'], array( 'mailersuite-settings' ) )) ) {

            _e( 'Thank you for choosing Mailer Suite to improve your website', MAILERSUITE_DOMAIN );
            echo ' | ';
            _e( 'Kindly give this plugin a ', MAILERSUITE_DOMAIN );
            echo '<a href="https://wordpress.org/support/view/plugin-reviews/mailersuite?filter=5#postform">';
            _e( 'rating', MAILERSUITE_DOMAIN );
            echo ' &#9733; &#9733; &#9733; &#9733; &#9733;</a>';
        } else {
            return;
        }
    }

    /**
     * Custom plugin action Link.
     *
     * Function to add a quick link to mailersuite,
     * when being listed on your plugins list view.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return array $links Links to display.
     */
    public function plugin_action_links( $links, $file ) {

        $plugin_file = basename( 'mailersuite.php' );

        if ( basename( $file ) == $plugin_file ) {

            $settings_link = '<a href="options-general.php?page=mailersuite-settings&tab=general">' . __( 'Settings', MAILERSUITE_DOMAIN ) . '</a>';

            array_unshift( $links, $settings_link );
        }

        return $links;
    }

}
