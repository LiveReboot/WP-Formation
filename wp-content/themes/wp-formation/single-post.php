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
 * La Boucle (The Loop) est utilisée par WordPress pour afficher chacun de vos Articles.
 * Par l'utilisation de La Boucle, WordPress traite tous les Articles devant être affichés sur la page active
 * et adapte leur présentation en utilisant les critères décrits par les marqueurs de La Boucle.
 *
 * source : https://codex.wordpress.org/fr:La_Boucle
 */

// S'il y a des posts à visiter
if (have_posts()) :

    // Parcourir tous les posts
    while (have_posts()) :

        // Charger l'article correspondant en mémoire
        the_post();

        ?>

        <section class="py-5 text-center header-post" style="background-image: url('<?php the_post_thumbnail_url() ?>');">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <div class="title-box">
                        <h1 class="fw-light"><?php the_title() ?></h1>

                        <ul class="info">
                            <li>Auteur : <?php the_author_posts_link() ?></li>
                            <li>Date : <?php the_modified_date('d/m/Y') ?></li>
                        </ul>
                        <div class="excerpt"><?php the_excerpt() ?></div>
                    </div>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <?php the_content() ?>
            </div>
        </div>

    <?php

    endwhile;

// S'il n'y a pas de posts, afficher un message d'erreur
else:

    ?>

    <p>Désolé, rien ne correspond à votre recheche.</p>

<?php

endif;

?>

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