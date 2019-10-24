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