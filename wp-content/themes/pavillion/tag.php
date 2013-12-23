<?php
/**
 * Template Name: Project Page Template
 *
 * Description: Project Portfolio Info Page, Hierachically arranged for tag filtered list too
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('about'); ?>

<script>
    var infosliders = [];
    var sliders = [];

    var Slider = function() { this.initialize.apply(this, arguments) }
    Slider.prototype = {

        initialize: function(slider) {
            this.ul = slider.children[0]
            this.li = this.ul.children

            // make <ul> as large as all <li>â€™s
            this.ul.style.width = (this.li[0].clientWidth * this.li.length) + 'px'

            this.currentIndex = 0
        },

        goTo: function(index) {
        // filter invalid indices
            if (index < 0 || index > this.li.length - 1)
            return
            // move <ul> left
            this.ul.style.left = '-' + (100 * index) + '%'

            this.currentIndex = index
        },

        goToPrev: function() {
            this.goTo(this.currentIndex - 1)
        },

        goToNext: function() {
            this.goTo(this.currentIndex + 1)
        }
    }

    function slideTo(idx){
        sliders[0].goTo(idx);
        //infosliders[0].goTo(idx);
    }

    jQuery(function($) {
        /*
        $('#info-content').each(function() {
          infosliders.push(new Slider(this))
        })
        */

        $('#top-content').each(function() {
          sliders.push(new Slider(this))
        })

        $('#about-parent-content, .about-content, .slide-body').lionbars({
            autohide: false
        });

        $('#sliderthumb').tinycarousel();

    });

</script>
<?php

    // Set up the objects needed
    $my_wp_query = new WP_Query();
    $project_children = $my_wp_query->query('tag='.get_query_var('tag'),'post_tag');

    // echo what we get back from WP to the browser
    //echo '<pre>' . print_r( $project_children, true ) . '</pre>';

?>

<div id="about-left">
    <h1 class="entry-title white"><?php single_tag_title(); ?> Project List</h1>
    <div id="news-list">
        <ul>
            <?php
                $idx = 0;
                foreach ($project_children as $p) {
                    print '<li><a href="javascript:slideTo('.$idx.')">'.$p->post_title.'</a></li>';
                    $idx++;
                }
            ?>
        </ul>
    </div>
</div>
<div id="about-right" style="background-color:#000;">
    <div id="top-content">
        <ul>
            <?php foreach($project_children as $c){ ?>
                <li>
                    <div class="slide-content">
                        <div class="head-img" style="height:115px; display:block; overflow:hidden;">
                            <?php
                                $thumb = get_the_post_thumbnail($c->ID, 'full',array('style'=>'width:380px'));
                                print $thumb;
                            ?>
                        </div>

                        <h4 class="project-title"><?php print $c->post_title; ?></h4>

                        <div class="slide-body">
                            <?php print apply_filters('the_content', $c->post_content); ?>
                        </div>

                        <div id="bottom-bar">
                            <?php
                                $cf = get_post_custom($c->ID);

                                echo do_shortcode($cf['gallery-short'][0]);

                            ?>
                        </div>


                        <!--
                        <div class="slide-thumbnail">
                            <div id="sliderthumb">
                                <a class="buttons prev" href="#"><img src="<?php print get_template_directory_uri() . '/images/' ?>prev.png" alt="prev" /></a>
                                    <div class="viewport">
                                        <ul class="overview">
                                            <?php
                                                $idx = 0;
                                                foreach ($project_children as $p) {
                                                    $thumb = get_the_post_thumbnail($p->ID, 'thumbnail');
                                                    print '<li><a href="javascript:slideTo('.$idx.')">'.$thumb.'</a></li>';
                                                    $idx++;
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                <a class="buttons next" href="#"><img src="<?php print get_template_directory_uri() . '/images/' ?>next.png" alt="prev" /></a>
                            </div>
                        </div>
                        -->
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<?php get_footer(); ?>