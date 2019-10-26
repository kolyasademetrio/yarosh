<?php /* Template Name: HomePage */ ?>

<?php get_header(); ?>
<?php
if ( function_exists( 'pll_current_language' ) ) {
    $locale = pll_current_language();
}
?>

<?php
    $mainScreen_bg = get_field('mainScreen_bg');
?>

    <div class="mainScreen" style="background-image: url(<?php echo $mainScreen_bg ?>);">
        <div class="containerFullWidth">
            <a href="#categories" class="scroll-down">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>

    <?php if(get_field('categories_showOnPage')): ?>
    <div class="categories" id="categories">
        <div class="containerFullWidth">
            <h3 class="section_title"><?php the_field('categories_title'); ?></h3>
            <div class="items_content">
                <?php $catsInRow = get_field('categories_inRowQty'); ?>
                <ul class="items_list columns_<?php echo $catsInRow; ?>">
                    <?php
                    $args = array(
                        "hide_empty" => 0,
                        "type" => "post",
                        "orderby" => "name",
                        "order" => "ASC",
                        "exclude" => array(1, 8),
                    );

                    $categories = get_categories($args);

                    foreach($categories as $i => $category) :
                        $image_src = get_field('category_featured_image', 'term_' . $category->term_id);
                        ?>
                        <li class="items_listItem">
                            <a href="<?php echo get_category_link($category->term_id); ?>" class="items_link" style="background-image: url(<?php echo $image_src; ?>);">
                                <span class="categories_name">
                                    <span class="categories_nameInner">
                                        <?php echo $category->name; ?>
                                    </span>
                                </span>
                            </a>
                        </li>
                     <?php if((($i + 1) % $catsInRow == 0) && (($i + 1) != count($categories))): ?>
                    </ul>
                    <ul class="items_list columns_<?php echo $catsInRow; ?>">
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>


    <?php if(get_field('gallery_showOnPage')): ?>
    <div class="gallery before_after_grid" id="gallery">
        <div class="containerFullWidth">
            <h3 class="section_title"><?php the_field('gallery_title'); ?></h3>
            <div class="items_content">
                <?php
                    if ( get_query_var('paged') ) {
                        $paged = get_query_var('paged');
                    } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
                        $paged = get_query_var('page');
                    } else {
                        $paged = 1;
                    }
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => get_option('posts_per_page'),
                        'paged' => $paged,
                        //'s' =>$search_gets,
                    );
                    $wp_query  = new WP_Query( $args );
                ?>
                <?php if ( $wp_query ->have_posts() ) : ?>
                    <?php
                    $galleryInRow = get_field('gallery_inRowQty');
                    ?>
                    <ul class="items_list columns_<?php echo $galleryInRow; ?>">
                        <?php
                        $index = 0;
                        while ( $wp_query->have_posts() ) {
                            $wp_query->the_post();
                            ?>
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
                        }
                        ?>

                    </ul>
                <?php endif; ?>
                <?php
                wp_reset_postdata();
                ?>
                <div class="pagination">
                    <?php
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $wp_query->max_num_pages,
                        'current'      => max( 1, $paged ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'          => __( 'Previous', 'twentyfifteen' ),
                        'next_text'          => __( 'Next', 'twentyfifteen' ),
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) );
                    ?>
                </div>



                    <?php
/*                    $args = array(
                        "hide_empty" => 0,
                        "type" => "post",
                        "orderby" => "name",
                        "order" => "ASC",
                        //"exclude" => array(1, 8),
                    );

                    $categories = get_categories($args);

                    foreach($categories as $i => $category) :
                    $image_src = get_field('category_featured_image', 'term_' . $category->term_id);
                    */?><!--
                    <li class="items_listItem">
                        <a href="<?php /*echo get_category_link($category->term_id); */?>" class="items_link" style="background-image: url(<?php /*echo $image_src; */?>);">
                                <span class="categories_name">
                                    <span class="categories_nameInner">
                                        <?php /*echo $category->name; */?>
                                    </span>
                                </span>
                        </a>
                    </li>
                    <?php /*if((($i + 1) % $catsInRow == 0) && (($i + 1) != count($categories))): */?>
                </ul>
                <ul class="items_list columns_<?php /*echo $catsInRow; */?>">
                    <?php /*endif; */?>
                    <?php /*endforeach; */?>
                </ul>-->
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php
/*    $about_bg = get_field('about_bg');
    $about_content = get_field('about_content');
    */?><!--
    <section class="section aboutUs" id="aboutUs" style="background-image: url(<?php /*echo !empty($about_bg) ? $about_bg : ''; */?>)">
        <div class="section__titleWrap left_line light">
            <div class="section__title"><?php /*pll_e('О компании'); */?></div>
        </div>
        <div class="section__content containerCenter short">
            <?php /*if ( !empty($about_content) ) : */?>
                <?php /*echo $about_content; */?>
                <div class="about__readMore" closetext="<?php /*pll_e('Свернуть текст'); */?>" opentext="<?php /*pll_e('Развернуть текст'); */?>"><?php /*pll_e('Развернуть текст') */?></div>
            <?php /*endif; */?>
        </div>
    </section>-->


<?php get_footer(); ?>