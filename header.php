<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

<?php wp_head();?>
 
<title>Recepisníček.cz</title>

</head>

<body>

<header class="site-header">

    <div class="header">

        <!-- DYNAMIC LOGO -->
        <?php 
            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
            the_custom_logo();
            } else { 
        ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/deník kopie.png" 
                 alt="Logo" width="90" height="90">
        <?php } ?>

        <h1 class="header-title">
            <a href="<?php echo esc_url( home_url('/') ); ?>">
            <?php bloginfo('name'); ?>
            </a>
        </h1>
    
    </div>

    <!-- <p><?php bloginfo('description'); ?></p> -->
    <p class="header-subtitle">... děláme co <br> 💛 milujeme 💛 <br> co děláme ... a píšeme ti o tom 🧁📖🥘</p>

</header>


<nav class="navbar" id="menu">
    <ul>
        <?php
        wp_nav_menu([
            'theme_location' => 'header-menu',
            'container'      => false,
            'items_wrap'     => '%3$s',
        ]);
        
        ?>

        <li id="search-icon"> 
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search-icon.png" 
            alt="">

            <div class="menu-item search-item"          id="search-form">
            <?php get_search_form(); ?>
            </div>
        </li>
    </ul>
</nav>

<div id="mobile-menu-icon">
  <span></span>
  <span></span>
  <span></span>
</div>
            