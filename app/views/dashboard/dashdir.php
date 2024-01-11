<?php include_once "../app/views/includes/sidebar.php"; ?>

<div style="padding: 100px; margin-left: 200px;">



   <div class="container">
   <div class="alert alert-success">
  <strong>Success!</strong> You've been connected successfully.

  
</div>
   </div>

   <div class="jumbotron bg-success text-white p-5">
  <h2 class="display-4">Hello <?= $_SESSION['firstname']?></h2>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-outline-light btn-lg" href="#" role="button">Go to website</a>
</div>


</div>

