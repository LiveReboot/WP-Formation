<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <?php wp_head() ?>

    <meta name="theme-color" content="#7952b3">
</head>
<body>

<header>
    <div class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="<?php echo bloginfo('url')?>" class="navbar-brand d-flex align-items-center">
                <?php
                /*
                 * Afficher le titre du blog
                 *
                 * Pour afficher le titre du blog, il est possible de le saisir directement ici.
                 * Mais alors, comment l'administrateur pourra-t-il le mettre à jour sans connaissance en HTML ?
                 *
                 * Pour simplifier les choses, Wordpress propose de saisir le nom du blog directement dans l'interface d'administration.
                 * Pour le récupérer (ainsi que tout un ensemble d'autres informations), nous utiliserons la fonction "get_bloginfo('...')" avec pour paramètre la donnée à récupérer.
                 *
                 * Référence : https://developer.wordpress.org/reference/functions/get_bloginfo/
                 */
                ?>
                <strong><?php echo get_bloginfo('name') ?></strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <?php
                wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'false',
                        'menu_class'        => 'navbar-nav me-auto mb-2 mb-md-0',
                        'fallback_cb'       => 'wp_bootstrap_navlist_walker::fallback',
                        'walker'			=> new wp_bootstrap_navlist_walker())
                );
                ?>
            </div>
        </div>
    </div>
</header>

<main>

