<?php
/**
 * Template Name: News Page Template
 *
 * Description: News List and Reader Page, Hierachically arranged
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header('about'); ?>

<script>
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

    jQuery(function($) {
        $('#top-content').each(function() {
          sliders.push(new Slider(this))
        })
    });

</script>
<?php

    $news_posts = get_posts(array('category'=>'news'));

?>

<div id="about-left">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <div id="news-list">
        <ul>
            <?php
                $idx = 0;
                foreach ($news_posts as $p) {
                    print '<li>';
                    $thumb = get_the_post_thumbnail($p->ID, 'thumbnail');
                    print '<a href="javascript:sliders[0].goTo('.$idx.')"><h2>'.$p->post_title .'</h2></a>';
                    $idx++;
                    print '</li>';
                }
            ?>
        </ul>
    </div>
</div>
<div id="about-right">
    <div id="top-content">
        <ul>
            <?php foreach($news_posts as $c){ ?>
                <li>
                    <h4><?php print $c->post_title; ?></h4>
                    <div class="about-content">
                        <?php print apply_filters('the_content', $c->post_content); ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<?php get_footer(); ?>