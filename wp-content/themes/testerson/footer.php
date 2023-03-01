<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TestersonTheme
 */
$custom_logo_id = get_theme_mod('custom_logo');
$image = wp_get_attachment_image_src($custom_logo_id, 'full');


?>

<footer id="footer">
    <div class="footer-bg"></div>
    <nav class="footer-navigation">
        <div class="container mx-auto">

            <div class="footer-row">
                <div class="footer-col">
                    <div class="logo-container">
                        <a href="/" class="logo-container text-white flex items-start">
                            <img class=" h-16 w-16 object-contain object-top" src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                            <div class="site-title flex flex-col">
                                <p class="m-0 font-extrabold text-5xl lead">Testerson</p>
                                <span class="tagline text-xl leading-6 uppercase text-end -mt-2 ">Printing</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="footer-col">

                </div>
                <div class="footer-col">
                    <div class="slogan text-white">
                        <span>Share. Educate. Sell.</span>
                        <p>Think Print</p>
                    </div>
                </div>
                <div class="footer-col">

                </div>
            </div>
            <div class="footer-row my-12">
                <div class="footer-col">
                </div>
                <div class="footer-col">
                </div>
                <div class="footer-col">
                    <div class="footer-border"></div>
                </div>
                <div class="footer-col">
                    <div class="footer-border"></div>
                </div>
            </div>
            <div class="footer-row">
                <div class="footer-col">
                    <?php if (is_active_sidebar('footer-column-1')) : ?>
                        <?php dynamic_sidebar('footer-column-1'); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-col">
                    <?php if (is_active_sidebar('footer-column-2')) : ?>
                        <?php dynamic_sidebar('footer-column-2'); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-col">
                    <?php if (is_active_sidebar('footer-column-3')) : ?>
                        <?php dynamic_sidebar('footer-column-3'); ?>
                    <?php endif; ?>
                </div>
                <div class="footer-col">
                    <?php if (is_active_sidebar('footer-column-4')) : ?>
                        <?php dynamic_sidebar('footer-column-4'); ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </nav>
    <div class="footnote">
        <div class="container mx-auto">
            <?php if (is_active_sidebar('footer-footnote')) : ?>
                <?php dynamic_sidebar('footer-footnote'); ?>
            <?php endif; ?>
        </div>
    </div>

    </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>