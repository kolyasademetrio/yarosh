<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<?php
if ( function_exists( 'pll_current_language' ) ) {
	$locale = pll_current_language();
}
?>

</div><!-- site__main -->
</div><!-- content__main -->


<!--header-->
<footer class="footer" id="footer">
    <div class="containerFullWidth">
        <div class="footer_inner">
            <?php if ( is_front_page() ) : ?>
                <div class="footer_logoLink">
                    <img src="<?php the_field('header_logoImgIcon', 'option'); ?>" alt="" class="footer_logoImgIcon">
                    <img src="<?php the_field('header_logoImgText', 'option'); ?>" alt="" class="footer_logoImgText">
                </div>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/'));?>" class="footer_logoLink">
                    <img src="<?php the_field('header_logoImgIcon', 'option'); ?>" alt="" class="footer_logoImgIcon">
                    <img src="<?php the_field('header_logoImgText', 'option'); ?>" alt="" class="footer_logoImgText">
                </a>
            <?php endif; ?>


            <nav class="footer_nav">
                <!-- START: menu -->
                <?php $menu_name = 'footer_menu_'. $locale; ?>
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'footer',
                    'menu'            => $menu_name,
                    'container'       => '',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'footer_menu',
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

            </nav>
        </div>
    </div>
</footer>

</div><!-- wrapper__main -->

<?php wp_footer(); ?>

</body>
</html>
