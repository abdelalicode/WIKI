<?php include_once "../app/views/includes/nav.php"; ?>



<body style="background-color: #f6f6f6;">

  <section class="p-3 p-md-4 p-xl-5">
    <div class="container mt-5">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">ADD NEW WIKI</h5>
          <form method="post" action="/Writer/addwiki">
            <div class="mb-3">

              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Your Title">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Your Wiki Content</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
            </div>

            <div class="mb-3">
              <p>Categorie</p>
              <select class="form-select" aria-label="Default select example" name="categorie">
                <option selected>SELECT CATEGORIE</option>
                <?php foreach($allcats as $cat) :?>
                <option value="<?= $cat->id?>"><?= $cat->name?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
            <p>Tags</p>
            <div class="d-flex flew-wrap gap-3">
            <?php foreach($alltags as $tag) :?>
              
              <div class="form-check">
              
                <input class="form-check-input" type="checkbox" name="selectedChoices[]" value="<?= $tag->id?>" id="flexCheckDefault<?= $tag->id?>">
                <label class="form-check-label" for="flexCheckDefault<?= $tag->id?>">
                <?= $tag->name?>
                </label>
           
              </div>
              <?php endforeach; ?>
              </div>
            </div>

            <button type="submit" class="btn btn-outline-secondary">ADD THE WIKI</button>
          </form>
        </div>
      </div>
    </div>
  </section>