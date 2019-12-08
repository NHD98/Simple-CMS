
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto" id="nav-list">
        <?php
        if (isset($_SESSION['username'])){
          echo "<li class='nav-item active'><a class='nav-link' href='newPost.php'>New Post </a> </li>";
          echo "<li class='nav-item active'><a class='nav-link' href='../controller/User/logout.php'>Log out </a> </li>";
        }
        else echo "<li class='nav-item active'><a class='nav-link' href='login.php'>Log in </a> </li>";
        ?>
      </ul>
    </div>
  </div>
</nav>
