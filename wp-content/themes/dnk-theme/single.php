<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="gallery before_after_grid inner_page" id="gallery">
    <div class="containerFullWidth">
        <h3 class="section_title"><?php echo __('Результат поиска'); ?></h3>
        <div class="slider_content">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php $slider = get_field('slider', get_the_ID()); ?>
                    <?php if(!empty($slider)): ?>
                        <div class="slider slider_list owl-carousel">
                            <?php foreach($slider as $slide): ?>
                                <a href="<?php echo $slide['image']; ?>" class="slider_link">
                                    <img src="<?php echo $slide['image']; ?>" alt="" class="slider_image">
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
