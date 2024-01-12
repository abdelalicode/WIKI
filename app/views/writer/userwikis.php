<?php include_once "../app/views/includes/nav.php"; ?>

<div class="m-5 p-5">

  <h2>YOUR ARTICLES</h2>
  <div class="container d-flex flex-wrap m-5 p-5">
  

    
      <div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
        <?php foreach ($userwikis as $userwiki) : ?>
          <h5 class="card-title"><?= $userwiki->title ?></h5>
          <p class="card-text">CREATED AT: <?= $userwiki->creation_date ?></p>
          <a href="/Writer/deletewiki" class="btn btn-danger">DELETE</a>
          <hr class="px-3">
        <?php endforeach; ?>
        </div>
      </div>


    


  </div>


</div>