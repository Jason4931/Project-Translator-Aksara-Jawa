<body style="overflow-x: hidden;">
  <?php include "Nav.php";
  if ($_SESSION['Akses']=="User" || $_SESSION['Akses']=="Premium") {?>
  <div class="card m-3">
    <div class="card-body m-3">
      <!-- <a class="navbar-brand" href="#">Navbar scroll</a> -->
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button> -->
      <!-- <h6 class="card-subtitle mb-2 text-body-secondary">aa</h6> -->
      <p class="card-text" style="text-align: justify;">Selamat datang di Translator Aksara Jawa. Alat ini memungkinkan Anda dengan mudah mengonversi teks antara bahasa Latin dan aksara Jawa. Alat ini membantu Anda memperluas pemahaman dan apresiasi terhadap bahasa ini. Selamat menikmati!</p>
      <h5 class="card-title" style="color:#0891C0">Pendahuluan</h5>
      <p class="card-text" style="text-align: justify;">
        Aksara Jawa adalah sistem tulisan yang digunakan untuk menulis bahasa Jawa. Aksara Jawa juga dikenal sebagai aksara Hanacaraka, yang terdiri dari 20 huruf dasar dan beberapa bentuk modifikasi. Aksara ini memiliki sejarah yang panjang dan kaya di pulau Jawa, Indonesia, dan digunakan untuk menulis berbagai jenis teks, termasuk naskah sastra, agama, sejarah, dan lain-lain.
        Aksara Jawa memiliki bentuk-bentuk yang artistik dan beragam, serta memiliki nilai budaya dan historis yang kuat di kalangan masyarakat Jawa. Meskipun seiring waktu, penggunaan aksara Jawa telah mengalami penurunan dalam kehidupan sehari-hari karena penggunaan huruf Latin lebih umum dalam komunikasi modern. Namun, upaya untuk melestarikan dan mempelajari aksara Jawa terus berlanjut melalui pendidikan, seni, dan budaya lokal.</p>
      <!-- <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a> -->
    </div>
  </div>
  <div class="row mt-3">
    <div class="col me-md-2 mx-5 mt-3">
      <div class="card bg-primary scale">
        <a href="./?menu=translate" style="text-decoration:none;">
          <img src="./gambar/translate.svg" class="p-2 card-img-top bg-white" height="150">
          <div class="card-body text-white text-center">
            Translate Disini
          </div>
        </a>
      </div>
    </div>
    <div class="col mx-md-2 mx-5 mt-3">
      <div class="card bg-primary scale">
        <a href="./?menu=feedback" style="text-decoration:none;">
          <img src="./gambar/feedback.svg" class="p-2 card-img-top bg-white" height="150">
          <div class="card-body text-white text-center">
            Beri Feedback
          </div>
        </a>
      </div>
    </div>
    <div class="col mx-md-2 mx-5 mt-3">
      <div class="card bg-primary scale">
        <a href="./?menu=premium" style="text-decoration:none;">
          <img src="./gambar/premium.svg" class="p-2 card-img-top bg-white" height="150">
          <div class="card-body text-white text-center">
            Beli Premium
          </div>
        </a>
      </div>
    </div>
    <?php if($_SESSION['Akses']=="Premium") { ?>
      <div class="col ms-md-2 mx-5 mt-3">
        <div class="card bg-primary scale">
          <a href="./?menu=materi" style="text-decoration:none;">
            <img src="./gambar/materi.svg" class="p-2 card-img-top bg-white" height="150">
            <div class="card-body text-white text-center">
              Baca Materi
            </div>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
  <?php } if ($_SESSION['Akses']=="Moderator" || $_SESSION['Akses']=="Admin") {?>
  <div class="card m-3">
    <div class="card-body m-3">
      <p class="card-text" style="text-align: justify;">Selamat datang di Translator Aksara Jawa. Alat ini memungkinkan Anda dengan mudah mengonversi teks antara bahasa Latin dan aksara Jawa. Alat ini membantu Anda memperluas pemahaman dan apresiasi terhadap bahasa ini. Selamat menikmati!</p>
      <h5 class="card-title" style="color:#0891C0">History Translate</h5>
      <div class="row">
        <div class="col-lg-8 col-sm-6 col-12">
        <p class="card-text" style="text-align: justify;"><?php
          $sql = "SELECT * FROM `history` ORDER BY `ID` DESC LIMIT 30";
          $result = $conn->query($sql);
          if (mysqli_num_rows($result)>0) {
            while($row = $result->fetch_assoc()) {
              if($row["History"] != ""){
                echo $row["Name"].": ".$row["History"]."<br>";
              }
            }
          }
        ?></p>
        </div>
        <div class="col-lg-4 col-sm-6 col-12 mt-5">
          <img src="./gambar/history.svg" style="width: 100%;">
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>