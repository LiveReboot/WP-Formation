<?php

require_once('walker.php');

/**
 * Indiquer à Wordpress que notre thème prend en charge les images de couverture (pages & articles)
 */

add_theme_support('post-thumbnails');

/**
 * Pour charger des fichiers CSS / JS à votre template, vous allez devoir les enregistrer dans une file d'attente avant de les traiter.
 * Cette enregistrement préalable a pour but de permettre de prioriser certain fichier, gérant ainsi les contraintes de dépendance.
 *
 * La fonction "wp_register_style" : permet d'ajouter un fichier à la file d'attente des styles.
 * https://developer.wordpress.org/reference/functions/wp_register_style/
 *
 * La fonction "wp_enqueue_style" : permet de traiter un fichier de la file d'attente des styles.
 * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 *
 * La fonction "wp_register_style" : permet d'ajouter un fichier à la file d'attente des scripts.
 * https://developer.wordpress.org/reference/functions/wp_register_script/
 *
 * La fonction "wp_enqueue_script" : permet de traiter un fichier de la file d'attente des scripts.
 * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 *
 */

function wpformation_register_assets()
{
    // Lister les fichiers CSS
    $styles = [
        [
            'name' => 'boostrap',
            'src' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css',
            'deps' => []
        ], [
            'name' => 'style',
            'src' => get_stylesheet_uri(),
            'deps' => []
        ], [
            'name' => 'custom',
            'src' => get_template_directory_uri() . '/assets/css/custom.css',
            'deps' => []
        ],
    ];

    // Charger les fichiers CSS
    foreach ($styles as $style) {
        wp_register_style($style['name'], $style['src'], $style['deps']);
        wp_enqueue_style($style['name']);
    }

    // Lister les fichiers Javascript
    $scripts = [
        [
            'name' => 'jquery',
            'src' => 'https://code.jquery.com/jquery-3.5.1.min.js',
            'deps' => [],
            'version' => null,
            'in_footer' => true
        ], [
            'name' => 'bootstrap',
            'src' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js',
            'deps' => ['jquery'],
            'version' => null,
            'in_footer' => true
        ],
    ];

    // Supprimer la version Jquery chargée par défaut sur Wordpress
    wp_deregister_script('jquery');

    // Charger les fichiers Javascript
    foreach ($scripts as $script) {
        wp_register_script($script['name'], $script['src'], $script['deps'], $script['version'], $script['in_footer']);
        wp_enqueue_script($script['name']);
    }
}

add_action('wp_enqueue_scripts', 'wpformation_register_assets');

/**
 * Pagination en nombre et non pas en suivant / précédent
 */

function wpformation_paginate()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }


    echo '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">' . "\n";

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        $active = 1 == $paged ? ' active' : '';

        printf('<li class="page-item ' . $active . '" %s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li class="page-item" >…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        $active = $paged == $link ? ' active' : '';
        printf('<li class="page-item ' . $active . '" %s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        $active = $paged == $max ? ' active' : '';
        printf('<li class="page-item ' . $active . '" %s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    echo '</ul></nav>' . "\n";

}

/**
 * Enregistrer le fait que le template gère les menus
 */

function wpformation_menus()
{
    register_nav_menu('primary', 'Menu principal');
    register_nav_menu('header', 'En-tête');
    register_nav_menu('footer', 'Pied de page');
}

add_action('init', 'wpformation_menus');
