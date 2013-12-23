<?php


    $flipper = array(
        array('class'=>'thumb-menu','label'=>'home','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'','url'=>site_url() ),
        array('class'=>'thumb-menu','label'=>'news','url'=>'news'),

        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-menu','label'=>'architecture','url'=>'tag/'.pav_tag_menu('architecture')),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-menu','label'=>'lighting','url'=>'tag/'.pav_tag_menu('lighting')),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),

        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-menu','label'=>'interior','url'=>'tag/'.pav_tag_menu('interior')),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),

        array('class'=>'thumb-menu','label'=>'about','url'=>'about'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'','url'=>'/'),
        array('class'=>'thumb-menu','label'=>'awards','url'=>'awards'),

    );

    $arch_thumb = array(1,2,3,9,11);
    $light_thumb = array(4,5,6,12,14);
    $interior_thumb = array(19,21,27,28,29);

    $my_wp_query = new WP_Query();
    $all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

    $parentPage = get_page_by_path('portfolio');

    //$pro_children = get_page_children( $parentPage->ID, $all_wp_pages );

    $arch_children = $my_wp_query->query( array('post_parent'=>$parentPage->ID, 'tag'=>pav_tag_menu('architecture') ), $all_wp_pages);

    $light_children = $my_wp_query->query( array('post_parent'=>$parentPage->ID, 'tag'=>pav_tag_menu('lighting') ), $all_wp_pages);

    $interior_children = $my_wp_query->query( array('post_parent'=>$parentPage->ID, 'tag'=>pav_tag_menu('interior') ), $all_wp_pages);

    $temp = array();
    for($i = 0 ; $i < count($arch_thumb);$i++){
        if(count($arch_children) > 0){
            $temp[] = array_pop($arch_children);
        }
    }
    $arch_children = $temp;

    $temp = array();
    for($i = 0 ; $i < count($light_thumb);$i++){
        if(count($light_children) > 0){
            $temp[] = array_pop($light_children);
        }
    }
    $light_children = $temp;


    $temp = array();
    for($i = 0 ; $i < count($interior_thumb);$i++){
        if(count($interior_children) > 0){
            $temp[] = array_pop($interior_children);
        }
    }
    $interior_children = $temp;


    $proimage = array();
    $ar_ac = array();
    $li_ac = array();
    $int_ac = array();

    $pointer = 0;
    foreach($arch_children as $arch){
        $ar_idx = $arch_thumb[$pointer];
        $flipper[$ar_idx]['post_thumb'] = get_the_post_thumbnail($arch->ID, 'thumbnail');
        $flipper[$ar_idx]['class'] .= ' arch';
        $flipper[$ar_idx]['flipper'] .= true;
        $pointer++;
        if( $flipper[$ar_idx]['post_thumb'] != ''){
            $ar_ac[] = $ar_idx;
            $proimage[$ar_idx] = '<a href="#">'.$flipper[$ar_idx]['post_thumb'].'</a>';
        }
    }

    //print_r($flipper);

    $pointer = 0;
    foreach($light_children as $li){
        $li_idx = $light_thumb[$pointer];
        $flipper[$li_idx]['post_thumb'] = get_the_post_thumbnail($li->ID, 'thumbnail');
        $flipper[$li_idx]['class'] .= ' light';
        $flipper[$li_idx]['flipper'] .= true;
        $pointer++;
        if( $flipper[$li_idx]['post_thumb'] != ''){
            $li_ac[] = $li_idx;
            $proimage[$li_idx] = '<a href="#">'.$flipper[$li_idx]['post_thumb'].'</a>';
        }
    }

    //print_r($flipper);

    $pointer = 0;
    foreach($interior_children as $int){
        $int_idx = $interior_thumb[$pointer];
        $flipper[$int_idx]['post_thumb'] = get_the_post_thumbnail($int->ID, 'thumbnail');
        $flipper[$int_idx]['class'] .= ' interior';
        $flipper[$int_idx]['flipper'] .= true;
        $pointer++;
        if( $flipper[$int_idx]['post_thumb'] != ''){
            $int_ac[] = $int_idx;
            $proimage[$int_idx] = '<a href="#">'.$flipper[$int_idx]['post_thumb'].'</a>';
        }
    }

    //print_r($flipper);

    $ptr = 0;
    foreach($flipper as $f){
        if($f['class'] == 'thumb-menu'){
            ?>
                <div class="thumb-menu flips <?php print $f['label'];?>" id="<?php print $f['label'];?>" ><a href="<?php print site_url($f['url']); ?>"><?php print $f['label']?></a></div>
            <?php
        }else if($f['flipper']){
            if(isset($f['post_thumb']) && $f['post_thumb'] != ''){
                ?>
                    <div class="thumb-flip" >
                        <div class="flipper" id="<?php print $ptr;?>">
                            <img src="<?php print get_template_directory_uri() ?>/images/trans-thumb.png">
                        </div>
                    </div>
                <?php
            }else{
                ?>
                    <div class="thumb-flip"></div>
                <?php
            }
        }else{
            ?>
                <div class="thumb-flip"></div>
            <?php
        }

        $ptr++;
    }

?>
<script type="text/javascript">

jQuery(function($) {
    $(document).ready(function(){
        /* The following code is executed once the DOM is loaded */

        var arch = <?php print json_encode($ar_ac)?>;
        var light = <?php print json_encode($li_ac)?>;
        var interior = <?php print json_encode($int_ac)?>;

        var pimg = <?php print json_encode($proimage)?>;

        function doFlip(e,bc){
            var elem = e;
            var dimg = '<img src="<?php print get_template_directory_uri() ?>/images/trans-thumb.png">';

            if(elem.data('flipped'))
            {
                // If the element has already been flipped, use the revertFlip method
                // defined by the plug-in to revert to the default state automatically:

                elem.flippyReverse();

                // Unsetting the flag:
                elem.data('flipped',false)
            }
            else
            {
                // Using the flip method defined by the plugin:

                elem.flippy({
                    color_target: 'white',
                    direction:'TOP',
                    duration: '500',
                    verso:bc,
                    recto:dimg,
                    depth:0.05,
                    noCSS:true,
/*
                    onMidway: function(){
                        elem.css('opacity',0.5);
                    },
                    onFinish: function(){
                        elem.css('opacity',1);
                    },
                    onReverseMidway: function(){
                        elem.css('opacity',0.5);
                    },
*/
                    onReverseFinish: function(){
                        elem.css('opacity',0);
                    }
                });

                // Setting the flag:
                elem.data('flipped',true);
            }
        }

        $('.thumb-menu').bind('hover',function(){

            var act = false;

            if(this.id == 'architecture'){
                act = arch;
            }else if(this.id == 'lighting'){
                act = light;
            }else if(this.id == 'interior'){
                act = interior;
            }

            $.each(act, function(i,v){

                var elem = $('#' + v);

                doFlip( elem, pimg[v] );

            });

            //return false;
            // data('flipped') is a flag we set when we flip the element:
        });

    });

});

</script>
