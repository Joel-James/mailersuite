<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'Damn it.! Dude you are looking for what?' );
}

/**
 * WP_List_Table is marked as private by WordPress. So they may change it.
 * Details here - https://codex.wordpress.org/Class_Reference/WP_List_Table
 * So we have copied this class and using independently to avoid future issues. 
 */
global $wp_version;
if ( $wp_version >= 4.4 ) {
    include_once MAILERSUITE_PLUGIN_DIR . '/admin/core/class-wp-list-table-4.4.php';
} else {
    include_once MAILERSUITE_PLUGIN_DIR . '/admin/core/class-wp-list-table-old.php';
}

/**
 * The listing page class for error logs.
 *
 * This class defines all the methods to output the error logs display table using
 * WordPress listing table class.
 *
 * @category   Core
 * @package    MailerSuite
 * @subpackage MailsList
 * @author     Joel James <me@joelsays.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://mailersuite.com/
 */
class MailerSuite_Mails extends MailerSuite_List_Table {


    /**
     * Initialize the class and set its properties.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function __construct() {

        parent::__construct(
            array(
                'singular' => __( 'Email', MAILERSUITE_DOMAIN ),
                'plural' => __( 'Emails', MAILERSUITE_DOMAIN ),
                'ajax' => true
            )
        );
    }

    /**
     * Get the email inbox data for the account.
     *
     * @param int $per_page    Items per page
     * @param int $page_number Page number of the list
     *
     * @since  1.0.0
     * @access private
     * @global object $wpdb WP DB object
     * 
     * @return array $error_data Array of error log data.
     */
    private function get_emails( $per_page = 20, $page_number = 1 ) {

        global $wpdb;

        $offset = ( $page_number - 1 ) * $per_page;

        // If no sort, default to time
        $orderby = ( isset( $_REQUEST['orderby'] ) ) ? $this->filter_columns( $_REQUEST['orderby'] ) : 'date';

        // If no order, default to asc
        $order = ( isset( $_REQUEST['order'] ) && 'desc' == $_REQUEST['order'] ) ? 'DESC' : 'ASC';

        $result = array();

        return $result;
    }

    /**
     * Filter the sorting parameters.
     *
     * This is used to filter the sorting parameters in order
     * to prevent SQL injection atacks. We will accept only our
     * required values. Else we will assign a default value.
     * 
     * @param string $column Value from request
     *
     * @since  1.0.0
     * @access private
     * 
     * @return string $filtered_column.
     */
    private function filter_columns( $column ) {

        $allowed_columns = array( 'time' );
        
        if ( in_array( $column, $allowed_columns ) ) {
            return esc_sql( $column );
        }

        return 'time';
    }

    /**
     * Delete a single email.
     *
     * This function deletes a single email data from db.
     * This can not be undone for now.
     * 
     * @param int $id ID of the mail.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    private function delete_email( $id ) {

        global $wpdb;
        
        if ( empty( $id ) ) {
            return;
        }

        $wpdb->delete( MAILERSUITE_TABLE, array( 'id' => $id ), array( '%d' ) );
    }
    

    /**
     * Get the count of total email records in table.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return mixed
     */
    private function mail_count() {

        global $wpdb;

        $sql = "SELECT COUNT(id) FROM " . MAILERSUITE_TABLE;

        return $wpdb->get_var( $sql );
    }

    /**
     * Empty record text.
     *
     * Custom text to display where there is nothing to display in mails.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return void
     */
    public function no_items() {

        _e( 'Tamar padar..! No emails, seriously dude?.', MAILERSUITE_DOMAIN );
    }

    /**
     * Default column in email list table.
     *
     * To show columns in email list table. If there is nothing
     * for switch, printing the whole array.
     * 
     * @param array  $item        Column data
     * @param string $column_name Column name
     *
     * @since  1.0.0
     * @access public
     * 
     * @return array
     */
    public function column_default( $item, $column_name ) {

        switch ( $column_name ) {
            case 'subject':
            case 'from':
            case 'time':
            case 'actions':
                return $item[ $column_name ];
            default:
                //Show the whole array for troubleshooting purposes
                return print_r( $item, true );
        }
    }

    /**
     * To output checkbox for bulk actions.
     *
     * This function is used to add new checkbox for all entries in
     * the listing table. We use this checkbox to perform bulk actions.
     * 
     * @param array $item Column data
     *
     * @since  1.0.0
     * @access public
     * 
     * @return string
     */
    function column_cb( $item ) {

        return sprintf( '<input type="checkbox" name="bulk-select[]" value="%s"/>', $item['id'] );
    }

    /**
     * Column titles for the listing.
     *
     * Custom column titles to be displayed in listing table.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return array $columns Array of cloumn titles.
     */
    public function get_columns() {

        $columns = array(
            'cb' => '<input type="checkbox" style="width: 5%;" />',
            'subject' => __( 'Subject', MAILERSUITE_DOMAIN ),
            'from' => __( 'From', MAILERSUITE_DOMAIN ),
            'time' => __( 'Time', MAILERSUITE_DOMAIN ),
            'actions' => __( 'Actions', MAILERSUITE_DOMAIN ),
        );

        return $columns;
    }

    /**
     * Make columns sortable
     *
     * To make our custom columns in list table sortable.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return array $sortable_columns Array of columns to enable sorting.
     */
    public function get_sortable_columns() {

        $sortable_columns = array(
            'subject' => array( 'subject', true ),
            'from' => array( 'from', true ),
            'time' => array( 'time', true ),
        );

        return $sortable_columns;
    }

    /**
     * Bulk actions drop down
     *
     * Options to be added to the bulk actions drop down for users
     * to select.
     *
     * @since  1.0.0
     * @access public
     * 
     * @return array $actions Options to be added to the action select box.
     */
    public function get_bulk_actions() {

        $actions = array(
            'bulk-delete' => __( 'Delete', '404-to-301' ),
            'bulk-mark-read' => __( 'Set as read', '404-to-301' )
        );

        return $actions;
    }

    /**
     * Main function to output the listing table using WP_List_Table class
     *
     * As name says, this function is used to prepare the lsting table based
     * on the custom rules and filters that we have given.
     * This function extends the lsiting table class and uses our custom data
     * to list in the table.
     * Here we set pagination, columns, sorting etc.
     * $this->items - Push our custom log data to the listing table.
     *
     * @global object $wpdb WP DB object
     * @since  1.0.0
     * @access public
     * @uses   hide_errors() To hide if there are SQL query errors.
     * 
     * @return void
     */
    public function prepare_items() {

        $this->_column_headers = $this->get_column_info();

        // Do bulk actions
        $this->bulk_actions();

        $this->set_pagination_args(
            array(
                'total_items' => $this->mail_count(),
                    'per_page' => $this->get_items_per_page( 'emails_per_page', 20 )
                )
        );

        $this->items = $this->get_emails( $per_page, $this->get_pagenum() );
    }

    /**
     * To perform bulk actions.
     *
     * This function is used to check if bulk action is set in post.
     * If set it will call the required functions to perform the task.
     *
     * @since  1.0.0
     * @access public
     * @uses   wp_verify_nonce To verify if the request is from WordPress.
     * 
     * @return void
     */
    public function process_bulk_action() {

        // Do something here.
    }

}
