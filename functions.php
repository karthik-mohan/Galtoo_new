<?php
add_action('after_setup_theme', 'legalhelp_bunch_theme_setup');
function legalhelp_bunch_theme_setup()
{
	global $wp_version;
	if(!defined('LEGALHELP_VERSION')) define('LEGALHELP_VERSION', '1.0');
	if( !defined( 'LEGALHELP_ROOT' ) ) define('LEGALHELP_ROOT', get_template_directory().'/');
	if( !defined( 'LEGALHELP_URL' ) ) define('LEGALHELP_URL', get_template_directory_uri().'/');	
	include_once get_template_directory() . '/includes/loader.php';

	load_theme_textdomain('legalhelp', get_template_directory() . '/languages');
	
	//ADD THUMBNAIL SUPPORT
	add_theme_support('post-thumbnails');
	//add_theme_support('menus'); //Add menu support
	add_theme_support('automatic-feed-links'); //Enables post and comment RSS feed links to head.
	add_theme_support('widgets'); //Add widgets and sidebar support
	add_theme_support( "title-tag" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	/** Register wp_nav_menus */
	if(function_exists('register_nav_menu'))
	{
		register_nav_menus(
			array(
				/** Register Main Menu location header */
				'main_menu' => esc_html__('Main Menu', 'legalhelp'),
			)
		);
	}
	if ( ! isset( $content_width ) ) $content_width = 960;
	add_image_size( 'legalhelp_380x300', 380, 300, true ); // '380x300 Gallery'
	add_image_size( 'legalhelp_371x226', 371, 226, true ); // '371x226 Blog'
	add_image_size( 'legalhelp_80x65', 80, 65, true ); // '80x65 gallery Widget'
	add_image_size( 'legalhelp_72x72', 72, 72, true ); // '72x72 Post Widget'
	add_image_size( 'legalhelp_270x260', 270, 260, true ); // '270x260 Team'
	add_image_size( 'legalhelp_1200x313', 1200, 313, true ); // '1200x313 Blog Pages'
	add_image_size( 'legalhelp_190x120', 190, 120, true ); // '190x120 product carousel'
}
function legalhelp_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'legalhelp' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'legalhelp' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'legalhelp' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'legalhelp' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'legalhelp' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'legalhelp' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'legalhelp' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'legalhelp' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'legalhelp' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'legalhelp_gutenberg_editor_palette_styles' );
function legalhelp_bunch_widget_init()
{
	global $wp_registered_sidebars;
	$theme_options = _WSH()->option();
	
	register_sidebar(array(
	  'name' => esc_html__( 'Default Sidebar', 'legalhelp' ),
	  'id' => 'default-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'legalhelp' ),
	  'class'=>'',
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Footer Sidebar', 'legalhelp' ),
	  'id' => 'footer-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown in Footer Area.', 'legalhelp' ),
	  'class'=>'',
	  'before_widget'=>'<div id="%1$s"  class="col-md-3 col-sm-6 col-xs-12 column footer-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>'
	));
	
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'legalhelp' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'legalhelp' ),
	  'class'=>'',
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<div class="sidebar-title"><h3>',
	  'after_title' => '</h3></div>'
	));
	if( !is_object( _WSH() )  )  return;
	$sidebars = legalhelp_set(legalhelp_set( $theme_options, 'dynamic_sidebar' ) , 'dynamic_sidebar' ); 
	foreach( array_filter((array)$sidebars) as $sidebar)
	{
		if(legalhelp_set($sidebar , 'topcopy')) continue ;
		
		$name = legalhelp_set( $sidebar, 'sidebar_name' );
		
		if( ! $name ) continue;
		$slug = legalhelp_bunch_slug( $name ) ;
		
		register_sidebar( array(
			'name' => $name,
			'id' =>  sanitize_title($slug) ,
			'before_widget' => '<div id="%1$s" class="side-bar widget sidebar_widget %2$s">',
			'after_widget' => "</div>",
			'before_title' => '<div class="sec-title"><h3 class="skew-lines">',
			'after_title' => '</h3></div>',
		) );		
	}
	
	update_option('wp_registered_sidebars' , $wp_registered_sidebars) ;
}
add_action( 'widgets_init', 'legalhelp_bunch_widget_init' );
// Update items in cart via AJAX
function legalhelp_load_head_scripts() {
    $options = _WSH()->option();
	if ( !is_admin() ) {
	$protocol = is_ssl() ? 'https://' : 'http://';	
	if(legalhelp_set($options, 'map_api_key')){
	$map_path = '?key='.legalhelp_set($options, 'map_api_key');
	wp_enqueue_script( 'map-api', ''.$protocol.'maps.google.com/maps/api/js'.$map_path, array(), false, false );
	}
	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(), false, false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respond-min', get_template_directory_uri().'/js/respond.js', array(), false, false );
	wp_script_add_data( 'respond-min', 'conditional', 'lt IE 9' );
    }
    }
add_action( 'wp_enqueue_scripts', 'legalhelp_load_head_scripts' );
//global variables
function legalhelp_bunch_global_variable() {
    global $wp_query;
}

function legalhelp_enqueue_scripts() {
	$options = _WSH()->option();
	
   wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover.css');
	wp_enqueue_style( 'jquery-datepick', get_template_directory_uri() . '/css/jquery.datepick.css');
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css');
	wp_enqueue_style( 'bootstrap-margin', get_template_directory_uri() . '/css/bootstrap-margin-padding.css' );
	wp_enqueue_style( 'datepicker', get_template_directory_uri() . '/css/datepicker.css');
	wp_enqueue_style( 'revolution', get_template_directory_uri() . '/css/revolution-slider.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.css' );
	wp_enqueue_style( 'legalhelp-main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'legalhelp-custom-style', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'legalhelp-tut-style', get_template_directory_uri() . '/css/tut.css' );
	wp_enqueue_style( 'legalhelp-gb-style', get_template_directory_uri() . '/css/gutenberg.css' );
	wp_enqueue_style( 'legalhelp-responsive', get_template_directory_uri() . '/css/responsive.css' );

    //scripts
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/js/owl.js', array(), false, true );
	wp_enqueue_script( 'plugin', get_template_directory_uri().'/js/jquery.plugin.min.js', array(), false, true );
	wp_enqueue_script( 'datepick', get_template_directory_uri().'/js/jquery.datepick.min.js', array(), false, true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/js/jquery.appear.js', array(), false, true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri().'/js/jquery.mixitup.min.js', array(), false, true );
	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/js/wow.js', array(), false, true );
	wp_enqueue_script( 'bx-slider', get_template_directory_uri().'/js/bxslider.js', array(), false, true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array(), false, true );
	wp_enqueue_script( 'legalhelp-script', get_template_directory_uri().'/js/script.js', array(), false, true );
	
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
}
add_action( 'wp_enqueue_scripts', 'legalhelp_enqueue_scripts' );

/*-------------------------------------------------------------*/
function legalhelp_theme_slug_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $playfair = _x( 'on', 'Playfair font: on or off', 'legalhelp' );
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'legalhelp' );
	$raleway = _x( 'on', 'Raleway font: on or off', 'legalhelp' );
	
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'legalhelp' );
 
    if ( 'off' !== $playfair || 'off' !== $open_sans || 'off' !== $montserrat || 'off' !== $raleway ) {
        $font_families = array();
 
        if ( 'off' !== $playfair ) {
            $font_families[] = 'Playfair Display:400,400italic,700,700italic';
        }
		
		if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }
		
		if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic';
        }
		
		if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:400,500,600,700,800';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}
function legalhelp_theme_slug_scripts_styles() {
    wp_enqueue_style( 'legalhelp-theme-slug-fonts', legalhelp_theme_slug_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'legalhelp_theme_slug_scripts_styles' );
add_action( 'admin_enqueue_scripts', 'legalhelp_theme_slug_scripts_styles' );
/*---------------------------------------------------------------------*/
function legalhelp_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'legalhelp_add_editor_styles' );
