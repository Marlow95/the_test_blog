<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>

<div class="jumbo">
  <h1 class="p-4 text-center greet"><?= ucwords('Hello, Friend') ?></h1>
</div>
<img class="ellipse" src="./img/Ellipse 1.png" alt="white-bg">
<div class="cta m-4 p-4 text-center">
  <p>
    This is your new your community 
    of like-minded peers to help you <span class="cta-words">reach or exceed</span> your digital marketing goals.
  </p>
  <p>
  Please feel free to browse through our blog posts and comment on any posts you may like. 
  </p>
  <p>
    You can also sign up for our newsletter so that 
    you can <span class="cta-words">join our elite and private</span> facebook group of suceessful professionals.
  </p>

  <a class="btn btn-lg cta-btn m-4 p-4" href="http://">JOIN OUR ELITE COMMUNITY</a>
</div>

<hr/>

<div class="m-2">
 <h2 class="p-4 posts-header">Recent Blog Posts</h2>
 <div class="posts">
    <div class="row row-col-4 m-2">
      <?php renderPosts(); ?>
    </div>
  </div>
</div>


<?php require_once(__DIR__ . "/reusables/footer.php") ?>