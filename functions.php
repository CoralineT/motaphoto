<?php

function motaphoto_register_assets() {
    // Déclarer le JS
	wp_enqueue_script( 
        'script-js', 
        get_template_directory_uri() . '/assets/js/scripts.js',
        '1.0', 
        true
    );
    
    // Déclarer le fichier style.css à la racine du thème
    wp_enqueue_style( 
        'style-css',
        get_stylesheet_uri(), 
        array(), 
        '1.0'
    );
  	
    // Déclarer le fichier CSS à un autre emplacement
    wp_enqueue_style( 
        'main-css', 
        get_template_directory_uri() . '/assets/css/main.css',
        array(), 
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'motaphoto_register_assets' );


// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// ajout des emplacement des menus
register_nav_menus( array(
	'main' => 'Menu Principal',
	'footer' => 'Bas de page',
) );



//intégration mention texte " tous droits réservé "
function add_last_nav_item($items, $args)
{
    // Vérifiez si le menu correspond au menu principal
    if ($args->theme_location == 'footer') {
        $items .= '<li class="menu-item">TOUS DROITS RÉSERVÉS</li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_last_nav_item', 10, 2);






// Filtres

function motaphoto_request_filtered() {
    
    $categories = $_POST['categories'];
    $formats = $_POST['formats'];
    $dates = $_POST['dates'];
    $paged = $_POST['paged'];

    if($categories != "") {
        $argCategories = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $categories,
        );
    } else {
        $argCategories = null;
    }

    if( $formats != "") {
        $argFormats = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $formats,
        );
    } else {
        $argFormats = null;
    }

    $query = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'paged' => $paged,
        'meta_key' => 'annee',
        'tax_query' => array(
            $argCategories ?? "",
            $argFormats ?? "",
        ),
        'meta_key' => 'annee',
            'order' => $dates,
            'orderby' => 'meta_value'
    ]);


    if( $query -> have_posts()) {
        $response = $query;
    } else {
        $response = false;
    }
    //$response = $query->found_posts;

    wp_send_json($response);
    wp_die();

    
}
add_action('wp_ajax_request_filtered', 'motaphoto_request_filtered');
add_action('wp_ajax_nopriv_request_filtered', 'motaphoto_request_filtered');
