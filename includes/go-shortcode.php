<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// Use:  [gogalery]
function go_galery_shortcode() {?>
    <!--  add HTML for gallery -->
<section id="container" class="container">
   <!-- Categories list -->
   <div id="container-categories" class="container-categories">
        <ul id="list-categories-ul" class="list-categories-ul">
            <?php $cat_args = array('exclude' => array(1), 'option_all' => 'All');
            $categories = get_categories($cat_args);
            foreach ($categories as $cat): ?>
                 <li id="list-categories-li" class="list-categories-li <?=$cat->name;?>">
                     <a data-category="<?=$cat->term_id;?>" href="<?=get_category_link($cat->term_id);?>"><?=$cat->name;?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
 
    <!-- post Grid galerry -->
    <div class="container-slider"> 
         <div id="prev-slide-arrow-gallery" class="prev-slide-arrow-gallery">&larr;</div>
            <div id="container-post">       
                <div id="container-gallery" class="container-gallery"> 
                    <?php $args = array('post_type' => 'gogalery', 'posts_per_page' => 7);
                        $post_query_gallery = new WP_Query($args);
                        if ($post_query_gallery->have_posts()):
                            while ($post_query_gallery->have_posts()): $post_query_gallery->the_post();?>
                                <!-- Post Section -->
                                <article data-id="<?php the_id();?>" id="categories-gallery" class="categories-gallery">
                                    <?php the_post_thumbnail();?>
                                <h4 id="post-title" class="post-title"><?php the_title();?></h4></a>
                                </article>
                            <?php endwhile;
                        wp_reset_postdata();?>
                    <?php endif;?>
                </div>
            </div>
        <div id="next-slide-arrow-gallery" class="next-slide-arrow-gallery">&rarr;</div>
    </div>

    <div id="modal-project" class="modal-project">
        
    </div>
</section>
<?php }
add_shortcode('gogalery', 'go_galery_shortcode');
?>