<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

// Je charge toutes les librairies
require __DIR__.'/_header.php';

$perPage = 6; // nbArticleParPage
$nbArticles = (int)countArticles($db)[0]['nb']; //nbArticleTotal
$currentPage = !empty($_GET['p']) ? (int)$_GET['p'] : 1;// numéro de la page
$nbPages = ceil($nbArticles/$perPage); // nombre de pagination

if(isConnected()){
    $username = $_SESSION['username'];
}
else{
    $username = false;
}

if (0 >= $currentPage) {
    header('Location: index.php?p=1');
}
if ($currentPage > $nbPages) {
    header('Location: index.php?p='.$nbPages);
}

$articles = getEnabledArticles($db, true, null, ($currentPage-1)*$perPage, $perPage);
// Réduction de la taille de l'article "maison" car twig ne le gère pas sans plug-in (je n'ai pas réussi à l'installer)
$i = count($articles);
$j = 0;
// je n'utilise pas un foreach pour pouvoir modifier les valeurs
while($j<$i){
    $articles[$j]['content'] = substr($articles[$j]['content'],0,450);
    $j++;
}

echo $twig ->render('articles.html.twig',[
    'articles' => $articles,
    'perpage' => $perPage,
    'currentPage' => $currentPage,
    'nbPages' => $nbPages,
    'connected' => isConnected(),
    'username' => $username,
]);
require __DIR__.'/_footer.php';
