<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

function getDatabaseLink(array $config) {
    return mysqli_connect(
        $config['hostname'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );
}

/********************************************************************
CONNEXION A LA BASE DE DONNEES
 ********************************************************************/
$host = 'localhost';	// Adresse du serveur
$dbname = 'a2_cours_blog';		// Nom de la base de données

// Création du dsn
$dsn  = 'mysql:host='.$host.';dbname='.$dbname;
$user = 'root';		// Utilisateur
$pass = '';			// Mot de passe

try{
    $db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch(PDOException $e)
{
    echo 'erreur de connexion à la base';
    // echo 'Erreur : '.$e->getMessage().'<br />';
    mail('coucou99999@gmail.com','Erreur sur mon site',$e->getMessage());
    echo 'N° : '.$e->getCode();
    die;
}
// FIN DE LA CONNEXION



function closeDatabaseLink($link) {
    return mysqli_close($link);
}
