<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'Damn it.! Dude you are looking for what?' );
}

/**
 * The public-facing functionality of the plugin.
 *
 * @category   Core
 * @package    MailerSuite
 * @subpackage Public
 * @author     Joel James <j@thefoxe.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://mailersuite.com/
 */
class MailerSuite_Public {

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
     * @param string $options The options of this plugin.
     * 
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function __construct( $options ) {

        $this->options = $options;
    }

}
