<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// Use:  [goreview]
function go_review_shortcode() {?>
    <!--  add HTML for gallery -->
<section id="container" class="container">
   <!-- Review slider -->
   <div id="container-review" class="container-review">
        <ul id="list-review-ul" class="list-review-ul">
           <?php $args = array('post_type'=>'post', 'posts_per_page'=> -1 );
                 $post_query_review = new WP_Query($args);
                 if($post_query_review->have_posts()):
                        while($post_query_review->have_posts()):$post_query_review->the_post();?>
                            <li data-id="<?php the_id();?>" id="list-review-li" class="list-review-li">
                               <div id="img-review" class="img-review">
                                   <?php the_post_thumbnail()?>
                               </div>  
                               <div id="content-review" class="content-review">
                                 <?php the_content();?>
                               </div> 
                            </li>
                        <?php endwhile; 
                    wp_reset_postdata();
                 endif; ?>
        </ul>
    </div>
</section>
<?php }
add_shortcode('goreview', 'go_review_shortcode');
?>