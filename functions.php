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



 ?>
