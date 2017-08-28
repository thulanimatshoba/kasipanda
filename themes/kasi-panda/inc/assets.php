<?php

if ( ! function_exists( 'kasi_panda_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kasi_panda_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kasi Panda, use a find and replace
		 * to change 'kasi-panda' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kasi-panda', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'kasi-panda' ),
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
		add_theme_support( 'custom-background', apply_filters( 'kasi_panda_custom_background_args', array(
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
add_action( 'after_setup_theme', 'kasi_panda_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kasi_panda_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kasi_panda_content_width', 640 );
}
add_action( 'after_setup_theme', 'kasi_panda_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kasi_panda_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kasi-panda' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kasi-panda' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kasi_panda_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kasi_panda_scripts() {
	wp_enqueue_style( 'kasi-panda-style', get_stylesheet_uri() );

	wp_enqueue_style( 'kasi-panda-uikit-min', get_stylesheet_directory_uri() . '/css/uikit.min.css', array( 'kasi-panda-style' ), '20170716' );

	wp_enqueue_style( 'kasi-panda-uikit', get_stylesheet_directory_uri() . '/css/uikit.css', array( 'kasi-panda-style' ), '20170716' );

	wp_enqueue_script( 'kasi-panda-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kasi-panda-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'kasi-panda-uikit-min', get_template_directory_uri() . '/js/uikit.min.js', array(), '20170716', true );

	wp_enqueue_script( 'kasi-panda-uikit', get_template_directory_uri() . '/js/uikit.js', array(), '20170716', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kasi_panda_scripts' );



/** Thulani Matshoba **/


/*
     *      Header image
     */
$defaults = array(
    'width' => 3000,
    'height' => 295,
);
add_theme_support('custom-header', $defaults);


/*
 *      Title for posts page
 */
function posts_page_title()
{
    $posts_page = get_option('page_for_posts');
    $title = get_post($posts_page)->post_title;
    echo $title;
}

/*
 *      Short title for posts
 */
function short_title($after = '', $length)
{
    $mytitle = get_the_title();
    if (mb_strlen($mytitle) > $length) {
        $mytitle = substr($mytitle, 0, $length);
        echo $mytitle . $after;
    } else echo $mytitle;
}


/*
*      Length for post excerpts
*/
function custom_excerpt_length($length)
{
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');


/*
 *      Replacing the excerpt "more" text by a link
 */
function new_excerpt_more($more)
{
    return '<p class="more-link-wrap"><a class="more-link" href="' . get_permalink($post->ID) . '">Read more</a><p>';
}

add_filter('excerpt_more', 'new_excerpt_more');



// Remove help and screen context & Options
// http://wordpress.stackexchange.com/questions/73561/how-to-remove-all-widgets-from-dashboard
add_filter('contextual_help', 'wpse_25034_remove_dashboard_help_tab', 999, 3);
add_filter('screen_options_show_screen', 'wpse_25034_remove_help_tab');

function wpse_25034_remove_dashboard_help_tab($old_help, $screen_id, $screen)
{
    if ('dashboard' != $screen->base)
        return $old_help;
    $screen->remove_help_tabs();
    return $old_help;
}

function wpse_25034_remove_help_tab($visible)
{
    global $current_screen;
    if ('dashboard' == $current_screen->base)
        return false;
    return $visible;
}

/* ------------------------------------------------------ */


/* ------------------------------------------------------ */
// Stop TinyMCE in WordPress 3.x messing up your HTML code
// http://www.leighton.com/blog/stop-tinymce-in-wordpress-3-x-messing-up-your-html-code
function override_mce_options($initArray)
{
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}

add_filter('tiny_mce_before_init', 'override_mce_options');
/* ------------------------------------------------------ */


//Adds Custom Text On the Admin Bar
add_action('adminmenu', 'se26675378_adminmenu');
function se26675378_adminmenu()
{
    echo '<p class="animated jello">Thulani Matshoba Site</p>';
}


//Add Custom Dashboard Widget in Backend
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets()
{
    global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', 'Ask Thulani For Support', 'custom_dashboard_help');
}

function custom_dashboard_help()
{
    echo '<p>Welcome to Your Custom Theme! Need help? Contact the developer <a href="mailto:thulani90.m@gmail.com">here</a>. Or Call: <a href="tel://27-76-719-5285" target="_blank">Thulani Matshoba</a></p><br>
<ul>
<li><b>Developed By:</b> Thulani Matshoba</li>
<li><b>Website:</b> <a href="http://www.divas-collection.co.za">www.thulanimatshoba.co.za</a></li>
<li><b>Email:</b> <a href="mailto:thulani90.m@gmail.com">thulani90.m@gmail.com</a></li>';
}

//Change the Howdy Message accoding to holidays
function public_holiday()
{
    $date = date('d-m');
    switch ($date) {
        case '01-01':
            $message = 'Happy New Years';
            break;

        case '16-06':
            $message = 'Happy Youth Day';
            break;

        case '25-12':
            $message = 'Merry Christmas';
            break;

        default:
            $message = 'Welcome';
    }
    return $message;
}

function howdy_message($translated_text, $text, $domain)
{
    $message = public_holiday();
    $new_message = str_replace('Howdy', $message, $text);
    return $new_message;
}

add_filter('gettext', 'howdy_message', 10, 3);


/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function example_customizer($wp_customize)
{
    $wp_customize->add_section(
        'example_section_one',
        array(
            'title' => 'Copyrights & Logo',
            'description' => 'This is a settings section.',
            'priority' => 35,
        )
    );

    $wp_customize->add_setting(
        'copyright_textbox',
        array(
            'default' => 'Default copyright text',
            'sanitize_callback' => 'example_sanitize_text',
        )
    );

    function example_sanitize_text($input)
    {
        return wp_kses_post(force_balance_tags($input));
    }

    function example_sanitize_checkbox($input)
    {
        if ($input == 1) {
            return 1;
        } else {
            return '';
        }
    }

    $wp_customize->add_control(
        'copyright_textbox',
        array(
            'label' => 'Copyright text',
            'section' => 'example_section_one',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'hide_copyright'
    );

    $wp_customize->add_control(
        'hide_copyright',
        array(
            'type' => 'checkbox',
            'label' => 'Hide copyright text',
            'section' => 'example_section_one',
        )
    );

    $wp_customize->add_section('themeslug_logo_section', array(
        'title' => __('Logo', 'themeslug'),
        'priority' => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header, the logo must be 300 x 100',
    ));

    $wp_customize->add_setting('themeslug_logo');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themeslug_logo', array(
        'label' => __('Logo', 'themeslug'),
        'section' => 'themeslug_logo_section',
        'settings' => 'themeslug_logo',
    )));


//Logo Placement
    $wp_customize->add_setting(
        'logo_placement',
        array(
            'default' => 'left',
        )
    );

    $wp_customize->add_control(
        'logo_placement',
        array(
            'type' => 'radio',
            'label' => 'Logo placement',
            'section' => 'example_section_one',
            'choices' => array(
                'left' => 'Left',
                'right' => 'Right',
                'center' => 'Center',
            ),
        )
    );

    function example_sanitize_logo_placement($input)
    {
        $valid = array(
            'left' => 'Left',
            'right' => 'Right',
            'center' => 'Center',
        );

        if (array_key_exists($input, $valid)) {
            return $input;
        } else {
            return '';
        }
    }

    function example_sanitize_powered_by($input)
    {
        $valid = array(
            'Thulani Matshoba' => 'Thulani Matshoba',
            'Linami Logistics' => 'Linami Logistics',
        );

        if (array_key_exists($input, $valid)) {
            return $input;
        } else {
            return '';
        }
    }


//***************************************************************************** Site-Colours
    function Ari_customize_register($wp_customize)
    {
        //All our sections, settings, and controls will be added here
    }

    add_action('customize_register', 'Ari_customize_register');

    $colors = array();
    $colors[] = array(
        'slug' => 'header_link_color',
        'default' => '#fff',
        'label' => __('Header Link Color', 'Ari')
    );
    $colors[] = array(
        'slug' => 'content_text_color',
        'default' => '#333',
        'label' => __('Content Text Color', 'Ari')
    );
    $colors[] = array(
        'slug' => 'content_link_color',
        'default' => '#1e73be',
        'label' => __('Content Link Color', 'Ari')
    );
    $colors[] = array(
        'slug' => 'footer_link_color',
        'default' => '#1e73be',
        'label' => __('Footer Link Color', 'Ari')
    );

    foreach ($colors as $color) {
        // SETTINGS
        $wp_customize->add_setting(
            $color['slug'], array(
                'default' => $color['default'],
                'type' => 'option',
                'capability' =>
                    'edit_theme_options'
            )
        );
        // CONTROLS
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $color['slug'],
                array('label' => $color['label'],
                    'section' => 'colors',
                    'settings' => $color['slug'])
            )
        );
    }

    if ($wp_customize->is_preview() && !is_admin()) {
        add_action('wp_footer', 'example_customize_preview', 21);
    }

    function example_customize_preview()
    {
        ?>
        <script type="text/javascript">
            (function ($) {
                wp.customize('featured-background', function (value) {
                    value.bind(function (to) {
                        $('#featured').css('background-color', to);
                    });
                });
            })(jQuery)
        </script>
        <?php
    }  // End function example_customize_preview()

    $wp_customize->get_setting('blogname')->transport = 'postMessage';


    /**
     * Adds textarea support to the theme customizer
     */
    class Example_Customize_Textarea_Control extends WP_Customize_Control
    {
        public $type = 'textarea';

        public function render_content()
        {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5"
                          style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }
    }


//Header Textarea
    class Ari_Customize_Textarea_Control extends WP_Customize_Control
    {
        public $type = 'textarea';

        public function render_content()
        {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5"
                          style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }
    }

    $wp_customize->add_setting('textarea_setting', array('default' => 'default text',));
    $wp_customize->add_control(new Ari_Customize_Textarea_Control($wp_customize, 'textarea_setting', array(
        'label' => 'Telephone number & Email',
        'section' => 'content',
        'settings' => 'textarea_setting',
    )));
    $wp_customize->add_section('content', array(
        'title' => __('Top Contact Details', 'Ari'),
    ));


// Developed By Code
    $wp_customize->add_setting(
        'developed_by',
        array(
            'default' => 'Thulani Matshoba',
        )
    );

    $wp_customize->add_control(
        'developed_by',
        array(
            'type' => 'select',
            'label' => 'This site is Developed by:',
            'section' => 'example_section_one',
            'choices' => array(
                'Thulani Matshoba' => 'Thulani Matshoba',
                'Linami Logistics' => 'Linami Logistics',
                'Skinny Ninja' => 'Skinny Ninja',
            ),
        )
    );

// Sidebar Layout Code Starts here

    $wp_customize->add_setting('sidebar_position', array());
    $wp_customize->add_control('sidebar_position', array(
        'label' => __('Sidebar Position', 'Ari'),
        'section' => 'layout',
        'settings' => 'sidebar_position',
        'type' => 'radio',
        'choices' => array(
            'left' => 'Left Sidebar',
            'right' => 'Right Sidebar',
        ),
    ));
    $wp_customize->add_section('layout', array(
        'title' => __('Sidebar Layout', 'Ari'),
    ));
// SIdebars Code END Here
}

add_action('init', 'my_register_nav_menus');

function my_register_nav_menus()
{
    register_nav_menu('social', __('Social', 'example-textdomain'));
}

/*Adds Background Image */

add_theme_support('custom-background');

/**
 * Adds an option to the theme customizer for full screen backgrounds.
 * Disabled by default.
 */
function basic_backstretch_customizer_register($wp_customize)
{

    // Add full screen background option
    $wp_customize->add_setting('basic-backstretch', array(
        'default' => 10,
        'type' => 'option'
    ));

    // This will be hooked into the default background_image section
    $wp_customize->add_control('basic-backstretch', array(
        'settings' => 'basic-backstretch',
        'label' => __('Full Screen Background', 'liftoff'),
        'section' => 'background_image',
        'type' => 'checkbox'
    ));
}

/**
 * Checks if a background image is present and if full screen background option is set.
 * If so, required scripts are loaded.
 */
function basic_backstretch()
{

    if (get_background_image() && get_option('basic-backstretch')) {

        // Registers the backstretch script
        wp_register_script('basic-backstretch-js', get_template_directory_uri() . '/js/jquery.backstretch.js', array('jquery'), '20130930', true);

        // Enqueues the script
        wp_enqueue_script('basic-backstretch-js');

        // Adds a javascript object with the background image URL
        // This is used to load the image after other images on page have finished
        wp_localize_script('basic-backstretch-js', 'basicbackstretch', array(
            'background' => esc_url(get_background_image())
        ));

        // Remove the background image from being included in inline styles
        // Uses http://codex.wordpress.org/Plugin_API/Filter_Reference/theme_mod_$name
        add_filter('theme_mod_background_image', 'backstretch_background_image_mod');

        // Add script to load backstretch in the footer
        add_action('wp_footer', 'basic_backstretch_inline_script', 100);
    }
}

add_action('wp_enqueue_scripts', 'basic_backstretch');

/**
 * Inline script will load the full screen background image after all other images
 * on the page have loaded.
 */
function basic_backstretch_inline_script()
{ ?>
    <script>
        jQuery(window).load(function () {
            jQuery.backstretch(basicbackstretch.background, {speed: 300});
        });
    </script>
<?php }

/**
 * Keeps inline styles for the background image from outputting in the header
 *
 * Works similar to the pre_option filter
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/pre_option_(option_name)
 */

function backstretch_background_image_mod()
{
    return false;
}

// Add custom background callback for background color

function custom_background_callback()
{

    if (!get_background_color())
        return;

    printf('<style>body { background-color: #%s; }</style>' . "\n", get_background_color());
}

add_action('customize_register', 'example_customizer');

add_action('customize_register', 'basic_backstretch_customizer_register');


// My Custom Code ENDS here... Thulani Matshoba

////////////////////////////////////////////////////////////////////////////////////////


/** Add Buttons To The Visual Editor */
function dh_enable_more_buttons($buttons)
{
    $buttons[] = 'hr';
    $buttons[] = 'sub';
    $buttons[] = 'sup';
    $buttons[] = 'fontselect';
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'cleanup';
    $buttons[] = 'styleselect';
    $buttons[] = 'cut';
    $buttons[] = 'copy';
    $buttons[] = 'paste';
    return $buttons;
}

add_filter('mce_buttons_3', 'dh_enable_more_buttons');


//Track Post Views
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Wordpress login page Customisation
function my_loginlogo()
{
    echo '<style type="text/css">
    h1 {
      background-image: url(' . get_template_directory_uri() . '/web-logo.png) !important;
	  width: 320px !important;
    }

	h1 a {
	  background: none !important;
	  width: 320px !important;
	}
  </style>';
}

add_action('login_head', 'my_loginlogo');

function my_loginbackground()
{
    echo '<style type="text/css">
    body.login {
    background-image: url(' . get_template_directory_uri() . '/home-parallax1.jpg) !important;
	background-repeat: no-repeat;
    background-size: cover;
    background-position: 40% 85%;
}
    }
  </style>';
}

add_action('login_head', 'my_loginbackground');

function my_loginform()
{
    echo '<style type="text/css">
    .login form {
      background: rgba(255, 255, 255, 0.48) none repeat scroll 0% 0% !important;
    }
  </style>';
}

add_action('login_head', 'my_loginform');


function my_loginURL()
{
    return 'http://thulanimatshoba.co.za';
}

add_filter('login_headerurl', 'my_loginURL');


function my_loginURLtext()
{
    return 'Skinny Ninja Themes';
}

add_filter('login_headertitle', 'my_loginURLtext');


// END of Login page code


function my_loginfooter()
{ ?>
    <p style="text-align: center; margin-top: 1em;">
        <a style="color: #f00; text-decoration: none;" href="http://thulanimatshoba.co.za/contacts/">If you have any
            questions, contact us here
        </a>
    </p>
<?php }

add_action('login_footer', 'my_loginfooter');


//Removes the br tags generated by the columns plugin

function webtreats_formatter($content)
{
    $new_content = '';

    /* Matches the contents and the open and closing tags */
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';

    /* Matches just the contents */
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

    /* Divide content into pieces */
    $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

    /* Loop over pieces */
    foreach ($pieces as $piece) {
        /* Look for presence of the shortcode */
        if (preg_match($pattern_contents, $piece, $matches)) {

            /* Append to content (no formatting) */
            $new_content .= $matches[1];
        } else {

            /* Format and append to content */
            $new_content .= wptexturize(wpautop($piece));
        }
    }

    return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'webtreats_formatter', 99);
add_filter('widget_text', 'webtreats_formatter', 99);

//Ends br tags code


//Long posts should require a higher limit, see http://core.trac.wordpress.org/ticket/8553
@ini_set('pcre.backtrack_limit', 500000);


// change administration panel footer
function change_footer_admin()
{
    echo 'For Support, Please Call 076 719 5285 or email Thulani Matshoba here <a href="mailto:thulani90.m@gmail.com">thulani90.m@gmail.com</a>';
}

add_filter('admin_footer_text', 'change_footer_admin');
