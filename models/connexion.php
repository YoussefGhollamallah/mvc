<?php

function connexionBDD()
{
    $host = 'localhost';
    $dbname = "blog";
    $user = "root";
    $password = "root";


    try {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}
