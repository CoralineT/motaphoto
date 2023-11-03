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
        <!-- Récupération d'une photo aléatoire -->
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


<!-- Section filtres -->

<?php
    $categories = get_terms(array(
        'taxonomy' => 'categorie',
        'hide_empty' => true,
    ));

    $formats = get_terms(array(
        'taxonomy' => 'format',
        'hide_empty' => true,
    ));

    $args = array(
        'post_type' => 'photo',
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => 8,
        'paged' => 1,
    );
    ?>

<!-- Section Filtres -->
<section class="filtres">
        <!-- Filtre catégorie -->
        <form id="form-filters">
            <label for="categories"></label>
            <select name="categories" id="ajax_call_categories">
                <option value="">Catégories</option>
                <?php
                if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        $category_value = $category->slug;
                        $category_name = $category->name;
                        echo '<option value="' . $category_value . '">' . $category_name . '</option>';
                    }
                }
            ?>
            </select>

        <!-- Filtre formats -->
            <label for="formats"></label>
            <select name="formats" id="ajax_call_formats">
                <option value="">Formats</option>
                <?php
                if (!empty($formats) && !is_wp_error($formats)) {
                    foreach ($formats as $format) {
                        $format_value = $format->slug;
                        $format_name = $format->name;
                        echo '<option value="' . $format_value . '">' . $format_name . '</option>';
                    }
                }
            ?>
            </select>

        <!-- Filtre trier par -->
            <label for="dates"></label>
            <select name="dates" id="ajax_call_dates">
                <option value="">Trier par</option>
                <option value="DESC">Nouveautés</option>
                <option value="ASC">Les plus anciennes</option>  
            </select>
        </form>



<!-- Galerie photo -->

<div class="galerie" id="ajax_return">
    <?php

    $galeries = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => 1,
        'meta_key' => 'annee',
            'order' => '',
            'orderby' => 'meta_value'
    ]);
    

    if ($galeries->have_posts()) : ?>

        <?php while ($galeries->have_posts()) : $galeries->the_post(); ?>
            
            <?php get_template_part('templates_parts/galerie'); ?>
        
        <?php endwhile; ?>

    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>


<?php get_footer(); ?>