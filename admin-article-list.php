<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/_header-admin.php';

$articles = getArticles($link);

// Réduction de la taille de l'article "maison" car twig ne le gère pas sans plug-in (je n'ai pas réussi à l'installer)
$i = count($articles);
$j = 0;
// je n'utilise pas un foreach pour pouvoir modifier les valeurs
while($j<$i){
    $articles[$j]['content'] = substr($articles[$j]['content'],0,100);
    $articles[$j]['title'] = substr($articles[$j]['title'],0,30);
    $j++;
}
// Fin de la réduction de la taille


// J'envoie dans le render les bonnes valeurs
echo $twig ->render('admin-article-list.html.twig',[
    'articles' => $articles,
    'connected' => isConnected(),
    'username' => 'blobfish',
]);
require __DIR__.'/_footer.php';
