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

?>