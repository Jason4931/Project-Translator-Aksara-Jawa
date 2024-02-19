<?php
$home="";
$translate="";
$feedback="";
$premium="";
$materi="";
$moderator="";
$reports="";
if($_SESSION["Active"] == "home"){
  $home="active";
}
else if($_SESSION["Active"] == "translate"){
  $translate="active";
}
else if($_SESSION["Active"] == "feedback"){
  $feedback="active";
}
else if($_SESSION["Active"] == "premium"){
  $premium="active";
}
else if($_SESSION["Active"] == "materi"){
  $materi="active";
}
else if($_SESSION["Active"] == "moderator"){
  $moderator="active";
}
else if($_SESSION["Active"] == "reports"){
  $reports="active";
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <!-- <a class="navbar-brand" href="#">Navbar scroll</a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link <?=$home?>" href="./?menu=home">Home</a>
          </li>
          <?php if($_SESSION['Akses']=="User") {?>
            <li class="nav-item">
              <a class="nav-link <?=$translate?>" href="./?menu=translate">Translate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$feedback?>" href="./?menu=feedback">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$premium?>" href="./?menu=premium">Premium</a>
            </li>
          <?php } if($_SESSION['Akses']=="Premium") {?>
            <li class="nav-item">
              <a class="nav-link <?=$translate?>" href="./?menu=translate">Translate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$feedback?>" href="./?menu=feedback">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$premium?>" href="./?menu=premium">Premium</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$materi?>" href="./?menu=materi">Materi</a>
            </li>
          <?php } if($_SESSION['Akses']=="Moderator") {?>
            <li class="nav-item">
              <a class="nav-link <?=$moderator?>" href="./?menu=moderator">Moderator</a>
            </li>
          <?php } if($_SESSION['Akses']=="Admin") {?>
            <li class="nav-item">
            <a class="nav-link <?=$moderator?>" href="./?menu=moderator">Moderator</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$materi?>" href="./?menu=materi">Materi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?=$reports?>" href="./?menu=reports">Reports</a>
            </li>
          <?php } ?>
        </ul>
        <div class="d-flex">
          <span class="mx-2 text-end"><a href="" style="text-decoration:none"><?=$_SESSION["Name"]?></a><a href="./?logout" class="nav-link scalesm">Logout</a></span>
          <img class="d-block float-end" src="./gambar/Logov2-NoBG.png" alt="" width="50px">
        </div>
      </div>
    </div>
</nav>