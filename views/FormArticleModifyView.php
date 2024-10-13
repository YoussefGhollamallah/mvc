<?php
$title = "formulaire de modifcation";

ob_start();
?>

<form action="/mvc/AdminController/modifyArticlePage/<?php echo $article["article_id"];?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?php echo $article["titre"]; ?>">
    </div>

    <div class="form-group">
        <label for="contenu">Contenu</label>
        <textarea class="form-control" id="contenu" name="contenu" rows="3"><?php echo $article["contenu"]; ?></textarea>
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