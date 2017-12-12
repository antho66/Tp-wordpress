<?php
/**
 * lastestTp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lastestTp
 */

if ( ! function_exists( 'lastesttp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lastesttp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lastestTp, use a find and replace
		 * to change 'lastesttp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lastesttp', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'lastesttp' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'lastesttp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'lastesttp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lastesttp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lastesttp_content_width', 640 );
}
add_action( 'after_setup_theme', 'lastesttp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lastesttp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lastesttp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lastesttp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'float_left Sidebar',
		'id'            => 'left_sidebar',
		'description'   => 'Sidebar de gauche',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="left-widget-title">',
		'after_title'   => '</h3>',											
	) );

	register_sidebar( array(
		'name'          => 'float_right Sidebar',
		'id'            => 'right_sidebar',
		'description'   => 'Sidebar de droite',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="right-widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'lastesttp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lastesttp_scripts() {
	wp_enqueue_style( 'lastesttp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lastesttp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lastesttp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lastesttp_scripts' );

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

add_action( 'wp_enqueue_scripts', 'montheme_loadScript' );
function montheme_loadScript() {
	wp_enqueue_script( 'sliderscript', get_template_directory_uri() . '/js/sliderui.js', array("jquery"), '1.0', true );//ajouter un script
}




add_action( 'init', 'codex_book_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_book_init() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain'),
		'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain'),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'ajoute une nouvelle realisation' ),
		'new_item'           => __( 'Nouvelle realisation' ),
		'edit_item'          => __( 'Editer un nouveau post custom' ),
		'view_item'          => __( 'Voie le custom post' ),
		'all_items'          => __( 'Ajouter une realisation' ),
		'search_items'       => __( 'Recherche la realisation' ),
		'parent_item_colon'  => __( 'Parent réalisation' ),
		'not_found'          => __( 'Aucune realisation' ),
		'not_found_in_trash' => __( 'Aucune realissation dans la corbeille' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'Realisation', $args );
}

/* Themes */

add_action("admin_menu","generate_themes_menu");
add_action("admin_init","add_option_home_size");
add_action('wp_head', 'get_custom_size');



 


function generate_themes_menu(){
	add_menu_page(
	  "Tp themes",
	  "Tp themes",
	  "administrator",
	  "Tp_theme_menu",
	  "generate_themes_menu_page", 
	  "dashicons-hammer",
	  60
	);
 }
 function generate_themes_menu_page(){
	if(isset($_POST['sizeH1'])) {
		update_option('sizeH1', $_POST['sizeH1']);
		echo get_option('sizeH1');
	}
	?>
	<h1>Administration de Tp themes</h1>

	<h2>page d'accueil</h2>

		<form method="post">

		Changer la taille de la police  des h1 :

			<select name="sizeH1">

			<?php  for( $i=1 ; $i < 16; $i++ ){ ?>
			<option value="<?= $i ?>"><?= $i ?> em</option>
			
			<?php }	?>
			</select>


			<input type="submit" value="Modifier">

		</form>
			
	

		<?php } ?>


 }


 <?php

function get_custom_size(){
	$css = '';
	$h1 = get_option('sizeH1');
	
	if ($h1) {
		$css .= 'h1 { font-size:'.$h1.'em; }';
	}
	echo"<style>";
	   echo $css;
	echo"</style>";
}

function addcustomCss() {
	wp_enqueue_style( 'style', get_custom_size() );
}
add_action( 'wp_enqueue_scripts', 'addcustomCss' );