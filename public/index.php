<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>

<div class="d-flex justify-content-center text-center">
  <div class="jumbotron justify-content-center">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
  </div>
</div>

<hr/>

<div class="m-2">
 <h2 class="p-3">Recent Posts</h2>
 <div class="container m-0">
    <div class="d-flex flex-wrap">
      <?php renderPosts(); ?>
    </div>
  </div>
</div>


<?php require_once(__DIR__ . "/reusables/footer.php") ?>