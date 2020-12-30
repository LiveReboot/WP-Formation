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

    <div class="py-5 bg-light">
        <div class="container text-center">

            <h1>Erreur 404</h1>
            <p>Page introuvable !</p>

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