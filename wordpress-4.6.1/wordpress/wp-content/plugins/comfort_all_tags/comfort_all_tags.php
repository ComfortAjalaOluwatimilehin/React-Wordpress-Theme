<?php

    /*
        Plugin Name: Comfort's All Tag
        Plugin URI: http://ajalacomfort.com
        Author:Ajala Comfort
        Description:Displays all Tags
        Version:1.0
    */


class comfortAllTags extends WP_Widget{

          function __construct(){
            parent::__construct(false,"Comfort's All Tags");
          }
          function update(){}

          function form(){}

          function widget($args, $instance){
                $tags  = get_tags(array("get"=>"all"));
            ?>
            <div id="allTags" class="sidebar-widgets">
            <?php
                foreach($tags as $tag){
                  $tag_link = get_tag_link( $tag->term_id );
                    ?>
                      <span>
                        <a href="<?php echo $tag_link; ?>"><?php echo $tag->name; ?></a>
                      </span>


                    <?php
                }
          ?>
        </div>
        <?php
          }

}

  //add action
  add_action("widgets_init",function(){register_widget("comfortAllTags");});


 ?>
