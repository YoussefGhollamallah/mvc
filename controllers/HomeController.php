<?php

require_once "models/modelArticle.php";

function getHome()
{
    $articles = getArticles();

    require_once "views/HomeView.php";
}


?>