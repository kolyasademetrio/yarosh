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
        <div class="items_content">

            <?php if ( have_posts() ) : ?>
            <?php $galleryInRow = 3; ?>
            <ul class="items_list columns_<?php echo $galleryInRow; ?>">
                <?php
                $index = 0;
                while ( have_posts() ) : the_post(); ?>
                    <li class="items_listItem">
                        <a href="<?php the_permalink(); ?>" class="items_link">
                            <span class="before_after_img_wrap before_warp">
                                <img src="<?php the_field('featured_img_before', get_the_ID()); ?>" alt="<?php echo  __( 'До', 'twentyfifteen' ); ?>">
                            </span>
                            <span class="before_after_img_wrap after_wrap">
                                <img src="<?php the_field('featured_img_after', get_the_ID()); ?>" alt="<?php echo __( 'После', 'twentyfifteen' ); ?>">
                            </span>
                        </a>
                    </li>
                    <?php if((($index + 1) % $galleryInRow == 0) && (($index + 1) != $wp_query->post_count)): ?>
                        </ul>
                        <ul class="items_list columns_<?php echo $galleryInRow; ?>">
                    <?php endif; ?>
                    <?php
                    $index++;
                endwhile;
                ?>

                </ul>
            <?php endif; ?>
            <?php
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
