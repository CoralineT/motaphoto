<?php get_header(); ?>


<!-- hero -->

<div class="hero-area">
    <div class="hero-thumbnail">
        <!-- Initialisation du post à afficher -->
        <?php   
            $custom_args = array( 
            'post_type' => 'photo',
            'orderby'   => 'rand',
            'posts_per_page' => 1,
            );
            //instance de requête WP_Query basée sur les critères placés dans la variables $args
            $query_hero = new WP_Query( $custom_args );            
        ?>
        <!-- Récupération d'une photo en mode aléatoire -->
        <?php while($query_hero->have_posts()) : ?>
            <?php $query_hero->the_post();?> 

            <?php if(has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_post_thumbnail('hero'); ?></a>
            <?php endif; ?>                  
                    
        <?php endwhile; ?>       

        <!-- Afficher le titre de la page -->
        <h1 class="title-hero"> <?= bloginfo('description'); ?> </h1>

    </div>  
</div>

<?php
    // On réinitialise à la requête principale
    wp_reset_postdata();       
?>


<!-- Galerie photo -->

<div class="galerie">

    <?php
    $galeries = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => 1,
    ]);
    
    if ($galeries->have_posts()) : ?>

        <?php while ($galeries->have_posts()) : $galeries->the_post(); ?>
            
            <?php get_template_part('templates_parts/galerie'); ?>
        
        <?php endwhile; ?>

    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>


<?php get_footer(); ?>