<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WIKI.to</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      font-family: "Poppins";
      font-size: 0.6em;
    }
  </style>
</head>

<body>

  <div class="col-2 position-fixed d-flex flex-column" style="background-color: #f6f6f6; height: 100vh; border-right: 1px solid gray; padding: 10px;">
      <div class="d-flex align-items-center ">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="material-symbols-outlined">
                 account_circle
            </span>
            <span><?= $_SESSION['firstname']?></span>
          </button>
          <ul class="dropdown-menu">
            <li><button class="dropdown-item" type="button">PROFILE</button></li>
            <li><a href="/Auth/logout"><button class="dropdown-item" type="button">LOGOUT</button></a></li>
          </ul>
        </div>
      </div>
      

    
        <hr class="mx-3">
        <div class="m-3" style="font-size: 1.8em;">
            <a href="/Admin/cats" class="nav-link m-3 py-1">CATEGORIES</a>
            <a href="/Admin/tags" class="nav-link m-3 py-1">TAGS</a>
            <a href="/Home/wikis" class="nav-link m-3 py-1">WIKIS</a>
            <a href="/Admin/stats" class="nav-link m-3 py-1">STATISTICS</a>
        </div>
       
   

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</html>