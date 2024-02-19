<?php if(isset($_POST["Premium"])) {
    date_default_timezone_set('Asia/Jakarta');
    $now=date("Y-m-d");
    $date=date('Y-m-d', strtotime($now . " + 30 day"));
    $sql = "UPDATE `account` SET `Akses`='Premium' WHERE `ID`='$_SESSION[ID]'";
    $sql2 = "INSERT INTO `premium` (`Username`, `Date`) VALUES ('$_SESSION[Name]', '$date')";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    if($result){
        header('location: ./?menu=premium&buy');
    }
    else{
        echo "Request failed to send, please try again";
    }
} ?>
<body>
<?php include "Nav.php";
if ($_SESSION['Akses']=="User") {?>
<div class="card m-3 border-0">
    <div class="card-body m-3">
        <div style="font-size:20px">
            <h2 style="color:#555566; text-align:center">Premium</h2><hr>
            <div class="row">
                <div class="col-12 card bg-body-secondary shadow-sm p-4 m-1" style="text-align:center">
                    <h2><div style="color:#0C5C8A">Paket Bulanan<br>Rp 10.000</div></h2><hr>
                    Apakah anda yakin?<br><br>
                    <span class="mb-2">
                        <form action="" method="post">
                            <a href="./?menu=premium" class="btn bg-primary w-25 text-white mx-1 scalemini">Tidak</a>
                            <input class="btn bg-primary w-25 text-white mx-1 scalemini" type="submit" name="Premium" value="Iya">
                        </form>
                    </span>
                    <img src="./gambar/premiumbuy.svg" style="width: 15%; margin: auto;" class="d-lg-block d-none">
                    <img src="./gambar/premiumbuy.svg" style="width: 20%; margin: auto;" class="d-lg-none d-md-block d-none">
                    <img src="./gambar/premiumbuy.svg" style="width: 29%; margin: auto;" class="d-md-none d-sm-block d-none">
                    <img src="./gambar/premiumbuy.svg" style="width: 44%; margin: auto;" class="d-sm-none d-block">
                </div>
            </div>
        </div>
    </div>
</div>
<?php } if ($_SESSION['Akses']=="Premium") {?>
<div class="card m-3 border-0">
    <div class="card-body m-3">
        <div style="font-size:20px">
            <h2 style="color:#555566; text-align:center">Premium</h2><hr>
            <div class="row">
                <div class="col-12 card bg-body-secondary shadow-sm p-4 m-1" style="text-align:center">
                    <h2><div style="color:#0C5C8A">Paket Bulanan<br>Rp 10.000</div></h2><hr>
                    Waktu Expired<br>
                    <span id="demo"></span>
                    <p style="color:#FF9900">Selamat menikmati!</p>
                    <img src="./gambar/premiumcheck.svg" style="width: 15%; margin: auto;" class="d-lg-block d-none">
                    <img src="./gambar/premiumcheck.svg" style="width: 20%; margin: auto;" class="d-lg-none d-md-block d-none">
                    <img src="./gambar/premiumcheck.svg" style="width: 29%; margin: auto;" class="d-md-none d-sm-block d-none">
                    <img src="./gambar/premiumcheck.svg" style="width: 44%; margin: auto;" class="d-sm-none d-block">
                </div>
            </div>
        </div>
    </div>
</div>
<?php } 
$sql = "SELECT * FROM `premium` WHERE `Username`='$_SESSION[Name]'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<script>
let d = new Date("<?=$row['Date']?>");

// Set the date we're counting down to
var countDownDate = d.getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "H " + hours + "J "
  + minutes + "M";

  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</body>
</html>