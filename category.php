<?php
  get_header();

?>
  <div id="category-space">
<?php
        if(have_posts()){
            while(have_posts()){
                  the_post();
                  ?>
                  <div class="each_category_post row">

                    <?php if(has_post_thumbnail()){
                          ?>
                              <div class="category-thumbnail col s3" style="background-image:url('<?php the_post_thumbnail_url(); ?>')"></div>
                          <?php
                        }
                    ?>

                      <div class="category-text col s6">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?>  </a></h4>
                            <p><?php the_excerpt();?></p>
                      </div>


                  </div>

                  <?php
            }
        }

?>
</div>
<?php

get_sidebar();
get_footer();
 ?>
