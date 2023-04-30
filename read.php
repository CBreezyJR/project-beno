<?php
require('db.php');
if (isset($_GET['pn'])) {
  $postID = $_GET['pn'];

  $query = "select * from post where post_id=$postID";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($res);
} else {
  $row = ['title' => 'Well nothing is here', 'main_img' => '', 'content' => 'well nothing is here truely', 'likes' => 0];
}

$comments_query = "select * from comment where post_id_ref=$postID order by comment_id desc";
$cq_res = mysqli_query($conn, $comments_query);




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
  .comment-wrapper {
    overflow: hidden;
  }


  .hide {
    border-width: 1px !important;
    max-height: 50vh !important;
    transition: all 0.5s ease;
  }

  #write-comment {

    max-height: 0vh;
    transition: all 0.5s ease-out;
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

    #leftPadding {
      display: none;
    }

    #rightPadding {
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

  .scrollerble {

    flex: 2 0 auto;
    width: 10vw;
    margin: 30px;
    height: 80vh;
    overflow-x: hidden;

    overflow-y: scroll;
  }

  ::-webkit-scrollbar {
    width: 0px;
    background: transparent;

  }

  img[src=""] {
    display: none;
  }
</style>

<body>


  <?php
  require('header.php');
  ?>
  <!-- POSTING BUTTON  -->
  <a href="javascript:history.back()">
    <div class="floating-button d-none d-md-block ">
      <div style="display:flex; flex:1 1 auto; height:100%; flex-direction:column; justify-content:center; align-items:center;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
      </div>
    </div>
  </a>

  <div class="d-flex d-inline flex-row ">


    <?php require('sidebar.php') ?>
    <div id="leftPadding" style="flex:1 0 auto"></div>

    <!-- scrollerble Pane -->
    <div class="scrollerble" id="scrollerble">


      <div style="flex:2 0 10%;width:100%; display:flex; flex-direction:column; justify-content:flex-start; height:80vh;  align-items:center;">

        <div id="comment_format" style="width:100%; display:flex;">

          <div class="card" style="width:100%">
            <img style="width:100%;" src="<?php echo $row['main_img']; ?>" class="card-img-top" alt="" />
            <div class="card-body" style="width:100%">
              <h5 class="card-title"><?php echo $row['title']; ?></h5>
              <p class="card-text">
                <?php echo $row['content']; ?>
              </p>

            </div>
          </div>


          <div style="display:flex; flex-direction:column; justify-content:flex-start;">
            <button type="button" id="" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up" viewBox="0 0 16 16">
                <path d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z" />
              </svg> <?php echo $row['likes']; ?></button>
            <button type="button" id="" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
              </svg></button>
            <button type="button" id="write-comment-btn" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
              </svg></button>
          </div>

        </div>

        <br />

        <!-- comment section -->

        <div id="write-comment" class="card" style=" border-width:0px; flex-shrink:0; max-height:0vh;  min-height:0; width:100%; overflow:hidden; ">

          <div class="card-text" style="padding:1em; display:flex;">


            <textarea name="" id="comment_text" cols="30" rows="1" style="flex-grow:1; margin-right:0.5em;"></textarea>
            <button onclick="fetch_comments()" class="btn btn-sm btn-secondary" style="flex-grow:0;">DONE</button>

          </div>
        </div>


        <div id="comment-root" style="width:100%">

          <?php
          while ($cq_row = mysqli_fetch_assoc($cq_res)) {

            echo '
        <div class="card" style="width:100%">
            <div class="card-body" style="width:100%">
              <h6 class="card-title">' . $cq_row['commentor_id_ref'] . '</h6>
              <p class="card-text">
                ' . $cq_row['text'] . '
              </p>
              <div style="display:flex; justify-content:space-between">
                <button type="button" id="" class="btn btn-outline-dark">Likes ' . $cq_row['likes'] . '</button>
                <button type="button" id="write-comment-btn" class="btn btn-outline-dark">Reply</button>
              </div>
            </div>
          </div>
          ';
          } ?>

        </div>
      </div>

    </div>

    <div id="rightPadding" style="flex:1 0 auto"></div>
  </div>

</body>

</html>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script>
  document.getElementById("write-comment-btn").addEventListener('click', function() {
    let el = document.getElementById('write-comment');
    let focus_el = document.getElementById('comment_text');

    if (el.classList.contains('hide')) {
      el.classList.remove('hide');

    } else {
      el.classList.add('hide');
      focus_el.focus({
        preventScroll: true
      });

      let text_comment = document.getElementById('write-comment');
      var topPos = text_comment.offsetTop;
      console.log(topPos);
      document.getElementById('scrollerble').scrollTop = topPos;
    }
  });
</script>

<script>
  function fetch_comments() {
    var comment_text = $('#comment_text').val();
    if (comment_text == "") {
      alert('no comment?');
    } else {

      data_to_send = {
        user_id: 1,
        commented_text: comment_text,
        commentor_id: 1,
        post_id: <?php echo $_GET['pn']; ?>

      };

      $.ajax({
        url: 'fetch_comments_ajax.php',
        type: 'POST',
        data: data_to_send,
        success: function(data) {
          alert('commented');

          loading_comments(data_to_send['commented_text']);
          let el = document.getElementById('write-comment');
          if (el.classList.contains('hide')) {
            el.classList.remove('hide');
          } else {
            el.classList.add('hide');
          }
        }
      });

    }
  }
</script>

<script>
  function loading_comments(text) {

    let comment_format = document.getElementById('comment_format').cloneNode();






    var root = document.getElementById('comment-root');
    root.style.width = "100%";

    var card = document.createElement('div');
    card.classList.add('card');
    card.style.width = "100%";
    var card_body = document.createElement('div');
    card_body.classList.add('card-body');
    card_body.style.width = "100%";
    card_body.style.padding = "8px";
    var card_title = document.createElement('h6');
    card_title.classList.add('card-title');
    card_title.appendChild(document.createTextNode('user ID'));
    var card_text = document.createElement('p');
    card_text.classList.add('card-text');
    card_text.appendChild(document.createTextNode(text));
    var feed_back = document.createElement('div');
    feed_back.style.display = "flex";
    feed_back.style.justifyContent = "space-between";
    var likes_btn = document.createElement('button');
    likes_btn.type = "button";
    likes_btn.classList.add('btn');
    likes_btn.classList.add('btn-outline-dark');
    likes_btn.appendChild(document.createTextNode('Likes'));
    var comment_btn = document.createElement('button');
    comment_btn.type = "button";
    comment_btn.classList.add("btn");
    comment_btn.classList.add("btn-outline-dark");
    comment_btn.appendChild(document.createTextNode('Reply'));

    feed_back.appendChild(likes_btn);
    feed_back.appendChild(comment_btn);
    card_body.appendChild(card_title);
    card_body.appendChild(card_text);
    card_body.appendChild(feed_back);
    card.appendChild(card_body);


    root.prepend(card);


  }
</script>