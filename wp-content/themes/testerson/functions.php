<?php

/**
 * TestersonTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TestersonTheme
 */

if (!function_exists('testersontheme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function testersontheme_setup()
    {
        // add support for svg upload
        function wp_mime_types($mimes)
        {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }
        add_filter('upload_mimes', 'wp_mime_types');


        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-top' => esc_html__('Top Menu', 'TestersonTheme'),
            'menu-main' => esc_html__('Main Menu', 'TestersonTheme'),
            'footer-main' => esc_html__('Footer Menu', 'TestersonTheme'),
        ));

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ));


        // Adding support for core block visual styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for responsive embeds.
        add_theme_support('responsive-embeds');
    }
endif;
add_action('after_setup_theme', 'testersontheme_setup');


/**
 * Enqueue scripts and styles.
 */
function testersontheme_scripts()
{
    wp_enqueue_style('testersontheme-style', get_stylesheet_uri());

    if (file_exists(get_template_directory() . '/build/css/style.css')) {
        wp_enqueue_style('testersontheme-style-main', get_template_directory_uri() . '/build/css/style.css');
    } else {
        wp_enqueue_style('testersontheme-style-dist', get_template_directory_uri() . '/dist/css/style.css');
    }

    if (file_exists(get_template_directory() . '/build/js/scripts.js')) {
        wp_enqueue_script('testersontheme-js-main', get_template_directory_uri() . '/build/js/scripts.js', array('jquery'), false, true);
    } else {
        wp_enqueue_script('testersontheme-js-main', get_template_directory_uri() . '/dist/js/scripts.js', array('jquery'), false, true);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'testersontheme_scripts');

/**
 * Widgets Registration
 */
function testersontheme_widgets_init()
{
    if (function_exists('register_sidebar')) {
        $footerColumn1 = array(
            'name'          => 'Footer Column 1',
            'id'            => 'footer-column-1',
            'before_widget' => '<div class="footer-column-1">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-column-title">',
            'after_title'   => '</h3>',
        );
        $footerColumn2 = array(
            'name'          => 'Footer Column 2',
            'id'            => 'footer-column-2',
            'before_widget' => '<div class="footer-column-2">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-column-title">',
            'after_title'   => '</h3>',
        );
        $footerColumn3 = array(
            'name'          => 'Footer Column 3',
            'id'            => 'footer-column-3',
            'before_widget' => '<div class="footer-column-3">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-column-title">',
            'after_title'   => '</h3>',
        );
        $footerColumn4 = array(
            'name'          => 'Footer Column 4',
            'id'            => 'footer-column-4',
            'before_widget' => '<div class="footer-column-4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-column-title">',
            'after_title'   => '</h3>',
        );

        $footerFootnote = array(
            'name'          => 'Footer Footnote',
            'id'            => 'footer-footnote',
            'before_widget' => '<div class="footer-footnote">' . '©' . date("Y") . ' ',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-column-title">',
            'after_title'   => '</h3>',
        );

        register_sidebar($footerColumn1);
        register_sidebar($footerColumn2);
        register_sidebar($footerColumn3);
        register_sidebar($footerColumn4);
        register_sidebar($footerFootnote);
    }
}


add_action('widgets_init', 'testersontheme_widgets_init');


/**
 * Block Registration
 */
add_action('acf/init', 'my_acf_init');
function my_acf_init()
{


    // check function exists
    if (function_exists('acf_register_block')) {

        // register the testerson category
        function etesterson_block_category($categories, $post)
        {
            return array_merge(
                array(
                    array(
                        'slug' => 'testerson',
                        'title' => 'testerson',
                    ),
                ),
                $categories,
            );
        }
        add_filter('block_categories_all', 'etesterson_block_category', 10, 2);



        // register a hero block
        acf_register_block(array(
            'name'                            => 'hero',
            'title'                           => __('Hero'),
            'description'                     => __('A hero block'),
            "render_template"                 => "template-parts/blocks/hero/hero.php",
            'category'                        => 'testerson',
            'icon'                            => 'welcome-widgets-menus',
            'keywords'                        => array('hero', 'testerson'),
            'supports'                        => array('align' => 'full',),
            'align'                           => 'full',
            'enqueue_assets'                  => function () {
                wp_enqueue_style('testersontheme-style-dist', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
                wp_enqueue_script('testersontheme-js-main', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), false, true);
            },
        ));

        // register a post slider block
        acf_register_block(array(
            'name'                            => 'posts-slider',
            'title'                           => __('Posts Slider'),
            'description'                     => __('A post slider'),
            "render_template"                 => "template-parts/blocks/post-slider/post-slider.php",
            'category'                        => 'testerson',
            'icon'                            => 'slides',
            'keywords'                        => array('posts', 'slider', 'testerson'),
            'supports'                        => array('align' => 'full',),
            'align'                           => 'full',
            'enqueue_assets'                  => function () {
                wp_enqueue_style('testersontheme-style-dist', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
                wp_enqueue_script('testersontheme-js-main', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), false, true);
            },
        ));

        // register a card grid block
        acf_register_block(array(
            'name'                            => 'cards-grid',
            'title'                           => __('Cards Grid'),
            'description'                     => __('A grid of Cards'),
            "render_template"                 => "template-parts/blocks/cards/cards-grid.php",
            'category'                        => 'testerson',
            'icon'                            => 'slides',
            'keywords'                        => array('cards', 'testerson'),
            'supports'                        => array('align' => 'full',),
            'align'                           => 'full',
        ));
    }
}

function getButtonClass($input)
{
    if (!$input || $input == "white") return "button";
    if ($input == "red") return "button button-inverse";
    if ($input == "blue-arrow") return "button button-arrow";
}
