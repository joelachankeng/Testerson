<?php

/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$hero_slides = get_field('hero_slide');
// var_dump($hero_slides[0]);

if (count($hero_slides) == 1) : ?>
    <style type="text/css">
        #<?php echo $id . " "; ?>.slick-dots {
            display: none;
        }
    </style>
<?php endif; ?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="hero-slider w-full">
        <?php foreach ($hero_slides as $hero_slide) : ?>
            <div class="hero-slide w-full">
                <div class="hero-bg">
                    <div class="hero-overlay"></div>
                    <picture>
                        <?php if (!empty($hero_slide['slide_background_mobile']['url'])) : ?>
                            <source media="(max-width: 768px)" srcset="<?php echo $hero_slide['slide_background_mobile']['url']; ?>" />
                        <?php endif; ?>
                        <img alt="<?php echo !empty($hero_slide['slide_background']['alt']) ? $hero_slide['slide_background']['alt'] : $hero_slide['slide_title']; ?>" src="<?php echo $hero_slide['slide_background']['url']; ?>" />
                    </picture>
                </div>
                <div class="hero-content">
                    <div class="container mx-auto">
                        <h1 class="hero-title"><?php echo $hero_slide['slide_title']; ?></h1>
                        <p class="hero-subcopy">
                            <?php echo $hero_slide['slide_description']; ?>
                        </p>
                        <div class="hero-cta">
                            <?php foreach ($hero_slide['ctas'] as $ctas) : ?>
                                <a href="<?php echo $ctas['link']; ?>" class="<?php echo getButtonClass($ctas['style']); ?>">
                                    <?php echo $ctas['text']; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="hero-bottom-slash">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>