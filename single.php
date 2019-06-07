SINGLE

<?php
get_header();
while ( have_posts() ) : the_post();?>
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php the_content(); ?>
    
<?php endwhile;

get_footer();