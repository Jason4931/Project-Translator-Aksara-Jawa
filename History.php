<?php
$sql = "SELECT * FROM `history` WHERE `Name`='$_SESSION[Name]' ORDER BY `ID` DESC LIMIT 15";
$result = $conn->query($sql);
?>
<body>
<?php include "Nav.php";
if ($_SESSION['Akses']=="Premium") {?>
<div class="card m-3 border-0">
    <div class="card-body m-3">
        <h2 style="color:#555566">Translate Aksara Jawa</h2><hr>
        <div class="row text-center mb-2"><h5>
            <label>History</label>
        </h5></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <p class="card-text" style="text-align: justify;">
                    <?php if (mysqli_num_rows($result)>0) {
                        while($row = $result->fetch_assoc()) {
                            if($row["History"] != ""){
                                echo $row["History"]."<br>";
                            }
                        }
                    } ?>
                    </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <a class="btn bg-primary w-100 py-2 my-4 text-white scale" href="./?menu=translate">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</body>
</html>