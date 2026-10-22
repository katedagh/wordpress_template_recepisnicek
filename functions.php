<?php

function recepisnicek_styles() {
    $css = get_template_directory_uri() . '/assets/css/';

    // --- Base (vždy) ---
    wp_enqueue_style('recepis-base', $css . 'base/base.css', [], filemtime(get_template_directory() . '/assets/css/base/base.css'));
    wp_enqueue_style('recepis-typography', $css . 'base/typography.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/base/typography.css'));

    // --- Layout (většinou všude) ---
    wp_enqueue_style('recepis-header', $css . 'layout/header.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/layout/header.css'));
    wp_enqueue_style('recepis-navigation', $css . 'layout/navigation.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/layout/navigation.css'));
    wp_enqueue_style('recepis-footer', $css . 'layout/footer.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/layout/footer.css'));

    // --- Components ---
    if (is_single() || is_page()) {
        wp_enqueue_style('recepis-comments', $css . 'components/comments.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/components/comments.css'));
    }
     if (is_front_page() || is_page()) {
        wp_enqueue_style('recepis-pagination', $css . 'components/pagination.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/components/pagination.css'));
    }
        wp_enqueue_style('recepis-cookies', $css . 'components/cookies.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/components/cookies.css'));


    // --- Pages ---
    if (is_front_page()) {
        wp_enqueue_style('recepis-home', $css . 'pages/home.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/pages/home.css'));
    }
    if (is_single()) {
        wp_enqueue_style('recepis-single', $css . 'pages/single.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/pages/single.css'));
    }
    if (is_search() || is_page()) {
        wp_enqueue_style('recepis-category', $css . 'pages/category.css', ['recepis-base'], filemtime(get_template_directory() . '/assets/css/pages/category.css'));
    }
}
add_action('wp_enqueue_scripts', 'recepisnicek_styles');

function mytheme_enqueue_styles() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Kalnia:wght@100..700&family=Playpen+Sans:wght@100..800&family=Playwrite+CZ:wght@100..400&display=swap',
        false
    );

    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');





function recepisnicek_scripts() {

    $js = get_template_directory_uri() . '/assets/js/';

     wp_enqueue_script(
        'recepis-cookies',        // handle
        $js . 'cookies.js',       // path k souboru
        [],                      // dependencies
        filemtime(get_template_directory() . '/assets/js/cookies.js'), // cache-busting
        true                     // načíst v footeru
    );

    // 1. Search functionality
    wp_enqueue_script(
        'recepis-search',        // handle
        $js . 'search.js',       // path k souboru
        [],                      // dependencies
        filemtime(get_template_directory() . '/assets/js/search.js'), // cache-busting
        true                     // načíst v footeru
    );

    // 2. Checkboxes / store
    wp_enqueue_script(
        'recepis-checkboxes',
        $js . 'checkboxes.js',
        [],
        filemtime(get_template_directory() . '/assets/js/checkboxes.js'),
        true
    );

    // 3. Navigation / sticky + mobile menu
    wp_enqueue_script(
        'recepis-navigation',
        $js . 'navigation.js',
        [],
        filemtime(get_template_directory() . '/assets/js/navigation.js'),
        true
    );
}

add_action('wp_enqueue_scripts', 'recepisnicek_scripts');


function register_my_menus() {
    register_nav_menus([
        'header-menu' => 'Hlavní menu',
        'footer-menu' => 'Footer menu'
    ]);
}
add_action('after_setup_theme', 'register_my_menus');


add_filter( 'the_content', function( $content ) {

    // Pokud má příspěvek thumbnail, odstraníme první obrázek z obsahu
    if ( has_post_thumbnail() ) {
        // Odstranění prvního <img> v obsahu
        $content = preg_replace('/<img[^>]*>/i', '', $content, 1);
    }

    return $content;
});

add_action('after_setup_theme', function() {
    add_image_size('custom-size', 350, 350, true); // true = hard crop (oříznutí)
});

// Parent shortcode – tabulka
add_shortcode('postup', function($atts, $content = null) {
    if (!$content) return '';

    return '<table class="instructions-table">'
        . do_shortcode($content) .
    '</table>';
});

// Child shortcode – řádek tabulky
add_shortcode('krok', function($atts, $content = null) {
    if (!$content) return '';

    $key = 'recept_' . get_the_ID() . '_postup_' . md5(trim($content));

    return '
    <tr>
        <td class="instructions-text">' . esc_html($content) . '</td>
        <td>
            <input type="checkbox"
                class="store-check"
                data-key="' . esc_attr($key) . '">
        </td>
    </tr>';
});