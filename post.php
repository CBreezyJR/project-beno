<?php
require('db.php');
if (isset($_POST['btn_post'])) {

  $userid = "test_user";
  $title = $_POST['title_post'];
  $content = $_POST['content_post'];
  $img = "";
  
  if (isset($_FILES['img_post'])) {
    echo "uploaded img";
    move_uploaded_file($_FILES["img_post"]["tmp_name"], $_FILES["img_post"]["name"]);
    $img = $_FILES['img_post']['name'];
  }else{
    echo "can't find img";
  }



  $query = "insert into post(title,content,main_img,likes)
  values ('$title','$content','$img',0);";
  if (mysqli_query($conn, $query)) {
    $insertedIDQuery =  "SELECT LAST_INSERT_ID()";
    $res = mysqli_query($conn,$insertedIDQuery);
    $row = mysqli_fetch_assoc($res);
    $insertedID = $row['LAST_INSERT_ID()'];
    
    if (isset($_POST['post_tag'])) {
      $tag = $_POST['post_tag'];
     
      for($i=0; $i<count($_POST['post_tag']);$i++){
        $tag_id_query = "SELECT category_id FROM category where tag=".'\''.$_POST['post_tag'][$i].'\''.";";
        
        if($res = mysqli_query($conn,$tag_id_query)){
          $row = mysqli_fetch_assoc($res);
          
          $tagID = $row['category_id'];
          $tagInsertQuery = "insert into post_category_relation values($insertedID,$tagID)";
          mysqli_query($conn,$tagInsertQuery);
         header('location:news.php');
        }else{
          echo mysqli_error($conn);
        };
        
      }
    }
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  };

  
}



?>







<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BENO-TECH</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<style>
  input[type="text"] {
    width: 100%;
  }


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

  }


  #thumb {

    background-size: cover;
  }

  .scrollerble {
    margin: 30px;
    height: 80vh;
    overflow-x: hidden;

    overflow-y: scroll;
  }

  .scrollerble::-webkit-scrollbar {
    display: none;
  }

  /* Hide scrollbar for IE, Edge and Firefox */
  .scrollerble {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
  }

  #ip_file {
    color: red;
  }

  #file-upload-button {
    margin: 20px;
    border-radius: 16px;
    ;
  }

  .custom-file-upload {

    display: block;
    width: max-content;
  }

  input[type="file"] {
    display: none;
  }
</style>

<body>


  <?php
  require('header.php');
  ?>


  <!-- POSTING BUTTON  -->
  <a href="javascript:$('#btn_post').click();">
    <div class="floating-button d-none d-md-block ">
      <div style="display:flex; flex:1 1 auto; height:100%; flex-direction:column; justify-content:center; align-items:center;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
      </div>
    </div>
  </a>


</body>

<div class="d-flex d-inline flex-row ">
  <div class="sidebar vh-100 flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi pe-none me-2" width="30" height="24">
        <use xlink:href="#bootstrap"></use>
      </svg>
      <span class="fs-5 fw-semibold">USER NAME</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          TOPIC
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">C++</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">JAVA</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">PYTHON</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          POPULAR
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Weekly</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Monthly</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Annually</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Orders
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Processed</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Shipped</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Returned</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Account
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Profile</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Settings</a></li>
            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sign out</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <div style="flex:1 1 auto"></div>

  <!-- scrollerble Pane -->
  <div class="g-4 scrollerble" style="flex: 4 1 auto;">


    <form id="post_form" action="post.php" method="post" enctype="multipart/form-data">



      <div style="display:flex; flex-direction:column; justify-content:center; align-items:center;">

        <div class="card w-100 h-50">

          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">
              <input type="text" placeholder="Interesting Title" name="title_post" required><br />
            </p>
          </div>
        </div>

      </div>















      <div style="display:flex; flex-direction:column; justify-content:center; align-items:center;">

        <div class="card w-100 h-50">
          <div class="card-body">
            <div style="display:flex; justify-content:space-between;">
              <h5 class="card-title"></h5>


            </div>
            <div id="thumb" style="display:flex;  flex:1 1 10 ; max-width:50%;">

              <img id="img-upload" width="80%" src="" alt="" onerror="this.onerror=null; this.src='';">

            </div>
            <p class="card-text">

              <textarea type="text" name="content_post" placeholder="Interesting Topic" style="height:50vh; width:100%;" name="content" required></textarea><br />
            </p>

            <input id="img_name" style="display:none; " type="text">

            <div style="display:flex;">


              <label for="file-upload" class="btn btn-primary custom-file-upload">
                add image
                <input id="file-upload" name="img_post" type="file" onchange="preview();" />
              </label>


              <button id="btn_post" name="btn_post" class="btn btn-primary" style="margin-left:16px" type="submit">POST</button>
            </div>



          </div>
        </div>

      </div>



      <div style="display:flex; flex-direction:column; justify-content:center; align-items:center;">

        <div class="card w-100 h-50">

          <div class="card-body">
            <h5 class="card-title">TAG</h5>
            <div style="display:flex;">
              <?php require('taglist.php');

              $count = count($tag_arr);

              for ($i = 0; $i < $count; $i++) {
                echo '
              <input type="checkbox" class="tag btn-check" name="post_tag[]" value = "' . $tag_arr[$i] . '" id="' . 'tag' . $i . '">
              <label for="' . 'tag' . $i . '" class="btn btn-outline-info" >
                <input type="hidden" name ="post_taglbl[]" value="' . $tag_arr[$i] . '">
               ' . $tag_arr[$i] . '
              </label>
              ';
              }

              ?>

            </div>
          </div>
        </div>

      </div>








    </form>



  </div>

  <div style="flex:1 1 auto"></div>
</div>


</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script>
  function preview() {

    document.getElementById("img-upload").src = URL.createObjectURL(event.target.files[0]);
    
    console.log(URL.createObjectURL(event.target.files[0]));

    // var httpReq = new XMLHttpRequest();
    // httpReq.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     alert('uploaded img');
    //   }
    // };

    // var formData = new FormData();
    // formData.append('imageFile', event.target.files[0]);

    // $.ajax({
    //   url: 'post_img_ajax.php',
    //   type: 'POST',
    //   data: formData,
    //   processData: false,
    //   contentType: false,
    //   success: function(data) {
    //     $('#img_name').val(data);
    //   }

    // });




  }
</script>

<script>
  var limit = 2;
  $('input.tag').on('change', function(evt) {
    if ($(this).siblings(':checked').length >= limit) {
      alert('maximum tag is 2');
      this.checked = false;
    }
  });
</script>