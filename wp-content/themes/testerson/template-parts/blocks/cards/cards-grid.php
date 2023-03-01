<?php

/**
 * Cards Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cards-grid-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cards-grid';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$cards = get_field('cards');

// var_dump($cards);

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container mx-auto">
        <?php foreach ($cards as $card) : ?>
            <div class="card relative <?php echo $card['icon_hover'] ? "" : "no-hover-icon"; ?> ">
                <?php if (!empty($card['link'])) : ?>
                    <a href="<?php echo $card['link']; ?>" class="card-link absolute h-full w-full"> </a>
                <?php endif; ?>
                <?php if ($card['icon']) : ?>
                    <div class="card-icon">
                        <picture>
                            <?php if ($card['icon_mobile']) : ?>
                                <source media="(max-width: 768px)" srcset="<?php echo $card['icon_mobile']['url']; ?>" />
                            <?php endif; ?>
                            <img alt="<?php echo !empty($card['icon']['alt']) ? $card['icon']['alt'] : $card['title']; ?>" src="<?php echo $card['icon']['url']; ?>" />
                        </picture>
                    </div>
                <?php endif; ?>
                <?php if ($card['icon_hover']) : ?>
                    <div class="hover-card-icon">
                        <picture>
                            <?php if ($card['icon_hover_mobile']) : ?>
                                <source media="(max-width: 768px)" srcset="<?php echo $card['icon_hover_mobile']['url']; ?>" />
                            <?php endif; ?>
                            <img alt="<?php echo !empty($card['icon_hover']['alt']) ? $card['icon_hover']['alt'] : $card['title']; ?>" src="<?php echo $card['icon_hover']['url']; ?>" />
                        </picture>
                    </div>
                <?php endif; ?>
                <h3 class="card-title">
                    <?php echo  $card['title']; ?>
                </h3>
                <div class="card-description">
                    <?php echo  $card['description']; ?>
                </div>
                <?php if ($card['ctas']) : ?>
                    <div class="card-cta">
                        <?php foreach ($card['ctas'] as $ctas) : ?>
                            <a href="<?php echo $ctas['link']; ?>" class="<?php echo getButtonClass($ctas['style']); ?>">
                                <?php echo $ctas['text']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>