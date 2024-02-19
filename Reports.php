<?php
$sql = "SELECT * FROM `reports`";
$result = $conn->query($sql);
if(isset($_GET['delete'])){
  $sql = "DELETE FROM `reports` WHERE `ID`='$_GET[delete]'";
  $result = $conn->query($sql);
  if ($result) {
  header("location: ./?menu=reports");
  }
  else{
  header("location: ./?menu=reports");
  }
}
?>
<body>
  <?php include "Nav.php";?>
  <div class="card m-3">
    <div class="card-body m-3">
      <div class="row">
        <div class="col-sm-8 col-12">
          <h5 class="card-title" style="color:#0891C0">Reports</h5>
          <p class="card-text" style="text-align: justify;">
          <?php if (mysqli_num_rows($result)>0) {
            while($row = $result->fetch_assoc()) {
              ?><div class="row my-1">
                <div class="col-lg-4 col-md-5 col-sm-6 col-6">
                  <?php echo $row["Name"].": ".$row["Report"]; ?>
                </div>
                <div class="col-1">
                  <?php echo "<a class='btn btn-primary btn-sm scalemini' href='./?menu=reports&delete=".$row['ID']."'>Delete</a>"; ?>
                </div>
              </div>
            <?php }
          } ?>
          </p>
        </div>
        <div class="col-sm-4 col-12">
          <img src="./gambar/report.svg" style="width: 100%;">
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>