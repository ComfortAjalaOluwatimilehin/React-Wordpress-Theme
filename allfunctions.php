<?php

    // load scripts and styles

          function scriptsAndStyles(){
                  //React, react-dom, jquery,bootstrap, babel-core, react js file
                  wp_enqueue_style("style",get_stylesheet_uri() );
                  //wp_enqueue_style("bootstrap","https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css");

                  wp_enqueue_style("material","https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css");
                  wp_enqueue_style("icons-material","https://fonts.googleapis.com/icon?family=Material+Icons");
                  wp_enqueue_script("markdown","https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.6/marked.min.js");
                  wp_enqueue_script("jquery-ui","https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js",array("jquery"));
                  wp_enqueue_script("react","https://fb.me/react-15.0.1.min.js");
                  wp_enqueue_script("react-dom","https://fb.me/react-dom-15.0.1.min.js",array("react"));
                  wp_enqueue_script("babel","https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.18.1/babel.min.js");
                  wp_enqueue_script("main",get_template_directory_uri() . "/scripts/main.js", array("markdown","react","react-dom","babel","jquery"));
                  wp_enqueue_script("header",get_template_directory_uri() . "/scripts/header.js", array("react","react-dom","babel"));
                  wp_enqueue_script("sidebar",get_template_directory_uri() . "/scripts/sidebar.js", array("react","react-dom","babel"));
                  wp_enqueue_script("jquery-file",get_template_directory_uri() . "/scripts/jq.js", array("jquery","main"));
                  wp_enqueue_script("resources",get_template_directory_uri() . "/resources.js", array());
          }


          function BabelType( $tag, $handle, $src ) {
                  	if (!checkhandle($handle) ) {return $tag;}
                        return '<script src="' . $src . '" type="text/babel"></script>' . "\n";
          }


          function checkhandle($handle){
            if($handle == "main" ||  $handle == "header" ||$handle == "sidebar" ){return true;}
          else{return false;}}

          //reduce the excerpt length
          function excerptLength($length){return 50;}



            //add supports, menus theme

            function comfort_theme_support(){
              register_nav_menus(array('primary-menu' => __( 'Primary Menu' ),'secondary-menu' => __( 'Secondary Menu' )));
              add_theme_support( 'post-thumbnails' );
              add_theme_support("custom-header");
            }

 ?>
