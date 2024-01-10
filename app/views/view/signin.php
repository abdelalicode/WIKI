<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIKI.to</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6 text-bg-success">
          <div class="d-flex align-items-center justify-content-center h-100">
            <div class="col-10 col-xl-8 py-3">
              <span class="material-symbols-outlined">
				input
			</span>
              <hr class="border-primary-subtle mb-4">
              <h2 class="h1 mb-4">Wiki™: Explore, Create and Share Knowledge Together!</h2>
              <p class="lead m-0">We write words, And get closer to each other with knowledge.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h3>Log in</h3>
                </div>
              </div>
            </div>
            <form action="/Auth/signin" method="post">
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="email" placeholder="name@example.com" id="email-field" required onkeyup="validateEmail()">
                  <div style="color: red;" id="email-error"></div>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password" id="password-field" required onkeyup="validatePassword()">
                  <div style="color: red;" id="password-error"></div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                    <label class="form-check-label text-secondary" for="remember_me">
                      Keep me logged in
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-success" type="submit">Log in now</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-12">
                <hr class="mt-5 mb-4 border-secondary-subtle">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                  <a href="/Auth/upsign" class="link-secondary text-decoration-none">Create new account</a>
                  <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
const emailField = document.getElementById("email-field");
const passwordField = document.getElementById("password-field");
const emailError = document.getElementById("email-error");
const passwordError = document.getElementById("password-error");

function validateEmail() {
   if(!emailField.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
      emailError.innerHTML = "Please Enter a valid email";
      emailField.style.borderBottomColor = "red";
      return false;
   }
   emailError.innerHTML = "";
   emailField.style.borderBottomColor = "green";
   return true;
  }

  function validatePassword() {
   if(passwordField.value.length < 6) {
      passwordError.innerHTML = "Password must be more than 6 characters";
      passwordField.style.borderBottomColor = "red";
      return false;
   }
   emailError.innerHTML = "";
   emailField.style.borderBottomColor = "green";
   return true;
  }
</script>
</body>
</html>