<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'Damn it.! Dude you are looking for what?' );
}

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @category   Core
 * @package    MailerSuite
 * @subpackage Activator
 * @author     Joel James <j@thefoxe.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://mailersuite.com/
 */
class MailerSuite {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since  1.0.0
     * @access protected
     * @var    MailerSuite_Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The options from db.
     *
     * @since  1.0.0
     * @access private
     * @var    string  $options Get the options saved in db.
     */
    private $options;
    
    /**
     * The API base url.
     *
     * @since  1.0.0
     * @access private
     * @var    string  $api_url API base url.
     */
    private $api_url = 'https://api.mailgun.net/v3/';

    /**
     * Define the core functionality of the plugin.
     *
     * Load the dependencies, define the locale, and set the hooks for the Dashboard and
     * the public-facing side of the site.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function __construct() {

        $this->options = get_option( 'mailersuite_options' );
        $this->dependencies();
        $this->set_locale();
        $this->admin_hooks();
        $this->public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - MailerSuite_Loader. Orchestrates the hooks of the plugin.
     * - MailerSuite_Admin. Defines all hooks for the dashboard.
     * - MailerSuite_Public. Defines all hooks for the public functions.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since  1.0.0
     * @access private
     * 
     * @return void
     */
    private function dependencies() {

        require_once MAILERSUITE_PLUGIN_DIR . '/includes/class-mailersuite-loader.php';
        require_once MAILERSUITE_PLUGIN_DIR . '/includes/class-mailersuite-i18n.php';
        require_once MAILERSUITE_PLUGIN_DIR . '/admin/class-mailersuite-admin.php';
        require_once MAILERSUITE_PLUGIN_DIR . '/public/class-mailersuite-public.php';

        $this->loader = new MailerSuite_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the MailerSuite_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since  1.0.0
     * @access private
     * 
     * @return void
     */
    private function set_locale() {

        $plugin_i18n = new MailerSuite_i18n();

        $plugin_i18n->set_domain();

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
    }

    /**
     * Register all of the hooks related to the dashboard functionality
     * of the plugin.
     * 
     * This function is also used to register all styles and JavaScripts for admin side.
     *
     * @since  1.0.0
     * @access private
     * @uses   add_action() and add_filter()
     * 
     * @return void
     */
    private function admin_hooks() {

        // No need, if not admin side
        if ( ! is_admin() ) {
            return;
        }

        $plugin_admin = new MailerSuite_Admin( $this->get_options() );

        $this->loader->add_filter( 'admin_init', $plugin_admin, 'add_buffer' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'create_menu' );
        $this->loader->add_action( 'admin_init', $plugin_admin, 'register_options' );
        $this->loader->add_filter( 'admin_footer_text', $plugin_admin, 'dashboard_footer' );
        $this->loader->add_filter( 'plugin_action_links', $plugin_admin, 'plugin_action_links', 10, 5 );
    }

    /**
     * Register all of the hooks related to public side of the plugin.
     *
     * @since  1.0.0
     * @access private
     * @uses   add_filter()
     * 
     * @return void
     */
    private function public_hooks() {

        // No need, if admin side
        if ( is_admin() ) {
            return;
        }

        $plugin_public = new MailerSuite_Public( $this->get_options() );
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function run() {

        $this->loader->run();
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return MailerSuite_Loader Orchestrates the hooks of the plugin.
     */
    public function get_loader() {

        return $this->loader;
    }

    /**
     * Retrieve the options data from db.
     *
     * @since  1.0.0
     * @access public
     * '
     * @return array The options data.
     */
    public function get_options() {

        return $this->options;
    }

}
