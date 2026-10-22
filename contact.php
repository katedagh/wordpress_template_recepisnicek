<?php 
/* Template Name: Kontakt */
get_header(); ?>

<section id="contact" class="page-layout" aria-labelledby="post-title">
    
<div class="container contact">

    <?php 
    the_post();
    ?>

    <h1 class="post-title" id="post-title"><?php the_title(); ?></h1>
    

        <div><?php the_content(); ?></div>
    


</div>
</section>

<?php get_footer(); ?>