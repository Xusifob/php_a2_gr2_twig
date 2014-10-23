<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

// Je charge toutes les librairies
require __DIR__.'/_header.php';

if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $article = getArticle($link, $id);
    if (!$article) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

echo $twig ->render('article.html.twig',[
    'article' => $article,
    'connected' => true,
    'username' => 'blobfish',
]);
require __DIR__.'/_footer.php';
