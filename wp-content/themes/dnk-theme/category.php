<?php
/**
 * A Simple Category Template
 */

get_header(); ?>


<div class="inner_page before_after_grid">
    <div class="containerFullWidth">
        <h3 class="section_title"><?php echo single_cat_title( '', false ); ?></h3>
        <div class="items_content">
            <?php $catsInRow = get_field('categories_inRowQty'); ?>
            <?php if ( have_posts() ) : ?>
            <?php $index = 0; ?>
                <ul class="items_list columns_<?php echo 3; ?>">
                    <?php
                    $index = 0;
                    while ( $wp_query->have_posts() ) :
                        $wp_query->the_post();
                        ?>
                        <li class="items_listItem shown">
                            <a href="<?php the_permalink(); ?>" class="items_link">
                                <span class="items_images">
                                    <span class="before_after_img_wrap before_warp">
                                        <img src="<?php the_field('featured_img_before', get_the_ID()); ?>" alt="<?php echo  __( 'До', 'twentyfifteen' ); ?>">
                                    </span>
                                    <span class="before_after_img_wrap after_wrap">
                                        <img src="<?php the_field('featured_img_after', get_the_ID()); ?>" alt="<?php echo __( 'После', 'twentyfifteen' ); ?>">
                                    </span>
                                </span>
                                <span class="hover_section">
                                    <span class="header_searchBtn"></span>
                                </span>
                            </a>
                        </li>
                        <?php if((($index + 1) % 3 == 0) && (($index + 1) != $wp_query->post_count)): ?>
                        </ul>
                        <ul class="items_list columns_<?php echo 3; ?>">
                        <?php endif; ?>
                        <?php
                        $index++;
                    endwhile;
                    ?>
                </ul>
                <?php else: ?>
                <p class="no_posts"><?php echo __('В данной категории нет записей'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>