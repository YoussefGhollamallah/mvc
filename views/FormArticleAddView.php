<?php
$title = "formulaire d'ajout";

ob_start();
?>

<form action="mvc/AdminController/addArticlePage" method="POST" enctype="multipart/form-data" >
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre">
    </div>

    <div class="form-group">
        <label for="contenu">Contenu</label>
        <textarea class="form-control" id="contenu" name="contenu" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="file">
    </div>

    <div class="form-group">
        <input type="submit" name="submit">
    </div>

</form>

<?php $content = ob_get_clean(); 
require_once "layout.php";

?>