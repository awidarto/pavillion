<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Argo
 */
?>


<div class="entry-content">
    <div style="float:left;width:200px;height:100%;">
        <?php the_content(); ?>
    </div>
    <div>
        <?php
            // Set up the objects needed
            $my_wp_query = new WP_Query();
            $all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

            print_r($all_wp_pages);

            $parentPage = get_page_by_path('about');
            // Filter through all pages and find Portfolio's children

            $about_children = get_page_children( $parentPage->ID, $all_wp_pages );

            // echo what we get back from WP to the browser
            echo '<pre>' . print_r( $about_children, true ) . '</pre>';

        ?>
    </div>
</div><!-- .entry-content -->

