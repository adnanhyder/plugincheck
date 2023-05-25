<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/adnanhyder/
 * @since      1.0.0
 *
 * @package    Monetize_More
 * @subpackage Monetize_More/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Monetize_More
 * @subpackage Monetize_More/admin
 * @author     Adnan <12345adnan@gmail.com>
 */
class Monetize_More_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Monetize_More_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Monetize_More_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/monetize-more-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Monetize_More_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Monetize_More_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/monetize-more-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * @return void
     * Registering custom post type
     * @since    1.0.0
     */
    public function mm_register_cpt()
    {
        $labels = array(
            'name'                  => _x( 'Properties', 'Post Type General Name', 'monetize-more' ),
            'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'monetize-more' ),
            'menu_name'             => __( 'Property', 'monetize-more' ),
            'name_admin_bar'        => __( 'Property', 'monetize-more' ),
            'archives'              => __( 'Item Archives', 'monetize-more' ),
            'attributes'            => __( 'Item Attributes', 'monetize-more' ),
            'parent_item_colon'     => __( 'Parent Item:', 'monetize-more' ),
            'all_items'             => __( 'All Items', 'monetize-more' ),
            'add_new_item'          => __( 'Add New Item', 'monetize-more' ),
            'add_new'               => __( 'Add New', 'monetize-more' ),
            'new_item'              => __( 'New Item', 'monetize-more' ),
            'edit_item'             => __( 'Edit Item', 'monetize-more' ),
            'update_item'           => __( 'Update Item', 'monetize-more' ),
            'view_item'             => __( 'View Item', 'monetize-more' ),
            'view_items'            => __( 'View Items', 'monetize-more' ),
            'search_items'          => __( 'Search Item', 'monetize-more' ),
            'not_found'             => __( 'Not found', 'monetize-more' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'monetize-more' ),
            'featured_image'        => __( 'Featured Image', 'monetize-more' ),
            'set_featured_image'    => __( 'Set featured image', 'monetize-more' ),
            'remove_featured_image' => __( 'Remove featured image', 'monetize-more' ),
            'use_featured_image'    => __( 'Use as featured image', 'monetize-more' ),
            'insert_into_item'      => __( 'Insert into item', 'monetize-more' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'monetize-more' ),
            'items_list'            => __( 'Items list', 'monetize-more' ),
            'items_list_navigation' => __( 'Items list navigation', 'monetize-more' ),
            'filter_items_list'     => __( 'Filter items list', 'monetize-more' ),
        );
        $args = array(
            'label'                 => __( 'Property', 'monetize-more' ),
            'description'           => __( 'Description', 'monetize-more' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-admin-home',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'property' ),
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( 'mm_property', $args );
        flush_rewrite_rules();
    }

    /**
     * @return void
     * Adding Metabox
     * @since    1.0.0
     */
    public function mm_add_meta_boxes() {
        add_meta_box(
            'property_metabox',
            'Property Information',
            [$this,'mm_property_metabox_callback'],
            'mm_property',
            'normal',
            'default'
        );
    }

    /**
     * @param $post object
     * @return void
     * Metabox Callback
     * @since    1.0.0
     */
    public function mm_property_metabox_callback($post) {
        wp_nonce_field('mm_property_metabox', 'mm_property_metabox_nonce');
        global $wpdb;
        $table_name = $wpdb->prefix . MONETIZE_MORE_TABLE_NAME_METABOX;
        $post_id = $post->ID;

        $results = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT bedroom, bathroom, area FROM $table_name WHERE post_id = %d",
                $post_id
            ),
            ARRAY_A
        );

        $bedroom = "";
        $bathroom = "";
        $area = "";
        $bedroom_title = "1";
        if ($results !== null) {
            $bedroom = absint($results['bedroom']);
            $bathroom = absint($results['bathroom']);
            $area = floatval($results['area']);
        }
        ob_start();
        require 'partials/monetize-more-metabox-markup.php';
        echo ob_get_clean();
    }

    /**
     * @param $post_id
     * @return void
     * Metabox Saving
     * @since    1.0.0
     */
    public function mm_save_post($post_id ) {
        if (!isset($_POST['mm_property_metabox_nonce']) || !wp_verify_nonce($_POST['mm_property_metabox_nonce'], 'mm_property_metabox')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        global $wpdb;
        $table_name = $wpdb->prefix .MONETIZE_MORE_TABLE_NAME_METABOX ;

        $bedroom = absint($_POST['bedroom']);
        $bathroom = absint($_POST['bathroom']);
        $area = sanitize_text_field($_POST['area']);

        $data = array(
            'post_id' => $post_id,
            'bedroom' => $bedroom,
            'bathroom' => $bathroom,
            'area' => $area
        );

        $wpdb->replace($table_name, $data);
    }

    /**
     * @return void
     * Email Corn activation
     * @since    1.0.0
     */
    public function mm_email_cron_activation() {
        if (!wp_next_scheduled('mm_sending_mail_cron_event')) {
            wp_schedule_event(strtotime('midnight'), 'daily', 'mm_sending_mail_cron_event');
        }
    }

    /**
     * @return void
     * Actual Corn Job performing
     * @since    1.0.0
     */
    public function mm_email_cron_job()
    {

        $current_time = current_time('timestamp');
        $twenty_four_hours_ago = $current_time - (24 * 60 * 60);

        $args = array(
            'post_type' => 'mm_property',
            'posts_per_page' => -1,
            'date_query' => array(
                array(
                    'after' => date('Y-m-d H:i:s', $twenty_four_hours_ago),
                    'before' => date('Y-m-d H:i:s', $current_time),
                    'inclusive' => true,
                ),
            ),
        );

        $args = apply_filters('monetize_more_email_args', $args);

        $latest_listing = new WP_Query($args);

        if ($latest_listing->have_posts()) {
            $subject = esc_html__("New Property Available!" , "monetize-more");
            $message = esc_html__("Check out our latest property:", "monetize-more");
            while ($latest_listing->have_posts()) {
                $latest_listing->the_post();
                $post_title = get_the_title();
                $message .= '<br><br><strong>'.esc_html__("Title", "monetize-more").':</strong> ' . $post_title . '<br>';
            }
            $recipients = $this->mm_get_recipient_list();

            if(!empty($recipients)){
                // Send the email
                do_action('monetize_more_before_email_start_hook');
                foreach ($recipients as $recipient){
                    wp_mail($recipient, $subject, $message);
                }
            }
            do_action('monetize_more_after_email_hook');

            // Reset the post data
            wp_reset_postdata();
        }
    }

    /**
     * @return array of recipients email
     * @since    1.0.0
     */
    public function mm_get_recipient_list() {
        // Initialize an empty array to store the recipient email addresses
        $recipients = array();

        // Set the user query arguments
        $args = array(
            'role' => 'subscriber',  // Filter users by role (e.g., subscribers)
            'number' => -1,         // Retrieve all users
        );

        // Retrieve the users based on the query arguments
        $users = get_users($args);

        if(!empty($user)) {
            // Loop through the users and retrieve their email addresses
            foreach ($users as $user) {
                $recipients[] = $user->user_email;
            }
        }else{
            $recipients[] = get_option('admin_email');
        }


        // Return the recipient list
        return $recipients;
    }

    /**
     * @return void
     * Rewriting rules
     * @since    1.0.0
     */
    public function mm_add_gallery_endpoint(){

        add_rewrite_endpoint('gallery', EP_PERMALINK | EP_PAGES);
        flush_rewrite_rules();

    }

    /**
     * @return void
     * Template for new endpoint gallery
     * @since    1.0.0
     */
    public function mm_display_gallery_template(){
        global $wp_query;

        if ( ! isset( $wp_query->query_vars['gallery'] ) || ! is_singular('mm_property') )
            return;

        include("partials/single-mm-property-gallery.php");
        exit;

    }


}
