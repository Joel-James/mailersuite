<?php

/**
 * Plugin Name:     MailerSuite
 * Plugin URI:      https://mailersuite.com
 * Description:     Light weight Facebook comments with lazy load facility. It loads comments after user clicking on a button or scrolling down. It saves page load time.
 * Version:         1.0.0
 * Author:          Joel James
 * Author URI:      https://thefoxe.com/
 * Donate link:     https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XUVWY8HUBUXY4
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     mailersuite
 * Domain Path:     /languages
 *
 * MailerSuite is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * MailerSuite is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with MailerSuite. If not, see <http://www.gnu.org/licenses/>.
 *
 * @category   Core
 * @package    MailerSuite
 * @author     Joel James <j@thefoxe.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://mailersuite.com/
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'Damn it.! Dude you are looking for what?' );
}

if ( !class_exists( 'MailerSuite' ) ) {

    // Constants array
    $constants = array(
        'MAILERSUITE_NAME' => 'mailersuite',
        'MAILERSUITE_DOMAIN' => 'mailersuite',
        'MAILERSUITE_PATH' => plugins_url( '', __FILE__ ),
        'MAILERSUITE_PLUGIN_DIR' => dirname( __FILE__ ),
        'MAILERSUITE_VERSION' => '2.0.0',
        'MAILERSUITE_TABLE' => $GLOBALS['wpdb']->prefix . 'mailersuite_mails',
        'MAILERSUITE_PERMISSION' => 'manage_options'
    );

    foreach ( $constants as $constant => $value ) {
        // Set constants if not set already
        if ( ! defined( $constant ) ) {
            define( $constant, $value );
        }
    }

    /**
     * The code that runs during plugin activation.
     * 
     * We can insert our default settings and other
     * data in this function.
     * 
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    function mailersuite_activate() {

        require_once plugin_dir_path( __FILE__ ) . 'includes/class-mailersuite-activator.php';

        MailerSuite_Activator::activate();
    }

    // Run activation hook
    register_activation_hook( __FILE__, 'mailersuite_activate' );

    // The core plugin class that is used to define
    // dashboard-specific hooks, and public-facing site hooks.
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-mailersuite.php';

    /**
     * Begins execution of the plugin.
     *
     * Since everything within the plugin is registered via hooks,
     * then kicking off the plugin from this point in the file does
     * not affect the page life cycle.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    function mailersuite_run() {

        $plugin = new MailerSuite();
        $plugin->run();
    }

    mailersuite_run();
}

//*** Thank you for your interest in MailerSuite - Developed and managed by Joel James ***// 