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
            | <a href="<?php print site_url(); ?>/tag/<?php print pav_tag_menu('architecture'); ?>">architecture</a>
            | <a href="<?php print site_url(); ?>/tag/<?php print pav_tag_menu('interior'); ?>">interior</a>
            | <a href="<?php print site_url(); ?>/tag/<?php print pav_tag_menu('lighting'); ?>">lighting</a>
            | <a href="<?php print site_url(); ?>/news">news</a>
            | <a href="<?php print site_url(); ?>/contact">contact</a>
    </div>
    <div class="clearfix"></div>
    <footer id="colophon" role="contentinfo">
        <div class="site-info">
            © 2013  |  pavilion sembilanlima, pt. | design & development by jempol digital
        </div><!-- .site-info -->
    </footer><!-- #colophon -->

</body>
</html>