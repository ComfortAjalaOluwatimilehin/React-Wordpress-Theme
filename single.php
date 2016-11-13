<?php
  get_header();
    if(have_posts()){
      while(have_posts()){
        the_post();
        ?>

        <div id="standard">
          <center><h4><?php the_title(); ?></h4></center>
          <div>
            <div class="tags"><?php  the_tags("<span>"," ","</span>");?></div>
              <?php if(has_post_thumbnail()){
                ?>
                  <div class="standard_featuredimage" style="background-image:url('<?php the_post_thumbnail_url();?>')"></div>
                <?php
              }?>
              <div class="standard_content"><?php the_content();?></div>
          </div>
        </div>
        <?php
      }

    }

      get_sidebar();
      get_footer();
 ?>
