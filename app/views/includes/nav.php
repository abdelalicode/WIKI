<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.cdnfonts.com/css/huntesla-gloficka" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/huntesla-gloficka" rel="stylesheet">

    <title>WIKI.to</title>
</head>


<nav id="navbar" class="navbar px-5 navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex text-secondary gap-2" href="/">
            <!-- <img class="w-25" src="./assets/logo.png" alt=""> -->
            <img class="w-25" src="https://i.ibb.co/z6mKzYv/google.png" alt="" />
            

            <p style="font-family: '', sans-serif;">Wiki<span style="font-family: 'Arial'">.to</span></p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php if (isset($_SESSION['role_id'])) { ?>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 gap-3">
                        <li class="nav-item">
                            <a class="nav-link active d-flex text-secondary" aria-current="page" href="/Writer/addwikibutton"><span class="material-symbols-outlined">
                                    history_edu
                                </span>
                                <span>WRITE</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['firstname'] ?>
                            </a>
                            <ul class="dropdown-menu text-secondary">
                                <li><a class="dropdown-item " href="#">PROFILE</a></li>
                                <?php if ($_SESSION['role_id']  == 1) {
                                    echo "<a href='/Admin/index' class='dropdown-item'>GO TO DASHBOARD</a>";
                                } else { ?>
                                    <li><a class="dropdown-item" href="/Writer/getuserwiki">YOUR ARTICLES</a></li>
                                <?php } ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/Auth/logout">LOGOUT</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php  } else { ?>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 gap-3">
                        <a href="Auth/insign"><button type="button" class="btn btn-outline-secondary">LOG IN</button></a>
                        <a href="Auth/upsign"><button type="button" class="btn btn-outline-success">SIGN UP</button></a>
                    </ul>
                <?php  } ?>
            </div>
        </div>
    </div>
</nav>

<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

            document.getElementById("navbar").style.background = "#f6f6f6";
        } else {

            document.getElementById("navbar").style.background = "none";
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>