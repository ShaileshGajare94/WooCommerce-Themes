<?php
/**
 * WooThemes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WooThemes
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function woothemes_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WooThemes, use a find and replace
		* to change 'woothemes' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'woothemes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header_menu' => esc_html__( 'Header Menu', 'woothemes' ),
			'footer_menu' => esc_html__( 'Footer Menu', 'woothemes' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'woothemes_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support('woocommerce');
}
add_action( 'after_setup_theme', 'woothemes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function woothemes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'woothemes_content_width', 640 );
}
add_action( 'after_setup_theme', 'woothemes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function woothemes_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'woothemes' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'woothemes' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'woothemes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function woothemes_scripts() {


		wp_enqueue_style( 'line_awesome_min', get_template_directory_uri() . '/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css', array(), time(), 'all' );
	wp_enqueue_style( 'bootstrap_min_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), time(), 'all' );
	wp_enqueue_style( 'owl_carousel_css', get_template_directory_uri() . '/assets/css/plugins/owl-carousel/owl.carousel.css', array(), time(), 'all' );
	wp_enqueue_style( 'magnific_popup_css', get_template_directory_uri() . '/assets/css/plugins/magnific-popup/magnific-popup.css', array(), time(), 'all' );
	wp_enqueue_style( 'jquery_countdown_css', get_template_directory_uri() . '/assets/css/plugins/jquery.countdown.css', array(), time(), 'all' );
	wp_enqueue_style( 'style_css', get_template_directory_uri() . '/assets/css/style.css', array(), time(), 'all' );
	wp_enqueue_style( 'skin_demo_4_css', get_template_directory_uri() . '/assets/css/skins/skin-demo-4.css', array(), time(), 'all' );
	wp_enqueue_style( 'demo-__css', get_template_directory_uri() . '/assets/css/demos/demo-4.css', array(), time(), 'all' );
	wp_enqueue_style( 'custom_css', get_template_directory_uri() . '/assets/css/custom.css', array(), time(), 'all' );

	wp_enqueue_script( 'jquery_min_js', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap_bundle_min_js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery_hoverIntent_min_js', get_template_directory_uri() . '/assets/js/jquery.hoverIntent.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery_waypoints_min_js', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'superfish_js', get_template_directory_uri() . '/assets/js/superfish.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'owl_carousel_min_js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap_input_spinner_js', get_template_directory_uri() . '/assets/js/bootstrap-input-spinner.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery_plugin_min_js', get_template_directory_uri() . '/assets/js/jquery.plugin.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery_magnific_popup_min_js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery_countdown_min_js', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'demo_4_js', get_template_directory_uri() . '/assets/js/demos/demo-4.js', array(), _S_VERSION, true );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'woothemes_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function dynamic_child_categories_tabs_with_columns_shortcode($atts) {
    // Shortcode attributes
    $atts = shortcode_atts(array(
        'parent' => '', // Parent category slug or ID
        'limit' => '12', // Number of products to display
        'columns' => '4', // Number of product columns to display
    ), $atts, 'child_category_tabs_all');

    // Validate parent category
    $parent_category = is_numeric($atts['parent'])
        ? get_term_by('id', $atts['parent'], 'product_cat')
        : get_term_by('slug', $atts['parent'], 'product_cat');

    if (!$parent_category) {
        return '<p>' . __('Invalid parent category.', 'woocommerce') . '</p>';
    }

    // Get child categories
    $child_categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'parent' => $parent_category->term_id,
        'hide_empty' => true,
    ));

    if (empty($child_categories)) {
        return '<p>' . __('No child categories found.', 'woocommerce') . '</p>';
    }

    ob_start();

    // Generate the tabs navigation
    echo '<ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">';
    // Add the "All" tab
    echo '<li class="nav-item">';
    echo '<a class="nav-link active" id="tab-all-link" data-toggle="tab" href="#tab-all" role="tab" aria-controls="tab-all" aria-selected="true">';
    echo __('All', 'woocommerce');
    echo '</a>';
    echo '</li>';

    // Add child category tabs
    foreach ($child_categories as $child_category) {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" id="tab-' . esc_attr($child_category->slug) . '-link" data-toggle="tab" href="#tab-' . esc_attr($child_category->slug) . '" role="tab" aria-controls="tab-' . esc_attr($child_category->slug) . '" aria-selected="false">';
        echo esc_html($child_category->name);
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';

    // Generate the tab content
    echo '<div class="tab-content">';
    // Add the "All" tab content
    echo '<div class="tab-pane fade show active" id="tab-all" role="tabpanel" aria-labelledby="tab-all-link">';
    echo '<h2>' . __('All Products', 'woocommerce') . '</h2>';
    echo do_shortcode('[products category="' . implode(',', wp_list_pluck($child_categories, 'slug')) . '" limit="' . esc_attr($atts['limit']) . '" columns="' . esc_attr($atts['columns']) . '"]');
    echo '</div>';

    // Add child category content
    foreach ($child_categories as $child_category) {
        echo '<div class="tab-pane fade" id="tab-' . esc_attr($child_category->slug) . '" role="tabpanel" aria-labelledby="tab-' . esc_attr($child_category->slug) . '-link">';
        echo '<h2>' . esc_html($child_category->name) . '</h2>';
        echo '<p>' . esc_html($child_category->description) . '</p>';
        echo do_shortcode('[products category="' . esc_attr($child_category->slug) . '" limit="' . esc_attr($atts['limit']) . '" columns="' . esc_attr($atts['columns']) . '"]');
        echo '</div>';
    }
    echo '</div>';

    return ob_get_clean();
}
add_shortcode('child_category_tabs_all', 'dynamic_child_categories_tabs_with_columns_shortcode');



if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}



// Display custom fields in the "General" tab of the product edit page
add_action('woocommerce_product_options_general_product_data', 'add_custom_product_fields');

function add_custom_product_fields()
{
    global $product_object;

    echo '<div class="product_custom_fields">';

    // Text field
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_field_text',
            'label' => __('Discount', 'woocommerce'),
            'placeholder' => '',
            'desc_tip' => 'true',
            'description' => __('Enter custom field text here.', 'woocommerce')
        )
    );

    // Select field
    woocommerce_wp_select(
        array(
            'id' => '_custom_field_select',
            'label' => __('Percentage', 'woocommerce'),
            'options' => array(
                'option1' => __('10%', 'woocommerce'),
                'option2' => __('20%', 'woocommerce'),
                'option3' => __('30%', 'woocommerce')
            ),
            'desc_tip' => 'true',
            'description' => __('Select an option.', 'woocommerce')
        )
    );

    echo '</div>';
}

// Save custom fields when the product is saved
add_action('woocommerce_process_product_meta', 'save_custom_product_fields');

function save_custom_product_fields($product_id)
{
    // Save text field
    $custom_field_text = isset($_POST['_custom_field_text']) ? sanitize_text_field($_POST['_custom_field_text']) : '';
    update_post_meta($product_id, '_custom_field_text', $custom_field_text);

    // Save select field
    $custom_field_select = isset($_POST['_custom_field_select']) ? sanitize_text_field($_POST['_custom_field_select']) : '';
    update_post_meta($product_id, '_custom_field_select', $custom_field_select);
}


add_action( 'woocommerce_variation_options_pricing', 'bbloomer_add_custom_field_to_variations', 10, 3 );
 
// Woocommerce variation product custom field
function bbloomer_add_custom_field_to_variations( $loop, $variation_data, $variation ) {

   woocommerce_wp_text_input( array(
		'id' => 'custom_field[' . $loop . ']',
		'class' => 'short',
		'label' => __( 'Custom Field', 'woocommerce' ),
		'value' => get_post_meta( $variation->ID, 'custom_field', true )
   ) );
}
 
// -----------------------------------------
// 2. Save custom field on product variation save
 
add_action( 'woocommerce_save_product_variation', 'bbloomer_save_custom_field_variations', 10, 2 );
 
function bbloomer_save_custom_field_variations( $variation_id, $i ) {
   $custom_field = $_POST['custom_field'][$i];
   if ( isset( $custom_field ) ) update_post_meta( $variation_id, 'custom_field', esc_attr( $custom_field ) );
}
 
add_filter( 'woocommerce_get_settings_pages', 'bbloomer_custom_woocommerce_settings_tab' );
 
function bbloomer_custom_woocommerce_settings_tab( $settings ) {
 
  if ( ! class_exists( 'WC_Settings_Custom_Tab' ) ) {
      
      class WC_Settings_Custom_Tab extends WC_Settings_Page {
         function __construct() {
            $this->id = 'custom_tab';
            $this->label = 'Custom Tab';
            parent::__construct();
         }
      }
      $settings[] = new WC_Settings_Custom_Tab(); 
      
   }
    
   return $settings;
    
}


add_filter( 'woocommerce_get_settings_custom_tab', 'bbloomer_custom_woocommerce_settings_tab_settings', 10, 2 );
 
function bbloomer_custom_woocommerce_settings_tab_settings( $settings, $current_section ) {
 
   $settings = array(
      array(
         'title' => 'Custom tab title',
         'desc' => 'Custom tab description',
         'type' => 'title',
      ),
      array(
         'name' => 'Custom text',
         'type' => 'text',
         'id' => 'custom_tab_text_1',
         'default' => '',
         'desc' => 'Enter some text',
         'desc_tip' => true,
         'autoload' => false,
      ),
      array(
         'name' => 'Custom checkbox',
         'type' => 'checkbox',
         'id' => 'custom_tab_checkbox_1',
         'autoload' => false,
      ),
      array(
         'name' => 'Custom select',
         'type' => 'select',
         'id' => 'custom_tab_select_1',
         'default' => 'a',
         'options'  => array(          
            'a' => 'Option A',
            'b' => 'Option B',
            'c' => 'Option C',
         ),    
         'desc' => 'Choose an option',
         'desc_tip' => true,
         'autoload' => false,
      ),
      array(
         'type' => 'sectionend',
      ),
   );
    
   return $settings;
    
}


function bbloomer_add_store_admin_toggle_button( $wp_admin_bar ) {
    if ( ! current_user_can( 'manage_woocommerce' ) ) return;
 
    $is_store_admin = isset( $_COOKIE['store_admin'] ) && $_COOKIE['store_admin'] == '1';
    $url = add_query_arg( 'toggle_store_admin', $is_store_admin ? '0' : '1', admin_url( 'admin.php?page=wc-orders' ) );
 
    $wp_admin_bar->add_node( [
        'id'    => 'store-admin-toggle',
        'title' => $is_store_admin
            ? '<span class="ab-icon dashicons dashicons-admin-generic"></span> Switch to WP Admin'
            : '<span class="ab-icon dashicons dashicons-cart"></span> Switch to Store Admin',
        'href'  => $url,
    ] );
}
add_action( 'admin_bar_menu', 'bbloomer_add_store_admin_toggle_button', 100 );

function bbloomer_handle_store_admin_toggle() {
    if ( ! current_user_can( 'manage_woocommerce' ) ) return;
    if ( isset( $_GET['toggle_store_admin'] ) ) {
        if ( $_GET['toggle_store_admin'] == '1' ) {
            setcookie( 'store_admin', '1', time() + DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN, is_ssl() );
            $_COOKIE['store_admin'] = '1'; // so it's immediately available
        } else {
            setcookie( 'store_admin', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN, is_ssl() );
            unset( $_COOKIE['store_admin'] );
        }
        // Redirect to clean URL (remove toggle param)
        wp_safe_redirect( remove_query_arg( 'toggle_store_admin' ) );
        exit;
    }
}
add_action( 'admin_init', 'bbloomer_handle_store_admin_toggle' );

function bbloomer_filter_admin_menu_for_store_admin() {
    if ( ! current_user_can( 'manage_woocommerce' ) ) return;
    if ( ! isset( $_COOKIE['store_admin'] ) || $_COOKIE['store_admin'] != '1' ) return;
    global $menu;
    foreach ( $menu as $key => $item ) {
        $slug = $item[2];
        $is_woo = (
            $slug === 'woocommerce' ||
            strpos( $slug, 'wc-' ) === 0 ||
            strpos( $slug, 'woocommerce' ) !== false ||
            strpos( $slug, 'edit.php?post_type=shop_' ) === 0 ||
            strpos( $slug, 'edit.php?post_type=product' ) === 0
        );
        if ( ! $is_woo ) {
            remove_menu_page( $slug );
        }
    }
}
add_action( 'admin_menu', 'bbloomer_filter_admin_menu_for_store_admin', 9999 );

function bbloomer_add_store_admin_param_to_admin_urls( $url, $path, $scheme ) {
    if ( ! isset( $_COOKIE['store_admin'] ) || $_COOKIE['store_admin'] != '1' ) return $url;
    return add_query_arg( 'store_admin', '1', $url ); // purely cosmetic if needed
}
add_filter( 'admin_url', 'bbloomer_add_store_admin_param_to_admin_urls', 10, 3 );

function bbloomer_store_admin_button_styles() {
    ?>
    <style>
        #wp-admin-bar-store-admin-toggle > .ab-item {
            background-color: #d63638;
            color: #fff;
        }
        #wp-admin-bar-store-admin-toggle:hover > .ab-item {
            background-color: #b52d2f;
        }
        #wp-admin-bar-store-admin-toggle > .ab-item .dashicons {
            color: #fff;
        }
    </style>
    <?php
}
add_action( 'admin_head', 'bbloomer_store_admin_button_styles' );