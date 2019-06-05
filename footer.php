        <div class="footer align-center">
            <?php echo get_theme_social_links(); ?>
            <?php wp_nav_menu( array( 'theme_location' => 'Footer menu', 'container_class' => 'menu__container' ) ); ?>
            <?php echo get_theme_copyright(); ?>
        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->
<?php wp_footer(); ?>
</body>
</html>