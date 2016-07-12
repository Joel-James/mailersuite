<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @category   Core
 * @package    MailerSuite
 * @subpackage Internationalization
 * @author     Joel James <j@thefoxe.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://mailersuite.com/
 */
class MailerSuite_i18n {

    /**
     * The domain specified for this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string  $domain The domain identifier for this plugin.
     */
    private $domain;

    /**
     * Load the plugin text domain for translation.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function load_plugin_textdomain() {

        load_plugin_textdomain(
            $this->domain,
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );
    }

    /**
     * Set the domain equal to that of the specified domain.
     *
     * @param string $domain The domain that represents the locale of this plugin.
     * 
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function set_domain() {

        $this->domain = MAILERSUITE_DOMAIN;
    }

}
