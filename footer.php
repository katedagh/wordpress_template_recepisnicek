<?php wp_footer(); ?>

<footer>

<div class="footer-nav">

    <div  class="footer-nav-align">
        <h4 class="footer-title">Rychlé odkazy</h4>
        <nav>
            <?php
            wp_nav_menu([
              'theme_location' => 'header-menu',
              'container'      => false,
              'items_wrap'     => '<ul>%3$s</ul>',
              ]);
             ?>
        </nav>
    </div>

    <div class="footer-nav-align">
        <a href="https://www.instagram.com/recepisnicek_cz/" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/insta.png" alt="" height="70px" width="70px">
            <p class="text-sm">instagram</p>
        </a>
    </div>

    <div class="footer-links">
        <ul>
           <?php
        wp_nav_menu([
            'theme_location' => 'footer-menu',
            'container'      => false,
            'items_wrap'     => '%3$s',
        ]);
        
        ?>
        </ul>
    </div>
    
</div>


<div class="footer-bottom-text">
    <p class="text-sm">&copy; <?php echo date("Y"); ?> Recepisníček.cz | Designed by katedagh</p>
</div>


</footer>

<div id="cookie-banner" class="cookie-banner" hidden>
  <p>
    Tento web používá technické 🍪 cookies 🍪 a místní úložiště prohlížeče za účelem zajištění správného fungování webu.
    <a href="/zasady-cookies">Více informací</a>
  </p>

  <div class="cookie-buttons">
    <button id="cookie-understand">Rozumím</button>
    
  </div>
</div>

</body>

</html>