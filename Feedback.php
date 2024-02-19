<?php
if (isset($_POST["comment"])) {
    $sql = "SELECT * FROM `comment` WHERE `Name`='$_SESSION[Name]'";
    $result = $conn->query($sql);
    date_default_timezone_set("Asia/Jakarta");
    $date=date("Y-m-d");
    if (mysqli_num_rows($result)==0){
        $sql2 = "INSERT INTO `comment` (`Comment`, `Date`, `Name`) VALUES ('$_POST[Comment]', '$date', '$_SESSION[Name]')";
    }
    else {
        $sql2 = "UPDATE `comment` SET `Comment`='$_POST[Comment]',`Date`='$date',`Name`='$_SESSION[Name]' WHERE `Name`='$_SESSION[Name]'";
    }
    $result2 = $conn->query($sql2);
    if($result2){
        header('location: ./?menu=feedback');
    }
    else{
        echo "Request failed to send, please try again";
    }
}
$sqlcomment = "SELECT * FROM `comment` LIMIT 10";
$resultcomment = $conn->query($sqlcomment);
$sqlr = "SELECT * FROM `rating` WHERE `Name`='$_SESSION[Name]'";
$resultr = $conn->query($sqlr);
$rowr = $resultr->fetch_assoc();
if (isset($_POST["r"])) {
    $sqlr = "SELECT * FROM `rating` WHERE `Name`='$_SESSION[Name]'";
    $resultr = $conn->query($sqlr);
    if (mysqli_num_rows($resultr)==0) {
        $sql2 = "INSERT INTO `rating` (`Rate`,`Name`) VALUES ('$_POST[r]','$_SESSION[Name]')";
    }
    else {
        $sql2 = "UPDATE `rating` SET `Rate`='$_POST[r]',`Name`='$_SESSION[Name]' WHERE `Name`='$_SESSION[Name]'";
    }
    $result2 = $conn->query($sql2);
    if($result2){
        header('location: ./?menu=feedback');
    }
    else{
        echo "Request failed to send, please try again";
    }
}
$sqlrating = "SELECT * FROM `rating`";
$resultrating = $conn->query($sqlrating);
?>
<body>
  <?php include "Nav.php";
  if ($_SESSION['Akses']=="User" || $_SESSION['Akses']=="Premium") {?>
  <div class="card m-3">
    <div class="card-body m-3">
        <!-- <a class="navbar-brand" href="#">Navbar scroll</a> -->
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button> -->
        <!-- <h6 class="card-subtitle mb-2 text-body-secondary">aa</h6> -->
        <h2 style="color:#555566">Comments</h2><hr>
        <form action="" method="post" class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                <label class="form-label py-1"> Berikan Komentar: </label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-9">
                <?php if(isset($_POST['Comment'])) { ?>
                    <input class="form-control" type="text" name="Comment" value="<?=$_POST['Comment']?>">
                <?php } else { ?>
                    <input class="form-control" type="text" name="Comment">
                <?php } ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                <input class="btn bg-primary text-white scale" type="submit" name="comment" value="Kirim"><br>
            </div>
        </form><br>
        <?php
        if (mysqli_num_rows($resultcomment)>0) {
            while($row = $resultcomment->fetch_assoc()) {
                echo $row["Name"]." ".$row["Date"]." ";
                $sqlrate = "SELECT * FROM `rating` WHERE `Name`='$row[Name]'";
                $resultrate = $conn->query($sqlrate);
                if (mysqli_num_rows($resultrate)>0) {
                    while($rowrate = $resultrate->fetch_assoc()) {
                        echo "★".$rowrate["Rate"];
                    }
                }
                echo "<br>".$row["Comment"]."<br><br>";
            }
        }
        ?>
        <h2 style="color:#0891C0">Rating</h2>
        <?php if (mysqli_num_rows($resultr)>0) {
            $rate=$rowr["Rate"];
        }
        else{
            $rate=10;
        }?>
        <form action="" method="post" class="row" id="rform">
            <div class="col-lg-5 col-md-6 col-sm-7">
                <input type="range" class="form-range py-3" min="0" max="10" step="1" name="r" id="range" onchange="rating()" value="<?=$rate?>">
            </div>
            <!-- <div class="col-3">
                <input class="btn bg-primary text-white" type="submit" name="rating" value="Kirim"><br>
            </div> -->
        </form><br>
        <?php
        $rata=0;
        if (mysqli_num_rows($resultrating)>0) {
            while($row = $resultrating->fetch_assoc()) {
                $r=$row["Rate"];
                $rata=$rata+$r;
            }
            $hasil=$rata/mysqli_num_rows($resultrating);
            echo "Rata-Rata: ".$hasil;
        }
        ?>
        <!-- <p class="card-text" style="text-align: justify;">Selamat datang di Translator Aksara Jawa. Alat ini memungkinkan Anda dengan mudah mengonversi teks antara bahasa Latin dan aksara Jawa. Alat ini membantu Anda memperluas pemahaman dan apresiasi terhadap bahasa ini. Selamat menikmati!</p>
        <h5 class="card-title" style="color:#0891C0">Pendahuluan</h5>
        <p class="card-text" style="text-align: justify;">
            Aksara Jawa adalah sistem tulisan yang digunakan untuk menulis bahasa Jawa. Aksara Jawa juga dikenal sebagai aksara Hanacaraka, yang terdiri dari 20 huruf dasar dan beberapa bentuk modifikasi. Aksara ini memiliki sejarah yang panjang dan kaya di pulau Jawa, Indonesia, dan digunakan untuk menulis berbagai jenis teks, termasuk naskah sastra, agama, sejarah, dan lain-lain.
            Aksara Jawa memiliki bentuk-bentuk yang artistik dan beragam, serta memiliki nilai budaya dan historis yang kuat di kalangan masyarakat Jawa. Meskipun seiring waktu, penggunaan aksara Jawa telah mengalami penurunan dalam kehidupan sehari-hari karena penggunaan huruf Latin lebih umum dalam komunikasi modern. Namun, upaya untuk melestarikan dan mempelajari aksara Jawa terus berlanjut melalui pendidikan, seni, dan budaya lokal.</p> -->
    </div>
  </div>
  <?php } ?>
<script>
    function rating(){
        document.getElementById('rform').submit();
    }
</script>
</body>
</html>