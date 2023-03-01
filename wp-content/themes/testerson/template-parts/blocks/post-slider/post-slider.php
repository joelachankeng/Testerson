<?php

/**
 * Posts Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'posts-slider-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'posts-slider';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$all_posts = get_field('posts');
if (!($all_posts)) {

    $all_posts = get_posts([
        'numberposts'      => -1,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'post_type'        => 'post',
        'post_status'      => 'publish',
    ]);
}
// var_dump($all_posts);

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container mx-auto">
        <div class="posts-slides">
            <?php foreach ($all_posts as $__post) :
                $image_id = get_post_thumbnail_id($__post->ID);
                $image_url = wp_get_attachment_url($image_id);
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                if (empty($image_alt) || !isset($image_alt)) $image_alt = $__post->post_name;
            ?>
                <div class="post-slide">
                    <a href="<?php echo get_the_permalink($__post); ?>" class="post-image">
                        <div class="overlay">
                            <p> See More</p>
                        </div>
                        <?php if ($image_url) : ?>
                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                        <?php else : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        <?php endif; ?>
                    </a>
                    <a href="<?php echo get_the_permalink($__post); ?>" class="post-title"><?php echo $__post->post_name; ?></a>
                    <div class="post-description">
                        <?php echo get_the_excerpt($__post); ?>
                    </div>
                    <a href="<?php echo get_the_permalink($__post); ?>" class="button button-arrow">See more</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>