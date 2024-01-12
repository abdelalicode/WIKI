<?php 
include_once "../app/views/includes/nav.php";
include_once "../app/views/includes/middle.php";
?>



<div class="container mt-5">

<h2 class="text-secondary mb-5">LATEST WIKIS</h2>

<div class="row">
   <div class="d-flex flex-wrap justify-content-center gap-5">
    <hr>
  
    <?php foreach ($wikis as $wiki) : ?>
        <div class="col-sm-5">
            <div class="card">
                <img class="card-img-top" src="https://placehold.co/600x400/orange/white" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Title: <?= $wiki->title ?></h5>
                    <p class="card-text">Author: <?= $wiki->id ?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Created At: <?= $wiki->creation_date ?></small>
                    <br>
                    <a href="home/params/<?= $wiki->id ?>"><button type="button" class="btn btn-light mt-3">READ MORE</button></a>
                </div>
            </div>
        </div>

    <?php
    endforeach;
    ?>
     </div>
</div>

<?php 
include_once "../app/views/home/categories.php";
?>

