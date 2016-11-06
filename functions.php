<?php
      //load all functions
        get_template_part("allfunctions");
      //loads scripts and styles
        add_action("wp_enqueue_scripts","scriptsAndStyles");

        //add babel
        add_filter( 'script_loader_tag', 'BabelType', 10, 3 );

      //stream_supports
      add_theme_support( 'post-thumbnails' );

      //change excerpt
      add_filter( "excerpt_length", "excerptLength", 999 );

 ?>
