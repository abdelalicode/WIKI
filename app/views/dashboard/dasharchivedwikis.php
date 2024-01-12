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
           <?php foreach ($archivewikis as $archivewiki) : ?>
            <tr>
                <td><?= $archivewiki->id ?></td>
                <td><?= $archivewiki->title ?></td>              
                <td><?= $archivewiki->title ?></td>              
            </tr>
            
       
        <?php endforeach; ?>
    </tbody>
</table>
   
  </div>


</div>

