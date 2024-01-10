<div class="container m-5 gap-5">
<h2 class="text-secondary mb-5">LATEST CATEGORIES</h2>


   
        <?php foreach ($categories as $categorie) : ?>

            <?php

            $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];

            $randomcolor = $colors[array_rand($colors)];

?>
    
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Created At: <?= $categorie->dated ?>">
                <button class="btn btn-<?= $randomcolor ?>" style="pointer-events: none; font-size: 1.2em; padding: 20px 50px; margin:10px;" type="button" disabled><?= $categorie->name ?></button>
            </span>

            <?php
            endforeach;
            ?>


</div>

