

    <div id="footer_space" class="row">
        <div class="col s4">
            <?php wp_nav_menu(array("menu" => "Main"));?>
        </div>
        <div class="col s4">
          <?php wp_nav_menu(array("menu" => "subcategories"));?>
        </div>
        <div class="col s4">
          <?php wp_nav_menu(array("menu" => "pages"));?>
        </div>
    </div>
      <?php wp_footer(); ?>
  </body>
</html>
