<?php

require_once "models/modelArticle.php";

// function qui va permettre de récupéré la liste de tous les articles qui vont être crée

function getListArticles()
{
    $articles = getArticles();
    
    require_once "views/ListArticlesView.php";
}

function addArticlePage()
{
    
}

function validation()
{
    // récupération du nom du fichier dans la variable $nom_du_fichier
    $nom_du_fichier = $_FILES['file']['name'];
    // récupération du type du fichier dans la variable $type_du_fichier
    $type_du_fichier = $_FILES['file']['type'];
    // récupération du dossier temporaire
    $dossier_temporaire = $_FILES['file']['tmp_name'];
    // récupération du dossier d'upload
    $dosssier_upload = "assets/uploads/".$nom_du_fichier;

    $extension_du_fichier = strrchr($nom_du_fichier,'.');
    $extensions_autorisees = array(".jpg", ".JPG", ".png", '.PNG', 'jpeg', ".JPEG");

    $error = false;

    if(!isset($_POST['titre']) || strlen($_POST['titre']) < 1) {
        echo "Le titre est invalide";
        $error = true;
    }

    if(!isset($_POST['contenu']) || strlen($_POST['contenu']) < 1) {
        echo "La description est invalide";
        $error = true;
    }

    if(!empty($_FILES['file']["name"])) {

        if(!in_array($extension_du_fichier, $extensions_autorisees)){
            echo "L'extension n'est pas autorisée";
            $error = true;
        }

        if(!move_uploaded_file($dossier_temporaire, $dosssier_upload)) {
            echo " une erreur est survenue pendant l'upload du fichier";
            $error = true;
        }
    }

    return $error;

}