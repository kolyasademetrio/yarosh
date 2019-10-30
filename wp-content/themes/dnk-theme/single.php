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
    <div class="containerFullWidth containerCenter">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <h3 class="section_title"><?php the_title(); ?></h3>
                <div class="section_description"><?php the_content(); ?></div>
                <div class="slider_content">
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
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>
