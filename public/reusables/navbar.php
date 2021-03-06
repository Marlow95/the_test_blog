<nav class="navbar-bg navbar-style navbar navbar-expand-lg navbar-dark border-bottom border-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand p-4" href="index.php"><img src="./img/Logo.png"></a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

    <form method="post" class="form-inline my-2 my-lg-0  row-col align-self-end">
        <input class="search-input form-control-inline form-control-lg mr-sm-2" type="search" name="lookup" placeholder="Search" aria-label="Search">
        <button class="search-btn btn btn-lg my-2 my-sm-0" name="submit_search" type="submit"><img src="./img/Search.png" height="34px"></button>
    </form>

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 nav-position">

      <li class="nav-item active">
        <?php
        if(isset($_SESSION['is_logged_in'])){ ?>
          <a class="nav-link" href="dashboard.php">Dashboard</a>
        <?php } else { ?>
        <a class="nav-link" href="index.php">Home</a>
        <?php } ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="post.php">Blog</a>
      </li>
      <?php 
      //users can still visit dashboard by typing in the url fix later
      if(isset($_SESSION['is_logged_in'])){
         echo '';
      } else{ ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login/Sign Up</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <?php 
        if(isset($_SESSION['is_logged_in'])){

          $logout = <<<DELIMITER
          <form method="post">
              <button class="nav-link btn btn-outline-danger" name="logout">Logout</button>
          </form>
          DELIMITER;
          echo $logout;
        }

        if(isset($_POST['logout'])){
          header('Location: logout.php');
          session_destroy();
        }
      ?>
      <li class="nav-item">
        <a class="nav-link enabled" href="#"></a>
      </li>
    </ul>
  </div>
</nav>

<?php 
if(isset($_POST['submit_search'])){
    header('Location: search.php');
    $val = htmlentities($_POST['lookup']);
    $_SESSION['lookup'] = $val;
}
?>