<?php
require('db.php');

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="beno2.php">BENO</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="news.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex me-auto">
        <input class="form-control " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

    </div>
    <div style="display:flex"> </div>
    <div style="display:flex"> </div>
    <div style="display:flex"> </div>
    <div style="display:flex"> </div>
    <div style="display:flex"> </div>
    <div style="display:flex"> </div>
    <div style="display:flex"> </div>
    <a class="nav-link active me-2" aria-current="page" id="loginLink" href="#">LOGIN</a>
    <a class="nav-link active me-2" aria-current="page" id="registerLink" href="#">REGISTER</a>
  </div>
</nav>

<script>
  el1 = document.getElementById('loginLink');
  el2 = document.getElementById('registerLink');
  document.getElementsByClassName('navbar-toggler')[0].addEventListener('click', () => {

      if (el1.hidden) {
        el1.hidden = false;
      } else {
        el1.hidden = true;
      }
      if (el2.hidden) {
        el2.hidden = false;
      } else {
        el2.hidden = true;
      }
    }

  )
</script>