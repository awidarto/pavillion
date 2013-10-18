<?php

    $flipper = array(
        array('class'=>'thumb-menu','label'=>'home','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'home','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'home','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'home','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'home','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'home','url'=>site_url() ),
        array('class'=>'thumb-flip','label'=>'home','url'=>site_url() ),
        array('class'=>'thumb-menu','label'=>'news','url'=>'news'),

        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-menu','label'=>'architecture','url'=>'tag/architecture-2'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-menu','label'=>'lighting','url'=>'tag/lighting-2'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),

        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-menu','label'=>'interior','url'=>'interior'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),

        array('class'=>'thumb-menu','label'=>'about','url'=>'about'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-flip','label'=>'home','url'=>'/'),
        array('class'=>'thumb-menu','label'=>'awards','url'=>'awards'),

    );

    foreach($flipper as $f){
        if($f['class'] == 'thumb-menu'){
            ?>
                <div class="thumb-menu"><a href="<?php print $f['url']?>"><?php print $f['label']?></a></div>
            <?php
        }else{
            ?>
                <div class="thumb-flip"></div>
            <?php
        }
    }

?>