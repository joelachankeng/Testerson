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
            'menu-1' => esc_html__('Primary', 'TestersonTheme'),
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

    if (file_exists(get_template_directory() . '/build/js/script.js')) {

        wp_enqueue_script('testersontheme-js-main', get_template_directory_uri() . '/build/js/script.js', array(), false, true);
    } else {
        wp_enqueue_script('testersontheme-js-main', get_template_directory_uri() . '/dist/js/script.js', array(), false, true);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'testersontheme_scripts');
