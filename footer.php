<footer class="site__footer">
        <?php get_template_part('templates_parts/contact'); ?>
        <?php get_template_part('templates_parts/lightbox'); ?>

	<?php wp_nav_menu( array( 
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'footer_nav',
         ) ); ?>

</footer>

<?php wp_footer(); ?>