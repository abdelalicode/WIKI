<?php include_once "../app/views/includes/sidebar.php"; ?>

<div style="padding: 100px; margin-left: 200px;">



   <div class="container">

   <table class="table" style="font-size: 1.5em;">
        <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>TITLE</th>
              <th>UPDATE</th>
            </tr>
        </thead>
         <tbody>
           <?php foreach ($actwikis as $actwiki) : ?>
            <tr>
                <td><?= $actwiki->id ?></td>
                <td><?= $actwiki->title ?></td>              
                <td><?= $actwiki->title ?></td>              
            </tr>
            
       
        <?php endforeach; ?>
    </tbody>
</table>
   
  </div>


</div>

