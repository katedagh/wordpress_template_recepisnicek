<?php
/* Template Name: Kategorie – výpis receptů */
get_header();

$page_slug = get_post_field('post_name', get_post());

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type'      => 'post',
    'category_name'  => $page_slug,
    'posts_per_page' => 5,
    'paged'          => $paged
);

$query = new WP_Query($args);
?>


<section id="post-category-page" class="page-layout" aria-labelledby="page-title">
    
<div class="container">

    <h1 class="page-title" id="page-title"><?php the_title(); ?></h1>

    <?php if ($query->have_posts()) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            
        <a href="<?php the_permalink(); ?>" class="post-cat-link">

            <div class="post-cat-img"
                style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>');">
            </div>

            <div class="post-cat-text-container">
                <h2 class="post-cat-title"><?php the_title(); ?></h2>

                <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
            </div>

        </a>

        <?php endwhile; ?>

    <!-- PAGINATION -->
    <div class="pagination">
        <?php
            echo paginate_links(array(
                'total'   => $query->max_num_pages,
                'current' => $paged,
                'prev_text' => '« Předchozí',
                'next_text' => 'Další »'
            ));
         ?>
    </div>

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p class="error-text">Recepty se připravují.</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cookie.png" height="200px" width="200px" alt="">
    <?php endif; ?>

    </div>
    
</section>

<?php get_footer(); ?>