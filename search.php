<?php get_header(); ?>

<section id="search-page" class="search-results" aria-labelledby="page-title">
    
<div class="container">
    
    <h1 class="page-title" id="page-title">Výsledky vyhledávání: "<?php echo get_search_query(); ?>"</h1>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
           
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

        <?php the_posts_pagination(); ?>

    <?php else : ?>
        <p class="text-bigger">Nebyly nalezeny žádné výsledky.</p>
    <?php endif; ?>
    
</div>

</section>

<?php get_footer(); ?>