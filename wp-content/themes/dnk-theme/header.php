<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<?php
$mainClass = '';
if ( wp_is_mobile() ) {
	$mainClass = 'is_mobile';
} ?>
<html <?php language_attributes(); ?> class="no-js <?php echo $mainClass; ?>" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<!--	<meta name="viewport" content="width=device-width, maximum-scale=1.0, user-scalable=yes">-->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<?php
$bodyClass = (!is_front_page()) ? 'internalPages' : 'homePage';
?>
<body <?php body_class($bodyClass); ?>>

<?php
if ( function_exists( 'pll_current_language' ) ) {
	$locale = pll_current_language();
}
?>

<div class="wrapper__main <?php echo $mainClass; ?>">
	<div class="content__main">

		<!--header-->
		<header class="header" id="header">
			<div class="containerFullWidth">
                <div class="header_inner">
                    <?php if ( is_front_page() ) : ?>
                        <div class="header_logoLink">
                            <img src="<?php the_field('header_logoImgIcon', 'option'); ?>" alt="" class="header_logoImgIcon">
                            <img src="<?php the_field('header_logoImgText', 'option'); ?>" alt="" class="header_logoImgText">
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/'));?>" class="header_logoLink">
                            <img src="<?php the_field('header_logoImgIcon', 'option'); ?>" alt="" class="header_logoImgIcon">
                            <img src="<?php the_field('header_logoImgText', 'option'); ?>" alt="" class="header_logoImgText">
                        </a>
                    <?php endif; ?>


                    <nav class="header_nav">
                        <!-- START: menu -->
                        <?php $menu_name = 'main_menu_'. $locale; ?>
                        <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'primary',
                                'menu'            => $menu_name,
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'header_menu',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before' => '',
                                'link_after'  => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                                'walker'          => '',
                            ) );
                        ?>
                        <!-- FINISH: menu -->

                        <!-- START: languages -->
                        <ul class="header_langsWrap"><?php pll_the_languages( array( 'show_flags' => 1,'show_names' => 0  )); ?></ul>
                        <!-- FINISH: languages -->
                    </nav>

                    <!-- START: search -->
                    <div class="header_search">
                        <div class="header_searchBtn"></div>
                        <div id="search-box" class="clearfix">
                            <div class="search-x"></div>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                    <div class="header_menuBtn">
                        <span class="header_menuBtn-linebar"></span>
                    </div>
                    <!-- FINISH: search -->
                </div>
			</div>
		</header>

		<div id="main" class="site__main">





