<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

// Je charge toutes les librairies
require __DIR__.'/_header.php';

if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $article = getArticle($db, $id);
    if (!$article) {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

if(isConnected()){
    $username = $_SESSION['username'];
}
else{
    $username = false;
}

echo $twig ->render('article.html.twig',[
    'article' => $article,
    'connected' => isConnected(),
    'username' => $username,
]);
require __DIR__.'/_footer.php';
