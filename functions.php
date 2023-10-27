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



// Récupérer les catégories

