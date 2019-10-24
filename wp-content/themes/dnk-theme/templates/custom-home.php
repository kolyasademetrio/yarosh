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
            <a href="#" class="scroll-down">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    </div>

    <div class="categories">
        <div class="containerFullWidth">
            <h3 class="categories_title"></h3>
            <div class="categories_content">
                <ul class="categories_list">
                    <?php
                    $args = array(
                        "hide_empty" => 0,
                        "type" => "post",
                        "orderby" => "name",
                        "order" => "ASC",
                        "exclude" => array(1, 8),
                    );

                    $categories = get_categories($args);

                    foreach($categories as $category) :
                        $image_src = get_field('category_featured_image', 'term_' . $category->term_id);
                        ?>
                        <li class="categories_listItem" style="background-image: url(<?php echo $image_src; ?>);">
                            <a href="' . get_category_link($category->term_id) . '" class="categories_link">
                                <span class="categories_name">
                                    <?php echo $category->name; ?>
                                </span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

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