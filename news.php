<?php

require('db.php');

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BENO-TECH</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<style>
  .floating-button {
    position: absolute;
    left: 86vw;
    top: 80vh;
    width: 80px;
    height: 80px;
    border-radius: 17px;
    background-color: deepskyblue;
    z-index: 2;
  }

  @media only screen and (max-width: 800px) {
    .sidebar {
      display: none;
    }
  }

  html {
    overflow-y: hidden;
    overflow-x: hidden;
    ;
  }

  body {
    overflow: hidden;
    position: absolute;
  }

  .scrollerble {
    margin: 30px;
    height: 100vh;
    overflow: auto;

    overflow-y: scroll;
  }
</style>

<body>


  <?php
  require('header.php');
  ?>
  <!-- POSTING BUTTON  -->
  <a href="post.php">
    <div class="floating-button d-none d-md-block ">
      <div style="display:flex; flex:1 1 auto; height:100%; flex-direction:column; justify-content:center; align-items:center;">

        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
          <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
        </svg>

      </div>
    </div>
  </a>
</body>

<div class="d-flex d-inline flex-row ">

  <?php require('sidebar.php');?>

  <?php

  function get_rand_img($img)
  {
    $searchImg = glob($img, GLOB_BRACE);
    if (!$img || !$searchImg) {
      $imageDir = 'altimg\\';
      $images = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
      $randomImage = $images[array_rand($images)];
      return $randomImage;
    } else {
      return $img;
    }
    $searchImg = null;
  }

  ?>
  <!-- scrollerble Pane -->
  <div class="row row-cols-1 row-cols-md-2 g-4 scrollerble">


    <?php


    if (isset($_GET['tag'])) {
      $query = "SELECT * From post inner join " . "(SELECT post_id , category.tag FROM post_category_relation inner join category on post_category_relation.category_id=category.category_id where category.category_id=" . $_GET['tag'] . " order by post_id) q on post.post_id=q.post_id;";
      $res = mysqli_query($conn, $query);
    } else {
      $query = 'select * from post order by post_id desc';
      $res = mysqli_query($conn, $query);
    }

    $num_rows = mysqli_num_rows($res);

    for ($i = 0; $i < $num_rows; $i++) {
      $row = mysqli_fetch_assoc($res);


      echo '
  <a style="text-decoration:none;" href="read.php?pn=' . $row['post_id'] . '">
    <div class="col">
    <div class="card">
      <img src="' . get_rand_img($row['main_img']) . '" class="card-img-top" alt="Hollywood Sign on The Hill" />
      <div class="card-body">
        <h5 class="card-title">' . $row['title'] . '</h5>
        <p class="card-text">' . $row['content'] . '
        </p>
      </div>
    </div>
  </div>
  </a>

  ';
    }

    ?>



    <div class="col">
      <div class="card">
        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road" />
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            This is a longer card with supporting text below as a natural lead-in to
            additional content. This content is a little bit longer.
          </p>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card">
        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/043.webp" class="card-img-top" alt="Los Angeles Skyscrapers" />
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
            additional content.</p>
        </div>
      </div>
    </div>


    <div class="col">
      <div class="card">
        <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers" />
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            This is a longer card with supporting text below as a natural lead-in to
            additional content. This content is a little bit longer.
          </p>
        </div>
      </div>
    </div>




  </div>
</div>


</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>