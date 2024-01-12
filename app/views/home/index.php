<?php
include_once "../app/views/includes/nav.php";
include_once "../app/views/includes/middle.php";
?>



<div class="container mt-5">

    <h2 class="text-secondary mb-5">LATEST WIKIS</h2>
    <div class="input-group rounded w-25">
        <input type="search" id="search" class="form-control rounded m-5" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </span>
    </div>
    <div class="row">
        <div class="d-flex flex-wrap gap-5" id="card">
            <hr>

            <?php foreach ($wikis as $wiki) : ?>
                <div class="col-md-3 col-sm-5">
                    <div class="card">
                        <img class="card-img-top" src="https://placehold.co/600x400/orange/white" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Title: <?= $wiki->title ?></h5>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Created At: <?= $wiki->creation_date ?></small>
                            <br>
                            <a href="home/params/<?= $wiki->id ?>"><button type="button" class="btn btn-light mt-3">READ MORE</button></a>
                        </div>
                    </div>
                </div>

            <?php
            endforeach;
            ?>
        </div>
    </div>

    <?php
    include_once "../app/views/home/categories.php";
    ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('search').addEventListener('keyup', function () {
            const searchValue = this.value;

            const xhr = new XMLHttpRequest();

            xhr.open('GET', '/Home/search/' + searchValue, true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    console.log(data);

                    document.getElementById('card').innerHTML = '';

                    data.forEach(function (wiki) {
                        const card = document.createElement('div');
                        card.className = 'col-md-3 col-sm-5';

                        card.innerHTML = `
                            <div class="card">
                                <img class="card-img-top" src="https://placehold.co/600x400/orange/white" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Title: ${wiki.title}</h5>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Created At: ${wiki.creation_date}</small>
                                    <br>
                                    <a href="home/params/${wiki.id}"><button type="button" class="btn btn-light mt-3">READ MORE</button></a>
                                </div>
                            </div>
                        `;

                        document.getElementById('card').appendChild(card);
                    });
                } else {
                    console.error('Error:', xhr.status);
                }
            };

            xhr.send();
        });
    });
</script>


    <!-- <script>
      let search = document.getElementById("search");

search.addEventListener('keyup', async function () {
    const response = await fetch('/Home/search/' + search.value);

    if (response.ok) {
        const data = await response.json();
        console.log(data);

        var cardContainer = document.getElementById("card");
        cardContainer.innerHTML = ""; // Clear the existing cards

        data.forEach(wiki => {
            // Create new card elements based on the search results
            var card = document.createElement("div");
            card.className = "col-md-3 col-sm-5";

            card.innerHTML = `
                <div class="card">
                    <img class="card-img-top" src="https://placehold.co/600x400/orange/white" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Title: ${wiki.title}</h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Created At: ${wiki.creation_date}</small>
                        <br>
                        <a href="home/params/${wiki.id}"><button type="button" class="btn btn-light mt-3">READ MORE</button></a>
                    </div>
                </div>
            `;

            cardContainer.appendChild(card);
        });
    }
});

    </script> -->