<?php
      //load all functions
        get_template_part("allfunctions");
      //loads scripts and styles
        add_action("wp_enqueue_scripts","scriptsAndStyles");

        //add babel
     add_filter( 'script_loader_tag', 'BabelType', 10, 3 );

      //change excerpt
      add_filter( "excerpt_length", "excerptLength", 999 );

      //THEME SUPPORT
      add_action("init","comfort_theme_support");

   //SIDEBAR WIDGET
    add_action("widgets_init","comfort_widget_support");

      // Remove issues with prefetching adding extra views
      remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

  //add_theme_support("post-thumbnails");

 ?>
