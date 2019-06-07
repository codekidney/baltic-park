<?php
get_header();
$i = 0;
if (have_posts()) {
    echo '<div class="row">';
    while ( have_posts() ) : the_post();
    ?>
<div class="col-sm-12 col-md-4 archive-appartment-item">
    <a href="<?php the_permalink(); ?>">
        <?php  the_post_thumbnail(); ?>
    </a>
    <a href="<?php the_permalink(); ?>">
        <h3><?php the_title(); ?></h3>
    </a>
    <p><?php the_excerpt(); ?></p>
    <p><a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo __('Read more', 'baltic-park'); ?></a></p>
</div>
    <?php
    endwhile;
    echo '</div>';
}

get_footer();
