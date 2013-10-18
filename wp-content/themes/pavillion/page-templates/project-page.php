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

<div id="about-left">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <div id="about-parent-content">
        <?php get_template_part( 'content', 'project' ); ?>
    </div>
</div>
<div id="about-right">
    <?php
        // Set up the objects needed
        $my_wp_query = new WP_Query();
        $all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

        $parentPage = get_page_by_path('project');

        // Filter through all pages and find Portfolio's children

        $about_children = get_page_children( $parentPage->ID, $all_wp_pages );

        // echo what we get back from WP to the browser
        echo '<pre>' . print_r( $about_children, true ) . '</pre>';

    ?>
    <div id="top-content">
        <ul>
            <?php foreach($about_children as $c){ ?>
                <li>
                    <div class="about-content">
                        <?php echo do_shortcode('[portfolio_slideshow id='.$c->ID.']');?>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div id="bottom-bar">
        <?php
            $idx = 0;
            foreach ($about_children as $p) {
                $thumb = get_the_post_thumbnail($p->ID, 'thumbnail');
                print '<a href="javascript:sliders[0].goTo('.$idx.')">'.$thumb.'</a>';
                $idx++;
            }
        ?>
    </div>
</div>

<?php get_footer(); ?>