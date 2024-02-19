<?php
if (isset($_POST["email"]) && isset($_POST["password"])) {
  $sql = "SELECT * FROM `account` WHERE `Email`='$_POST[email]' and `Password`='$_POST[password]'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if (mysqli_num_rows($result)>0) {
    $_SESSION["Name"]=$row["Username"];
    $_SESSION["ID"]=$row["ID"];
    $_SESSION["Akses"]=$row["Akses"];
    header('location: ./?menu=home');
  }
  else {
    echo '<script>alert("User tidak ditemukan atau Password salah");</script>';
  }
}
?>
<body class="d-flex align-items-center py-4 bg-body-tertiary" style="overflow-x: hidden; background-image: url('./gambar/Bruh2.png'); background-repeat: no-repeat; background-size: cover;">
<main class="container-fluid w-100 m-auto">
  <div class="row">
    <div class="col-lg-8 col-md-8">

    </div>
    <div class="col-lg-4 ml-auto col-md-4">
      <form method="post" class="card p-4 bg-body-secondary shadow-sm mx-4">

        <img class="mb-4 mx-auto d-block" src="./gambar/Logov2-NoBG.png" alt="" width="100">
        <h1 class="h3 my-4">Log In</h1>
    
        <div>
          <input name="email" type="email" class="form-control my-2 py-2" placeholder="Email" required>
        </div>
        <div>
          <input name="password" type="password" class="form-control my-2 py-2" placeholder="Password" required>
        </div>
    
        <button class="btn bg-primary w-100 py-2 my-2 text-white scalemini" type="submit">Login</button>
        <div class="text-center mt-4">
          <label>Tidak punya akun?</label><br>
          <label><a href="./?register" style="text-decoration:none">Register</a></label>
        </div>
      </form>
    </div>
  </div>
</main>
</html>