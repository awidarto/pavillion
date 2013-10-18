<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
</div><!-- #page -->
<div id="bottom-nav">
        <a href="<?php print site_url(); ?>">home</a>
        | <a href="<?php print site_url(); ?>/about">about</a>
        | <a href="<?php print site_url(); ?>/awards">awards</a>
        | <a href="<?php print site_url(); ?>/tag/architecture-2">architecture</a>
        | <a href="<?php print site_url(); ?>/tag/interior-2">interior</a>
        | <a href="<?php print site_url(); ?>/tag/lighting-2">lighting</a>
        | <a href="<?php print site_url(); ?>/news">news</a>
        | <a href="<?php print site_url(); ?>/contact">contact</a>
</div>
<div class="clearfix"></div>
<footer id="colophon" role="contentinfo">
    <div class="site-info">
        © 2013  |  pavilion sembilanlima, pt. | design & development by jempol digital
    </div><!-- .site-info -->
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>