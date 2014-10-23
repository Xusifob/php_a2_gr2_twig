<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/_header-admin.php';

$errors = [];

if (!empty($_GET['id'])) {
    $id = (int)$_GET['id'];

    if (!empty($_POST['submitArticle'])) {
        $update = $_POST;

        unset($update['submitArticle'], $update['tags']);

        if (isset($update['category'])) {
            $update['category_id'] = $update['category'];
            unset($update['category']);
        }

        updateArticle($link, $id, $update);

        header('Location: admin-article-list.php');
    }
    // Je récupère les catégories, les tags et les articles
    $article = getArticle($link, $id);
    $categories = getCategories($link);
    $tags = getTags($link);
}
// J'envoie dans le render les bonnes valeurs
echo $twig ->render('admin-article-add.html.twig',[
    'article' => $article,
    'connected' => isConnected(),
    'username' => 'blobfish',
    'categories' => $categories,
    'tags' => $tags,
]);
require __DIR__.'/_footer.php';