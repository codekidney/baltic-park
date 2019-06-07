<?php
get_header();
while ( have_posts() ) : the_post();?>
<div class="row">
    <div class="col-sm-12">
        <?php the_title( '<h2 class="entry-title align-center">', '</h1>' ); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-3  align-center">
        <?php the_post_thumbnail('medium'); ?>
    </div>
    <div class="col-sm-12 col-md-6">
        <?php the_content(); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <table>
            <tr><td><?php echo __('Price', 'baltic-park'); ?></td><td><?php the_field('price'); ?></td></tr>
            <tr><td><?php echo __('Address', 'baltic-park'); ?></td><td><?php the_field('address'); ?></td></tr>
        </table>
    </div>
</div>
    
<?php endwhile;

get_footer();