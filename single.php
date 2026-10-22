<?php get_header(); ?>

<section id="single-page" class="page-layout" aria-labelledby="post-title">
    
<div class="container">

    <?php 
    the_post();
    ?>

    <h1 class="post-title" id="post-title"><?php the_title(); ?></h1>
    
    <div class="single-overwiev">
        <table class="overwiev">
            <tr>
                <td class="text-bold">⭐ Obtížnost</td>
                <td><?= get_field('obtiznost'); ?></td>
            </tr>
            <tr>
                <td class="text-bold">🧂 Počet surovin</td>
                <td><?= get_field('pocet_surovin'); ?></td>
            </tr>
            <tr>
                <td class="text-bold">🛒 Dostupnost surovin</td>
                <td><?= get_field('dostupnost_surovin'); ?></td>
            </tr>
            <tr>
                <td class="text-bold">⏱️ Délka přípravy</td>
                <td><?= get_field('delka_pripravy'); ?></td>
            </tr>
            <tr>
                <td class="text-bold">🍳 Technika přípravy</td>
                <td><?= get_field('technika_pripravy'); ?></td>
            </tr>
            <tr>
                <td class="text-bold">🛠️ Vybavení</td>
                <td><?= get_field('vybaveni'); ?></td>
            </tr>
            <tr>
                <td class="text-bold">⚠️ Chybovost</td>
                <td><?= get_field('chybovost'); ?></td>
            </tr>
        </table>

        <div class="thumbnail-image">
            <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('custom-size');
                }
            ?>
        </div>

    </div>

    <div class="content">
        
        <div class="sticky-content">
            
           <div class="side-list">
    <h2>Suroviny</h2>

    <!-- Toggle switch pro jednotky -->
    <div class="unit-switch-wrapper">
        <p class="text-s">Přepnout jednotky</p>
         <label class="switch">
    <input type="checkbox" id="unit-toggle">
    <span class="slider round"></span>
  </label>
        
    </div>

    <table class="side-list-table">
        <?php 
        for ($i = 1; $i <= 10; $i++) {
            $nazev = get_field("surovina_{$i}_nazev");
            $g     = get_field("surovina_{$i}_g");
            $cups  = get_field("surovina_{$i}_hrnky");

            if ($nazev) {
                $key = "recept_" . get_the_ID() . "_surovina_$i"; // unikátní klíč podle ID receptu
                echo "<tr>
                    <td class='text-bold'>{$nazev}
                    <span class='unit-g'>{$g}</span>
                        <span class='unit-cups' style='display:none;'>{$cups}</span>
                    </td>
                    
                        
                  
                    <td>
                        <input type='checkbox' class='store-check' data-key='$key'>
                    </td>
                </tr>";
            }
        }
        ?>
    </table>
</div>


            <div class="side-list">
                <h2>Náčiní</h2>
                <table class="side-list-table">
                <?php 
                    for ($i = 1; $i <= 10; $i++) {
                    $field = get_field("nacini_$i");
                    if ($field) {
                        $key = "recept_" . get_the_ID() . "_nacini_$i"; // unikátní klíč podle ID receptu
                        echo "<tr>
                        <td class='text-bold'>$field<td> <td><input type='checkbox' class='store-check' data-key='$key'></td>
                        </tr>
                        ";
                    }
                    }
                ?>
                </table>
            </div>

        </div>

        <div><?php the_content(); ?></div>
            
    </div>

    <div class="comments">
        <?php comments_template(); ?>
    </div>


</div>
</section>

<?php get_footer(); ?>