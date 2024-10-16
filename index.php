<?php 

require_once "controllers/TestController.php";
require_once "controllers/AdminController.php";
require_once "controllers/HomeController.php";


if($_GET["action"]) {

    define("PATH", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

    $params = explode("/", $_GET["action"]);

    if(!empty($params[0])) {

        $controller = $params[0];

        if(!empty($params[1])) {
            $action = $params[1];

            require_once (PATH."controllers/".$controller.".php");

            if(function_exists($action)) {
                
                if ($action == 'getTest') {
                    getTest();
                } elseif ($action == "getHome") {
                    getHome();
                } elseif ($action == "getListArticles") {
                    getListArticles();
                } elseif ( $action == "addArticlePage") {
                    addArticlePage();
                } elseif ( $action == "modifyArticlePage") {
                    $id = $params[2];
                    if(!empty($id)) {
                        modifyArticlePage($id);
                    }
                } elseif ( $action == "deleteArticlePage") {
                    $id = $params[2];
                    if(!empty($id)) {
                        deleteArticlePage($id);
                    }
                }
            }
        }
    }
}