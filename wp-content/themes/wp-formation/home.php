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

?>

<?php

/**
 * La page "Liste des articles" est spécifique, dans le sens où la liste des articles va s'afficher.
 * C'est pourquoi, nous allons récupérer l'ID de la page, puis récupérer les données différements à l'habitude.
 */

$page_for_posts_id = get_option('page_for_posts');


?>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light"><?php echo get_post_field('post_title', $page_for_posts_id) ?></h1>
                <?php echo get_post_field('post_content', $page_for_posts_id) ?>
            </div>
        </div>
    </section>


    <div class="album py-5 bg-light">
        <div class="container">

            <?php

            /**
             * La Boucle (The Loop) est utilisée par WordPress pour afficher chacun de vos Articles.
             * Par l'utilisation de La Boucle, WordPress traite tous les Articles devant être affichés sur la page active
             * et adapte leur présentation en utilisant les critères décrits par les marqueurs de La Boucle.
             *
             * source : https://codex.wordpress.org/fr:La_Boucle
             */

            // S'il y a des posts à visiter
            if (have_posts()) :

                ?>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

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

            <?php

// S'il n'y a pas de posts, afficher un message d'erreur
            else:

                ?>

                <p>Aucun article à afficher.</p>

            <?php

            endif;

            ?>


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