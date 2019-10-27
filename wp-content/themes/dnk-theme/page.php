<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="inner_page" style="color: <?php the_field('font_color', get_the_ID()); ?>;">
    <div class="containerFullWidth containerCenter">
        <h1 class="section_title"><?php the_title( '', false ); ?></h1>
        <div class="inner_content">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php endwhile; ?>



<?php get_footer(); ?>
