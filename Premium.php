<body>
<?php include "Nav.php";?>
<div class="card m-3 border-0">
    <div class="card-body m-3">
        <h2 style="color:#555566; text-align:center">Premium</h2><hr>
        <?php if(isset($_GET['buy'])) { ?>
            <p style="margin: auto" class="text-center">
                <img src="./gambar/premiumbuyed.svg" style="width: 20%; margin: auto;" class="d-lg-block d-none">
                <img src="./gambar/premiumbuyed.svg" style="width: 28%; margin: auto;" class="d-lg-none d-md-block d-none">
                <img src="./gambar/premiumbuyed.svg" style="width: 38%; margin: auto;" class="d-md-none d-sm-block d-none">
                <img src="./gambar/premiumbuyed.svg" style="width: 53%; margin: auto;" class="d-sm-none d-block">
                <br>Silahkan login kembali untuk berubah!
            </p>
        <?php } ?>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align:center">
                <a href="./?menu=premiumM" class="card bg-body-secondary shadow-sm p-4 m-1 scalemini" style="text-decoration:none">
                    <div style="font-size:20px">
                        <h2><div style="color:#0C5C8A">Paket Bulanan<br>Rp 10.000</div></h2><hr>
                        Pilihan Translate lebih banyak<br><br>
                        <img src="./gambar/Centang.png" alt="" width="50" class="mx-auto"><br><br>
                        Materi Lengkap Aksara Jawa<br><br>
                        <img src="./gambar/Centang.png" alt="" width="50" class="mx-auto"><br><br>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align:center">
                <a href="./?menu=premiumMM" class="card bg-body-secondary shadow-sm p-4 m-1 scalemini" style="text-decoration:none">
                    <div style="font-size:20px">
                        <h2><div style="color:#0C5C8A">Paket Bulanan+<br>Rp 12.000</div></h2><hr>
                        Pilihan Translate lebih banyak<br>
                        <img src="./gambar/Centang.png" alt="" width="46" class="mx-auto"><br>
                        Materi Lengkap Aksara Jawa<br>
                        <img src="./gambar/Centang.png" alt="" width="46" class="mx-auto"><br>
                        Simpanan History<br>
                        <img src="./gambar/Centang.png" alt="" width="46" class="mx-auto"><br>
                        OCR & Audio Transcribing<br>
                        <img src="./gambar/Centang.png" alt="" width="46" class="mx-auto"><br>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>