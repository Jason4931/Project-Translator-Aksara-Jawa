<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .scale {
            scale: 100%;
            transition-timing-function: ease-out;
            transition: scale 0.5s;
        }
        .scalemini {
            scale: 100%;
            transition-timing-function: ease-out;
            transition: scale 0.5s;
        }
        .scale:hover {
            scale: 110%;
            transition-timing-function: ease-out;
            transition: scale 0.5s;
        }
        .scalemini:hover {
            scale: 105%;
            transition-timing-function: ease-out;
            transition: scale 0.5s;
        }
    </style>
</head>
<body class="align-items-center bg-body-tertiary" style="overflow-x: hidden; background-image: url('./gambar/Bruh5.png'); background-repeat: no-repeat; background-size:contain; background-position:center;">
    <nav class="navbar bg-body-secondary w-100 border-bottom">
        <div class="container-fluid">
        <div class="d-block w-100" id="navbarScroll">
            <img class="" src="./gambar/Logov2-NoBG.png" alt="" width="50px">    
            <div class="d-flex float-end">
            <span class="mx-2 text-end"><a href="" class="btn bg-primary py-1 my-2 text-white scalemini">Menu</a></span>
            <div class="dropdown-center">
                <button class="mx-2 text-end btn bg-primary py-1 my-2 text-white scalemini" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Kontak
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#" onclick="nokontak()">+62 0877-8096-6355</a></li>
                </ul>
            </div>
            <span class="mx-2 text-end"><a href="./?login" class="btn bg-primary py-1 my-2 text-white scalemini">Login</a></span>
            </div>
        </div>
        </div>
    </nav>
    <div class="container my-4 pt-4 pb-2">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h3 class="card-title" style="color:#03D8F5">All-in-One Translator Aksara Jawa</h3>
                <h2 class="card-title" style="color:#0C5C8A">Website translator</h2>
                <br><br>
                <p class="card-text" style="text-align: justify;">
                Sulit mempelajari aksara jawa di internet yang terpisah-pisah?<br>
                Fitur-Fitur All-in-One berikut akan membantu anda!
                <b><ol>
                    <li>Translate aksara jawa dan kebalikannya</li>
                    <li>Photo scanner + Voice recognition</li>
                    <li>Modifikasi pilihan translate aksara jawa</li>
                    <li>Simpanan histori translate</li>
                    <li>Membaca materi lengkap aksara jawa</li>
                </ol></b>
                <a class="btn bg-primary w-50 py-2 my-4 text-white scale" href="./?login">Mulai Translate Sekarang</a>
                </p>
            </div>
            <div class="col-lg-4 ml-auto col-md-4 py-4">
                <h1 class="my-4 py-4" onmouseover="normal()" onmouseout="hilang()" style="color:#0891C0; text-align:center; vertical-align:middle;">
                <span>Aksara</span><br><span hidden id="aksara" style="color:#555555">ꦄꦏ꧀ꦱꦫ</span><br><span>Jawa</span><br><span hidden id="jawa" style="color:#555555">ꦗꦮ</span></h1>
            </div>
        </div>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top bg-body-secondary">
        <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 mb-md-0 text-body-secondary text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        </a>
        <button onclick="copy()" style="border:0px"><h4><span class="glow mb-3 mb-md-0">Share<i class="fa fa-share-alt mx-2 pt-1" style="font-size:24px"></i></span></h4></button>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex me-4">
        <!-- <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#whatsapp"/></svg></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#youtube"/></svg></a></li> -->
        <a href="mailto:emmanuel.jason2008@gmail.com" target="_blank" class="text-black"><i class="glow fa fa-envelope mx-2" style="font-size:36px"></i></a>
        <a href="https://wa.me/qr/7RNEDM4CWMQSE1" target="_blank" class="text-black"><i class="glow fa fa-whatsapp mx-2" style="font-size:36px"></i></a>
        <a href="https://instagram.com/jason49316?igshid=NzZlODBkYWE4Ng==" target="_blank" class="text-black"><i class="glow fa fa-instagram mx-2" style="font-size:36px"></i></a>
        <a href="https://www.youtube.com/channel/UCOdyM-68Ha0TKOahFRWNQqA" target="_blank" class="text-black"><i class="glow fa fa-youtube-play mx-2" style="font-size:36px"></i></a>
        </ul>
    </footer>
    <script>
    function hilang() {
    document.getElementById("jawa").hidden=true;
    document.getElementById("aksara").hidden=true;
    }
    function normal() {
    document.getElementById("jawa").hidden=false;
    document.getElementById("aksara").hidden=false;
    }
    function copy() {
    let link = "localhost" + window.location.pathname;
    navigator.clipboard.writeText(link);
    alert("Link Copied");
    }
    function nokontak() {
        navigator.clipboard.writeText("+62 0877-8096-6355");
    }
</script>
</body>
</html>