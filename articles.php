<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

// Je charge toutes les librairies
require __DIR__ . '/vendor/autoload.php';


require __DIR__.'/_header.php';



$perPage = 6; // nbArticleParPage
$nbArticles = countArticles($link); //nbArticleTotal
$currentPage = !empty($_GET['p']) ? (int)$_GET['p'] : 1;// numéro de la page
$nbPages = ceil($nbArticles/$perPage); // nombre de pagination

$articles = getArticles($link);
$twig->render('articles.html.twig',[
    'articles' => $articles,
]);
require __DIR__.'/_footer.php';
