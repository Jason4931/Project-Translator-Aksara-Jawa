<?php
$sqlc = "SELECT * FROM `comment` ORDER BY `ID` DESC";
$resultc = $conn->query($sqlc);
$sqla = "SELECT * FROM `account`";
$resulta = $conn->query($sqla);
if(isset($_GET['deletea'])){
    $sqla = "DELETE FROM `account` WHERE `ID`='$_GET[deletea]'";
    $resulta = $conn->query($sqla);
    if ($resulta) {
    header("location: ./?menu=moderator");
    }
    else{
    header("location: ./?menu=moderator");
    }
}
if(isset($_POST['edita'])){
    $sqla = "UPDATE `account` SET `Username`='$_POST[username]',`Email`='$_POST[email]',`Password`='$_POST[password]',`Akses`='$_POST[akses]' WHERE `ID`='$_GET[edita]'";
    $resulta = $conn->query($sqla);
    if ($resulta) {
    header("location: ./?menu=moderator");
    }
    else{
    header("location: ./?menu=moderator");
    }
}
if(isset($_GET['deletec'])){
    $sqlc = "DELETE FROM `comment` WHERE `ID`='$_GET[deletec]'";
    $resultc = $conn->query($sqlc);
    if ($resultc) {
    header("location: ./?menu=moderator");
    }
    else{
    header("location: ./?menu=moderator");
    }
}
if(isset($_GET['inputsearch'])){
    $sql = "SELECT * FROM `account` WHERE `Username`='$_GET[inputsearch]'";
    $resulta = $conn->query($sql);
}
?>
<body>
<?php include "Nav.php"; ?>
<div class="card m-3 border-0">
    <div class="card-body m-3">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-12 rounded-3" style="text-align:center; background-color:#F9F9F9">
                        <h2>Akun</h2>
                    </div>
                    <div class="col-12">
                        <div style="font-size:20px" class="card bg-body-secondary shadow-sm p-4 m-1">
                            <form action="" method="get">
                                <div class="row">
                                    <div class="col-lg-10 col-md-9 col-sm-8 col-12">
                                        <input hidden name="menu" value="moderator">    
                                        <input class="form-control" type="text" name="inputsearch" placeholder="Username">
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-12">
                                        <input class="btn bg-primary text-white btn-sm scale" type="submit" name="search" value="Search">
                                    </div>
                                </div>
                            </form>
                            <br>
                            <?php
                            if (mysqli_num_rows($resulta)>0) {
                            while($row = $resulta->fetch_assoc()) {
                                ?><form method="post">
                                <div class="row">
                                    <?php if((isset($_GET['edita']) && $row['ID']==$_GET['edita']) || !isset($_GET['edita'])) { ?>
                                    <div class="col-lg-8 col-md-7 col-sm-6">
                                        <?php echo $row["Username"]." [".$row["Akses"]."]<br>"; ?>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-6 text-end">
                                        <?php
                                        if(!isset($_GET['edita'])) {
                                            echo "<a class='btn btn-primary btn-sm scalemini' href='./?menu=moderator&edita=".$row['ID']."'>Edit</a>";
                                        }
                                        else if(isset($_GET['edita'])) {
                                            echo '<button class="btn btn-primary btn-sm scalemini" type="submit" name="edita">Done</button>';
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-6">
                                        <?php echo "<a class='btn btn-primary btn-sm scalemini' href='./?menu=moderator&deletea=".$row['ID']."'>Delete</a>"; ?>
                                    </div>
                                    <?php }
                                    if(isset($_GET['edita']) && $row['ID']==$_GET['edita']) { ?>
                                        <hr class="mt-2">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-5 col-sm-6">
                                                Username :
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-6 mb-1">
                                                <input name="username" type="text" class="form-control py-2 border-warning" value="<?php echo $row["Username"] ?>" required>
                                            </div>
                                            <div class="col-lg-4 col-md-5 col-sm-6">
                                                Email :
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-6 mb-1">
                                                <input name="email" type="text" class="form-control py-2 border-warning" value="<?php echo $row["Email"] ?>" required>
                                            </div>
                                            <div class="col-lg-4 col-md-5 col-sm-6">
                                                Password :
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-6 mb-1">
                                                <input name="password" type="text" class="form-control py-2 border-warning" value="<?php echo $row["Password"] ?>" required>
                                            </div>
                                            <div class="col-lg-4 col-md-5 col-sm-6">
                                                Akses :
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-6 mb-1">
                                                <input name="akses" type="text" class="form-control py-2 border-warning" value="<?php echo $row["Akses"] ?>" required>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                </form>
                                <?php }
                            }
                            else{
                                echo "Data tidak ditemukan";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col-12 rounded-3" style="text-align:end; background-color:#F9F9F9">
                    <div class="row">
                        <?php if(!isset($_GET['aksara'])) { ?>
                            <div class="col-8">
                                <h2>Komentar</h2>
                            </div>
                            <?php if($_SESSION['Akses']=="Admin") {?>
                            <div class="col-4">
                                <a class='btn btn-primary btn-sm my-2 scale' href='./?menu=moderator&aksara'>Aksara</a>
                            </div>
                            <?php }?>
                        <?php } if(isset($_GET['aksara'])) { ?>
                            <div class="col-7">
                                <h2>Aksara</h2>
                            </div>
                            <div class="col-5">
                                <a class='btn btn-primary btn-sm my-2 scale' href='./?menu=moderator'>Komentar</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12">
                    <div style="font-size:20px" class="card bg-body-secondary shadow-sm p-4 m-1">
                        <?php
                            if(!isset($_GET['aksara'])) {
                                if (mysqli_num_rows($resultc)>0) {
                                while($row = $resultc->fetch_assoc()) {
                                    ?><div class="row">
                                        <div class="col-lg-10 col-md-9 col-sm-8">
                                            <?php echo $row["Name"].": ".$row["Comment"]; ?>
                                        </div>
                                        <div class="col-2">
                                            <?php echo "<a class='btn btn-primary btn-sm scalemini' href='./?menu=moderator&deletec=".$row['ID']."'>Delete</a>"; ?>
                                        </div>
                                    </div>
                                <?php }
                                }
                            }
                            if(isset($_GET['aksara'])) {
                                $sqlaksara = "SELECT * FROM `aksara`";
                                $resultaksara = $conn->query($sqlaksara);
                                if (mysqli_num_rows($resultaksara)>0) {
                                    while($row = $resultaksara->fetch_assoc()) {
                                        echo $row["Text"].": ".$row["Aksara"]."<br>";
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>