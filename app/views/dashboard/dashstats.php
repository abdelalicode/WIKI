<?php include_once "../app/views/includes/sidebar.php"; ?>

<div style="padding: 100px; margin-left: 200px;">
<h2>WEBSITE'S STATS</h2>
<div class="container">
<div class="d-flex gap-5"> 
<div class="jumbotron bg-danger text-white p-5">
  <h2 class="display-4"><?= $wikistats?></h2>
  <p class="lead">WIKIS</p>
  <hr class="my-4">
  <p>At Your Website at the moment</p>
</div>

<div class="jumbotron bg-primary text-white p-5 ">
  <h2 class="display-4"><?= $userstats?></h2>
  <p class="lead">USER(S)</p>
  <hr class="my-4">
  <p>Active User At Your Website</p>
</div>
</div>
</div>

   


</div>

   </div>

