<?php include_once "../app/views/includes/sidebar.php"; ?>

<div style="padding: 10px 100px; margin-left: 200px;">

<h2 class="m-3">WEBSITE'S TAGS</h2>
<div class="container">
<button type="button" class="btn btn-outline-primary m-3"  data-bs-toggle="modal" data-bs-target="#exampleModal">
<span class="material-symbols-outlined">
note_stack_add
</span>
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Tag</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/Admin/insertag" method="post" class="form-signin d-flex flex-column justify-content-center">
                <div>
                    <label for="inputName" class="align-self-start m-2">Tag Name</label>
                    <input type="text" name="name" class="form-control v-25" placeholder="Tag Name" required autofocus value="">
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="action" class="btn btn-primary">ADD NEW</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

</div>
    <table class="table" style="font-size: 1.5em;">
        <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>UPDATE</th>
              <th>DELETE</th>
            </tr>
        </thead>
         <tbody>
           <?php foreach ($tags as $tag) : ?>
            <tr>
                <td><?= $tag->id ?></td>
                <td><?= $tag->name ?></td>
                <td class="d-flex gap-3">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal<?= $tag->id ?>">
                        <span class="material-symbols-outlined">
                            contract_edit
                        </span>
                    </button>
                </td>
                <td>
                    <a href="/Admin/deletet/<?= $tag->id ?>">
                        <button type="button" class="btn btn-outline-danger">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </button>
                    </a>
                </td>
            </tr>
            <div class="modal fade" id="modal<?= $tag->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">UPDATE NAME</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/Admin/updatetag" method="post" class="form-signin d-flex flex-column justify-content-center">
                <input type="hidden" name="id" value="<?= $tag->id ?>">
                <div>
                    <label for="inputName" class="align-self-start m-2">Category Name</label>
                    <input type="text" name="name" class="form-control v-25" placeholder="Category Name" required autofocus value="<?= $tag->name ?>">
                </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="action" class="btn btn-primary">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
            </div>
        <?php endforeach; ?>
    </tbody>
</table>

</div>

