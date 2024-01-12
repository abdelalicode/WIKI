<?php
include_once "../app/views/includes/nav.php";
?>

<div class="container p-5">


    <div class="row">
        <h2 class="text-secondary m-5">WIKI DETAILS</h2>
        <?php foreach ($read as $rode) : ?>
            <div class="d-flex mb-3">
                <p>CATEGORIE:</p>
                <div class="badge bg-info text-dark" style="width: auto; margin: 5px 100px;"><?= $rode->name ?></div>
            </div>
            <div class="d-flex mb-3">
                <p>TAGS:</p>
                <?php foreach ($tagswiki as $tagwiki) : ?>
                    <div class="badge bg-danger" style="width: auto; margin: 5px 10px;"><?= $tagwiki->name ?></div>
                <?php endforeach; ?>
            </div>
            <div class="d-flex align-items-center">
                <h4>Author: </h4>

                <mark class="d-flex align-items-center gap-2" style="width: auto;">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <h5><?= $rode->firstname ?></h5>
                    <h5><?= $rode->lastname ?></h5>
                </mark>
            </div>
            <div class="text-muted">Created at: <?= $rode->creation_date ?></div>

            <img class="w-50" src="https://placehold.co/600x400/gray/white" alt="Card image cap">
            <h3 class="card-title p-3"><b>Title:</b> <?= $rode->title ?></h3>
            <p class="card-text"><?= $rode->content ?></p>
    </div>



    <br>


<?php
        endforeach;
?>
</div>
</div>

</div>
</div>