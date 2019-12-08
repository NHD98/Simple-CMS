<?php
include_once('layouts/header.php');
session_start();

// var_dump($_SESSION);
if (isset($_SESSION['username'])){
  header("Location: index.php");
}
?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="../controller/User/login.php" method="POST">
              <div class="form-label-group">
                <label for="inputEmail">Username</label>
                <input name="username" type="text" id="username" class="form-control" placeholder="Username" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="password">Password</label>
                <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <div align="center"><a href="register.php">Register</a></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
