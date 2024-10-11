<?php

require "models/modelArticle.php";

function getHome()
{
    $articles = getArticles();

    require "views/HomeView.php";
}


?>