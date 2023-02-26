<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '../vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'init', array( $this, 'register_gutenberg_blocks' ) );
		add_action( 'admin_menu',  array( $this, 'remove_default_post_type') );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {
    //PRIDES
    // register_post_type('Prides',
    //     array('labels' => array(
    //         'name' => 'Prides',
    //         'singular_name' => 'Pride',
    //         'all_items' => 'All prides',
    //         'add_new' => 'Add pride',
    //         'add_new_item' => 'Add pride',
    //         'edit_item' => 'Edit pride',
    //         'new_item' => 'New pride',
    //         'view_item' => 'Show pride',
    //         'search_items' => 'search pride',
    //         'not_found' => 'No prides found',
    //         'not_found_in_trash' => 'No prides found',
    //         'parent_item_colon' => ''
    //     ),
    //         'description' => 'Prides',
    //         'publicly_queryable' => true,
    //         'exclude_from_search' => false,
    //         'show_ui' => true,
    //         'query_var' => true,
    //         'menu_position' => 20,
    //         'menu_icon' => 'dashicons-feedback',
    //         'rewrite' => array('slug' => 'prides', 'with_front' => false),
    //         'capability_type' => 'post',
    //         'hierarchical' => false,
    //         //'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions'),
    //         'supports' => array('title'),
    //         'taxonomies' => array('post_tag'),
    //         'show_in_nav_menus' => true,
    //         'public' => true,
    //         //'has_archive' => true,
    //     )
    // );

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

		// $labels = array(
		// 	'name' => _x('Events categories', 'taxonomy general name'),
		// 	'singular_name' => _x('Events category', 'taxonomy singular name'),
		// 	'search_items' => __('Search Events categories'),
		// 	'all_items' => __('All Events categories'),
		// 	'parent_item' => __('Parent Events category'),
		// 	'parent_item_colon' => __('Parent Events category:'),
		// 	'edit_item' => __('Edit Events category'),
		// 	'update_item' => __('Update Events category'),
		// 	'add_new_item' => __('Add New Events category'),
		// 	'new_item_name' => __('New Events category Name'),
		// 	'menu_name' => __('Events categories'),
		// );
	
		// register_taxonomy('events_categories', array('events'), array(
		// 	'hierarchical' => true,
		// 	'labels' => $labels,
		// 	'show_ui' => true,
		// 	'show_admin_column' => true,
		// 	'query_var' => true,
		// 	'rewrite' => array('slug' => 'events-category'),
		// ));
	    
	}

	//blocchi gt
	public function register_gutenberg_blocks() {
		// Bail out if function doesn’t exist.
		if ( ! function_exists( 'acf_register_block' ) ) {
			return;
		}


	}
	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['headerMenu']  = new Timber\Menu('header');
		$context['site']  = $this;
		return $context;
	}

	public function theme_supports() {
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}





















	function remove_default_post_type() {
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );

	}

	

}

new StarterSite();
