<?php

require_once "models/modelArticle.php";

// function qui va permettre de récupérer la liste de tous les articles

function getListArticles()
{
    $articles = getArticles();
    require_once "views/ListArticlesView.php";
}

function addArticlePage()
{
    if (!empty($_POST) AND !empty($_FILES)) {
        if (validation()) {
            addArticles($_POST["titre"], $_POST["contenu"], $_FILES["file"]['name']);
        }
    }
    require_once 'views/FormArticleAddView.php';
}

function modifyArticlePage($id)
{
    $article = getArticleInfo($id);
    if (!empty($_POST) AND !empty($_FILES)) {
        if (validation()) {  // Change ici: si la validation réussit
            if (!empty($_FILES["file"]["name"])) {
                $image = $_FILES["file"]['name'];
            } else {
                $image = $article["image"];
            }
            modifyArticle($id, $_POST["titre"], $_POST["contenu"], $image);
        }
    }
    require_once "views/FormArticleModifyView.php";
}

function deleteArticlePage($id)
{
    $article = getArticleInfo($id);
    unlink("assets/uploads/".$article["image"]);
    deleteArticle($id);
}

function validation()
{
    $error = false;
    
    if (!empty($_FILES["file"]["name"])) {
        $nom_du_fichier = $_FILES['file']['name'];
        $type_du_fichier = $_FILES['file']['type'];
        $dossier_temporaire = $_FILES['file']['tmp_name'];
        $dossier_upload = "assets/uploads/".$nom_du_fichier;

        $extension_du_fichier = strrchr($nom_du_fichier, '.');
        $extensions_autorisees = array(".jpg", ".JPG", ".png", ".PNG", ".jpeg", ".JPEG");

        if (!in_array($extension_du_fichier, $extensions_autorisees)) {
            echo "L'extension n'est pas autorisée";
            $error = true;
        }

        if (!move_uploaded_file($dossier_temporaire, $dossier_upload)) {
            echo "Une erreur est survenue pendant l'upload du fichier";
            $error = true;
        }
    }

    if (!isset($_POST['titre']) || strlen($_POST['titre']) < 1) {
        echo "Le titre est invalide";
        $error = true;
    }

    if (!isset($_POST['contenu']) || strlen($_POST['contenu']) < 1) {
        echo "La description est invalide";
        $error = true;
    }

    return !$error;  // Retourne true si pas d'erreurs
}
