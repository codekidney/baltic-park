<?php
get_header();
?>
<section id="primary" class="content-area">
    <main id="main" class="site-main align-center">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>
    </main><!-- .site-main -->
</section><!-- .content-area -->
<?php
get_footer();
