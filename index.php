<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

// Je charge toutes les librairies
require __DIR__.'/_header.php';

$perPage = 6; // nbArticleParPage
$nbArticles = countArticles($link); //nbArticleTotal
$currentPage = !empty($_GET['p']) ? (int)$_GET['p'] : 1;// numéro de la page
$nbPages = ceil($nbArticles/$perPage); // nombre de pagination


if (0 >= $currentPage) {
    header('Location: index.php?p=1');
}
if ($currentPage > $nbPages) {
    header('Location: index.php?p='.$nbPages);
}

$articles = getArticles($link, null, ($currentPage-1)*$perPage, $perPage);

echo $twig ->render('articles.html.twig',[
    'articles' => $articles,
    'perpage' => $perPage,
    'currentPage' => $currentPage,
    'nbPages' => $nbPages,
    'connected' => isConnected(),
    'username' => 'blobfish',
]);
require __DIR__.'/_footer.php';
