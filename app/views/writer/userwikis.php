<?php include_once "../app/views/includes/nav.php"; ?>

<div class="m-5 p-5">

  <h2>YOUR ARTICLES</h2>
  <div class="container d-flex flex-wrap m-5 p-5">


    <?php if (empty($userwikis)) : ?>
      <h2>No wikis found</h2>
    <?php else : ?>
      <div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">



          <?php foreach ($userwikis as $userwiki) : ?>
            <h5 class="card-title"><?= $userwiki->title ?></h5>
            <p class="card-text">CREATED AT: <?= $userwiki->creation_date ?></p>
            <div class="d-flex gap-5">
              <a href="/Writer/deletewiki/<?= $userwiki->id ?>" class="btn btn-danger">DELETE</a>

              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal<?= $userwiki->id ?>">
                UPDATE
              </button>
              <div class="modal fade" id="modal<?= $userwiki->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">UPDATE NAME</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/Writer/updatewiki" method="post" class="form-signin d-flex flex-column justify-content-center">
                        <input type="hidden" name="id" value="<?= $userwiki->id ?>">
                        <div>
                          <label for="inputName" class="align-self-start m-2">Title</label>
                          <input type="text" name="title" class="form-control v-25" placeholder="Category Name" required autofocus value="<?= $userwiki->title ?>">
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label">Your Wiki content</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content"><?= $userwiki->content ?></textarea>
                        </div>
                        <br><br>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="action" value="updateWiki" class="btn btn-primary">UPDATE</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr class="px-3">
          <?php endforeach; ?>

        </div>
      </div>
    <?php endif; ?>





  </div>


</div>