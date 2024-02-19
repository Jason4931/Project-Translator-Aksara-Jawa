<body>
  <?php include "Nav.php";
  $sql = "SELECT * FROM `materi`";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if (mysqli_num_rows($result)>0) {
    $text=$row["Text"];
  } 
  if ($_SESSION['Akses']=="Premium") { ?>
  <div class="card m-3">
    <div class="card-body m-3">
      <!-- <a class="navbar-brand" href="#">Navbar scroll</a> -->
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button> -->
      <!-- <h6 class="card-subtitle mb-2 text-body-secondary">aa</h6> -->
      <p class="card-text" style="text-align: justify;"><?=$text?></p>
      <!-- <h5 class="card-title" style="color:#0891C0">Pendahuluan</h5> -->
      <!-- <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a> -->
    </div>
  </div>
  <?php } if ($_SESSION['Akses']=="Admin") {?>
  <div class="card m-3">
    <div class="card-body m-3">
      <a class="btn bg-primary w-100 py-2 my-2 text-white scalesm" href="./?menu=materi&edit">Edit</a>
      <?php if(isset($_GET["edit"])){ ?>
        <form method="post" class="card p-4 bg-body-secondary shadow-sm mx-4">
          <?php if(!isset($_POST["change"])) { ?>
            <textarea name="teks" id="" cols="30" rows="10"><?=$text?></textarea>
          <?php } ?>
          <button class="btn bg-primary w-100 py-2 my-2 text-white" type="submit" name="change">Submit</button>
        </form>
        <?php if(isset($_POST["change"])){
          $sql = "UPDATE `materi` SET `Text`='$_POST[teks]'";
          $result = $conn->query($sql);
          if ($result) {
            header("location: ./?menu=materi");
          }
          else{
            header("location: ./?menu=materi&edit");
          }
        }
      } ?>
      <p class="card-text" style="text-align: justify;"><?=$text?></p>
    </div>
  </div>
  <?php } ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>