<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_the_content_with_formatting(); ?>
            <?php //the_content(); ?>
        <?php endwhile; // end of the loop. ?>
