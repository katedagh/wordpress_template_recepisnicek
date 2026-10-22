<?php get_header(); ?>

<section id="home">
    
<div class="journal-container">
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $all_posts = new WP_Query([
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'paged'          => $paged
    ]);

    $posts_array = [];
    if ($all_posts->have_posts()) :
        while ($all_posts->have_posts()) :
            $all_posts->the_post();
            $posts_array[] = $post; 
        endwhile;
    endif;
    wp_reset_postdata();

    
    $left_posts  = array_slice($posts_array, 0, 3); 
    $right_posts = array_slice($posts_array, 3); 
    ?>

    <!-- LEFT SIDE -->
    <div id="journal-left" arria-labelledby="journal-heading">
        
        <p class="journal-comment" id="journal-heading">🍨 Nejnovější zápisky 🍰</p>

        <?php foreach ($left_posts as $post) : setup_postdata($post); ?>
            <a href="<?php the_permalink(); ?>" class="post-link" style="text-decoration: none; color: inherit;">
                <div class="journal-post">
                     <div class="journal-img-mobile" role="img"
     aria-label="Náhledový obrázek článku <?php the_title_attribute(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>');"></div>
                     <div class="journal-img"><?php if (has_post_thumbnail()) the_post_thumbnail('thumbnail'); ?></div>
                    <div>
                        
                        <h2 class="journal-post-title"><?php the_title(); ?></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- RIGHT SIDE -->
    <div id="journal-right">

        <?php foreach ($right_posts as $post) : setup_postdata($post); ?>
            <a href="<?php the_permalink(); ?>" class="recipe-link" style="text-decoration: none; color: inherit;">
                <div class="journal-post">
                    <?php if (has_post_thumbnail()) the_post_thumbnail('thumbnail'); ?>
                    <div>
                        <h2 class="journal-post-title"><?php the_title(); ?></h2>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
    </div>

</div>

<!--
<?php if ($all_posts->max_num_pages > 1) : ?>
    <div class="pagination">
        <?php
        echo paginate_links([
            'total'   => $all_posts->max_num_pages,
            'current' => $paged,
            'prev_text' => '« Předchozí',
            'next_text' => 'Další »',
        ]);
        ?>
    </div>
<?php endif; ?> -->

</section>

<?php get_footer(); ?>