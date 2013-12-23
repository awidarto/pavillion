<?php
/**
 * Template Name: Award Page Template
 *
 * Description: Awards Info Page, Hierachically arranged for tag filtered list too
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
        infosliders[0].goTo(idx);
    }

    jQuery(function($) {
        $('#info-content').each(function() {
          infosliders.push(new Slider(this))
        })

        $('#top-content').each(function() {
          sliders.push(new Slider(this))
        })

        $('#about-parent-content, .about-content, .detail-content').lionbars();

        $('#sliderthumb').tinycarousel();

    });

</script>
<?php
        // Set up the objects needed
    $my_wp_query = new WP_Query();
    $all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

    $parentPage = get_page_by_path('awards');

    // Filter through all pages and find Portfolio's children

    $project_children = get_page_children( $parentPage->ID, $all_wp_pages );


    // echo what we get back from WP to the browser
    //echo '<pre>' . print_r( $about_children, true ) . '</pre>';

?>

<div id="about-left">
    <div id="info-content">
        <ul>
            <?php foreach($project_children as $c){ ?>
                <li>
                    <h1 class="entry-title"><?php print $c->post_title; ?></h1>
                    <div class="detail-content">
                        <?php print $c->post_content; ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div id="about-right">
    <div id="top-content">
        <ul>
            <?php foreach($project_children as $c){ ?>
                <li>
                    <div class="slide-content">
                        <?php echo do_shortcode('[portfolio_slideshow id='.$c->ID.' slideheight=360 size=large ]');?>
                        <?php // print $c->post_content; ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div id="project-bottom-bar">
        <div id="project-title">Awards</div>

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
</div>

<?php get_footer(); ?>