<?php
/**
 * Template Name: About Page Template
 *
 * Description: About Info Page, Hierachically arranged for personnel list too
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

        $('#profile-top-content').each(function() {
          sliders.push(new Slider(this))
        })

        $('#about-parent-content, .profile-body, .detail-content').lionbars();

        //$('#sliderthumb').tinycarousel();

        $('.overview').bxSlider({
            minSlides: 5,
            maxSlides:5,
            slideWidth: 52,
            slideMargin: 20,
            infiniteLoop:false,
            hideControlOnEnd:true

        });

    });

</script>

<div id="about-left">
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <div id="about-parent-content">
        <?php get_template_part( 'content', 'about' ); ?>
    </div>
</div>
<div id="about-right">
    <?php
        // Set up the objects needed
        $my_wp_query = new WP_Query();
        $all_wp_pages = $my_wp_query->query(array('post_type' => 'page','posts_per_page'=>-1));

        $parentPage = get_page_by_path('about');

        // Filter through all pages and find Portfolio's children

        $about_children = get_page_children( $parentPage->ID, $all_wp_pages );

        // echo what we get back from WP to the browser
        //echo '<pre>' . print_r( $about_children, true ) . '</pre>';

    ?>
    <div id="profile-top-content">
        <ul>
            <?php foreach($about_children as $c){ ?>
                <li>
                    <div class="profile-content">
                        <div class="profile-photo">
                            <?php
                                $thumb = get_the_post_thumbnail($c->ID, 'thumbnail',array('class'=>'profile-img'));
                                print $thumb;

                                $cf = get_post_custom($c->ID);
                                print '<span class="pname">'.$cf['personnel-name'][0].'</span><br />';
                                print '<span class="ptitle">'.$cf['personnel-title'][0].'</span>';
                            ?>
                        </div>

                        <div class="profile-body">
                            <?php
                            ?>
                            <?php print apply_filters('the_content', $c->post_content); ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div id="bottom-bar" >
        <ul class="overview">
            <?php
                $idx = 0;
                foreach ($about_children as $p) {
                    $thumb = get_the_post_thumbnail($p->ID, 'thumbnail');
                    print '<li><a href="javascript:sliders[0].goTo('.$idx.')">'.$thumb.'</a></li>';
                    $idx++;
                }
            ?>
        </ul>

<?php
/*
        <div id="sliderthumb">
            <a class="buttons prev" href="#"><img src="<?php print get_template_directory_uri() . '/images/' ?>prev.png" alt="prev" /></a>
                <div class="viewport">
                    <ul class="overview">
                        <?php
                            $idx = 0;
                            foreach ($about_children as $p) {
                                $thumb = get_the_post_thumbnail($p->ID, 'thumbnail');
                                print '<li><a href="javascript:sliders[0].goTo('.$idx.')">'.$thumb.'</a></li>';
                                $idx++;
                            }
                        ?>
                    </ul>
                </div>
            <a class="buttons next" href="#"><img src="<?php print get_template_directory_uri() . '/images/' ?>next.png" alt="prev" /></a>
        </div>

*/
?>

    </div>
</div>

<?php get_footer(); ?>