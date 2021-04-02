<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// Use:  [goreview]
function go_review_shortcode() {?>
    <!--  add HTML for gallery -->
<section id="container" class="container">
   <!-- Review slider -->
   <div id="container-review" class="container-review">
        <div id="list-review-ul" class="list-review-ul">
           <?php $args = array('post_type'=>'post', 'posts_per_page'=> -1 );
                 $post_query_review = new WP_Query($args);
                 if($post_query_review->have_posts()):
                        while($post_query_review->have_posts()):$post_query_review->the_post();?>
                            <div id="list-review-<?php the_id();?>" class="list-review">
                               <div class="img-review">
                                   <?php the_post_thumbnail()?>
                               </div>  
                               <div class="content-review">
                                 <?php the_content();?>
                               </div> 
                            </div>
                        <?php endwhile; 
                    wp_reset_postdata();
                 endif; ?>
        </div>
        <div id="slider-review-arrows" class="slider-review-arrows">
            <div id="prev-slide-arrow-rev" class="prev-slide-arrow-rev">&larr;</div>
            <div id="next-slide-arrow-rev" class="next-slide-arrow-rev">&rarr;</div>
        </div>
    </div>
</section>
<?php }
add_shortcode('goreview', 'go_review_shortcode');
?>