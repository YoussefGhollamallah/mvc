<?php

$title = "home";

ob_start()
?>

<div class="container">
    <div class="row m-1">
        <?php foreach($articles as $article) { ?>
        <div class="card m-1">
            <div class="card-body">
                <h5 class="card-title"><?php echo $article["titre"]; ?></h5>
                <p class="card-text"><?php echo $article["contenu"]; ?></p>
                <p class="card-text"><small class="text-muted"><?php echo $article["date"]; ?></small></p>
            </div>
            <img src="../assets/uploads/<?php echo $article["image"]; ?>" width="250px" height="250px" class="card-img-bottom" alt="image article">
        </div>
        <?php } ?>
    </div>
</div>


<?php
    $content = ob_get_clean();

    require "layout.php";
?>