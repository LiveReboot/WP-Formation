<?php
/**
 * home.php
 *
 * Page chargée en tant que page d'accueil
 * Règlage > Lecture > Page d'accueil > Derniers articles
 *
 * Si vous souhaitez une page statique, utilisez les fichiers :
 *      - front-page.php pour la page d'accueil
 *      - home.php pour la liste des articles
 */
?>

<?php

/**
 * La fonction get_header() permet d'inclure le fichier "header.php" au fichier actuel.
 * Vous pouvez ajouter un paramètre à la fonction (get_header('example')).
 * Le fichier chargé sera alors "header-example.php"
 *
 * https://developer.wordpress.org/reference/functions/get_header/
 */

get_header();

// Récupérer les données
global $wp_query;
$author = $wp_query->get_queried_object();

/**
 * La page "Liste des articles" est spécifique, dans le sens où la liste des articles va s'afficher.
 * C'est pourquoi, nous allons récupérer l'ID de la page, puis récupérer les données différements à l'habitude.
 */

?>

    <div class="author py-5 bg-light">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-2 col-sm-12 p-2">
                    <img class="avatar" style="width: 100%;" src="<?php echo esc_url(get_avatar_url($author->ID, ['size' => 200])); ?>"/>
                </div>
                <div class="col-md-10 col-sm-12" style="padding-left: 40px">
                    <h2>A propos de <?php echo $author->first_name; ?></h2>

                    <?php if (!is_null($author->user_url)): ?>
                        <a target="_blank" href="<?php echo $author->user_url; ?>">Site internet</a>
                    <?php endif ?>

                    <p class="author-description text-justify"><small><?php echo $author->description; ?></small></p>
                </div>
            </div>

            <h2>Les publications de <?php echo $author->first_name; ?></h2>

            <div class="row ">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">



                    <?php

                    // Parcourir tous les posts
                    while (have_posts()) :

                        // Charger l'article correspondant en mémoire
                        the_post();

                        // Charger un fichier HTML
                        get_template_part('parts/card-article');

                    endwhile;

                    ?>
                </div>
            </div>

            <div class="row mt-5">
                <?php wpformation_paginate(); ?>
            </div>

        </div>
    </div>

<?php
/**
 * La fonction get_footer() permet d'inclure le fichier "footer.php" au fichier actuel.
 * Vous pouvez ajouter un paramètre à la fonction (get_footer('example')).
 * Le fichier chargé sera alors "footer-example.php"
 *
 * https://developer.wordpress.org/reference/functions/get_footer/
 */

get_footer();

?>