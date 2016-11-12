<?php
    get_header();

            if(have_posts()){
                ?>
              <ul id="tag-list">
                    <?php
                      while(have_posts()){
                            the_post();

                            ?>

                                <li><a href="<?php the_permalink();?>"><?php  the_title();?></a></li>
                            <?php


                      }
                    ?>
              </ul>
                <?php
            }

    get_sidebar();
 ?>
