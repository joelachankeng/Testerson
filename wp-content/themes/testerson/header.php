<?php

/**
 * The header for the theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TestersonTheme
 */
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (getenv('HTTPS') === 'on') : ?>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <?php endif; ?>


    <!-- google font - montserrat-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'TestersonTheme'); ?></a>
        <header class="main-header">
            <nav class="top-navigation bg-bg-darkGrey py-3">
                <div class="container mx-auto">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-top',
                        'menu_class' => "flex justify-end items-center text-white gap-11",
                    ));

                    ?>
                </div>
            </nav>
            <nav class="main-navigation">
                <div class="container mx-auto mt-9 flex items-center justify-between">
                    <div>
                        <a href="/" class="logo-container flex items-start">
                            <img class=" h-16 w-16 object-contain object-top" src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                            <div class="site-title flex flex-col">
                                <p class="m-0 font-extrabold text-5xl lead">Testerson</p>
                                <span class="tagline text-xl leading-6 uppercase text-end -mt-2 ">Printing</span>
                            </div>
                        </a>
                    </div>

                    <div class="main-menu flex items-center justify-between gap-16 ">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-main',
                            'menu_class' => "flex justify-end items-center text-white gap-16",
                        ));

                        ?>
                        <div class="search-button-container">
                            <input type="text" id="header-search-field" class="hidden">
                            <button class="search-button">
                                Search
                            </button>
                        </div>
                        <div class="mobile-menu-actions hidden">
                            <ul class="mobile-actions">
                                <li id="mobile-search-item">
                                    <label for="mobile-search">Search</label>
                                    <button id="mobile-search"></button>
                                </li>
                                <li id="mobile-toggle-item">
                                    <label for="mobile-toggle">Menu</label>
                                    <div id="mobile-toggle" class="">
                                        <span></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu hidden">
                    <div class="container mx-auto">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-main',
                            'menu_class' => "flex justify-end items-center",
                            'container_class' => 'menu-mobile-main-menu-container'
                        ));

                        ?>
                    </div>

                </div>
            </nav>
        </header>