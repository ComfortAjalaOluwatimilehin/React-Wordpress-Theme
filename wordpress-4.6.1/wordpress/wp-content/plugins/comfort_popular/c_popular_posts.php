
<?php
  /*
Plugin Name: Comfort_Popular_Posts
Plugin URI: http://ajalacomfort.com
Author:Comfort Ajala
Author URI: http://ajalacomfort.com
Description:Display comfort_popular posts
Version: 1.0

  */



class comfort_popular_posts extends WP_Widget{

        function __construct(){
          parent::__construct(false,$name = __("Comfort Popular Posts"));
        }

        function form(){}

        function update(){}

        function widget($args,$instance){
            ?>
                <div class="widget comfort_popular_posts">
                      <h5> Comfort's Popular Posts</h5>
                      <ul>
                        <?php
                              $query_args = array("posts_per_page"=>5,"orderby"=>"meta_value_num", "meta-key"=>"post_views_count");
                              $query = new WP_Query($query_args);
                              $def = "https://images.unsplash.com/photo-1454991727061-be514eae86f7?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=72e84205ce9da3b4c9e689289faba164";
                              while($query-> have_posts()){
                                  $query->the_post();
                                  ?>
                                    <li>
                                          <div style="background:url('<?php if(has_post_thumbnail()){ echo the_post_thumbnail_url(); }else echo $def;?>')" ></div>
                                          <div>
                                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                          </div>
                                    </li>
                                  <?php
                              }
                         ?>
                      </ul>
                </div>
            <?php
        }
};

function comfort_register_widgets(){register_widget("comfort_popular_posts");}

add_action("widgets_init","comfort_register_widgets");
 ?>
