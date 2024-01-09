<?php 
include_once "../app/views/includes/nav.php";
?>

<div class="container mt-5">
<h2 class="text-secondary mb-5">WIKI DETAILS</h2>

<div class="row">
   <div class="d-flex justify-content-center gap-5">
    <hr>
  
    <?php foreach ($read as $rode) : ?>

                <img class="card-img-top" src="https://placehold.co/600x400/orange/white" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Title: <?= $rode->title ?></h5>
                    <p class="card-text"><?= $rode->content ?></p>
                </div>
                    <div class="text-muted">Created At: <?= $rode->creation_date ?></div>
                    <br>
                </div>

    <?php
    endforeach;
    ?>
     </div>
</div>

</div>

