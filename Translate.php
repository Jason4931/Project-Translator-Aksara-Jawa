<?php
// include "index.php";
if(isset($_POST["report"])){
    // print_r($_POST['Translate']);
    $sql2 = "INSERT INTO `reports` (`Name`, `Report`) VALUES ('$_SESSION[Name]', '$_POST[report]')";
    $result2 = $conn->query($sql2);
    if($result2){
        // header('location: ./?menu=translate');
    }
    else{
        echo '<script>alert("Request failed to send, please try again");</script>';
    }
}
// if(isset($_GET["hasil"])){
// //     $curl = curl_init();
// //     curl_setopt($curl, CURLOPT_URL, "http://127.0.0.1:8080/$_POST[translate]");
// //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// //     $response = curl_exec($curl);
// //     $responseBody = curl_multi_getcontent($curl);
// //     $jsonData = json_decode($responseBody);
// //     print_r($jsonData);
// //     curl_close($curl);
// }
?>
<body>
<?php include "Nav.php";
if ($_SESSION['Akses']=="User" || $_SESSION['Akses']=="Premium") {?>
<form method="post">
<div class="card m-3 border-0">
    <div class="card-body m-3">
        <h2 style="color:#555566">Translate Aksara Jawa</h2><hr>
        <div class="row"><h5>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-3 col-5">
                    <input type="radio" name="Translate" value="LA" class="my-2" checked id="latin">
                    <label for="latin"> Latin</label>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-7 col-5">
                    <input type="radio" name="Translate" value="AL" class="my-2" id="aksara">
                    <label for="aksara"> Aksara</label>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-2 col-2 text-end">
                    <button class="mx-1 text-end btn btn-sm text-Black" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-angle-down" style="font-size:24px; color:black"></i>
                    </button>
                    <?php if ($_SESSION['Akses']=="Premium") { ?>
                        <ul class="dropdown-menu dropdown-menu-end p-2">
                            <li><input id="murda" type="checkbox" name="Translate[murda]" value="true" checked> Aksara Murda</li>
                            <li><input id="rekan" type="checkbox" name="Translate[rekan]" value="true" checked> Aksara Rekan</li>
                            <li><input id="swara" type="checkbox" name="Translate[swara]" value="true" checked> Aksara Swara</li>
                            <li><input id="wilangan" type="checkbox" name="Translate[wilangan]" value="true" checked> Aksara Wilangan</li>
                            <li><input id="khusus" type="checkbox" name="Translate[khusus]" value="true" checked> Aksara Khusus</li>
                        </ul>
                    <?php } else { ?>
                        <ul class="dropdown-menu dropdown-menu-end p-2">
                            <li><input id="murda" type="checkbox" name="Translate[murda]" value="true" checked disabled> Aksara Murda</li>
                            <li><input id="rekan" type="checkbox" name="Translate[rekan]" value="true" checked disabled> Aksara Rekan</li>
                            <li><input id="swara" type="checkbox" name="Translate[swara]" value="true" checked disabled> Aksara Swara</li>
                            <li><input id="wilangan" type="checkbox" name="Translate[wilangan]" value="true" checked disabled> Aksara Wilangan</li>
                            <li><input id="khusus" type="checkbox" name="Translate[khusus]" value="true" checked disabled> Aksara Khusus</li>
                        </ul>
                    <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-none d-sm-none d-md-block">
                    <label>Hasil</label>
                </div>
            </div>
        </h5></div>
</form>
<form method="post" action="./ocr/processing.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <textarea onchange="translasi()" name="translate" id="awal" cols="30" rows="10" class="w-100"><?php if(isset($_GET["text"])) {
                    $str = str_replace('  ', ' ', $_GET["text"]);
                    echo trim($str);
                } ?></textarea>
                <?php if(!isset($_GET["image"])) { ?>
                    <a href="./?menu=translate&image" class="text-black"><i class="glow fa fa-camera mx-2" style="font-size:36px"></i></a>
                <?php } else { ?>
                    <a href="./?menu=translate" class="text-black"><i class="glow activeglow fa fa-camera mx-2" style="font-size:36px"></i></a>
                <?php } if(!isset($_GET["mic"])) { ?>
                    <a href="./?menu=translate&mic" class="text-black"><i class="glow fa fa-microphone mx-2" style="font-size:36px"></i></a>
                <?php } else { ?>
                    <a href="./?menu=translate" class="text-black"><i class="glow activeglow fa fa-microphone mx-2" style="font-size:36px"></i></a>
                <?php } if(isset($_GET["image"])){ ?>
                    <div class="row">
                        <div class="col-xl-7 col-12">
                            <input class="form-control mb-1 w-100" type="file" name="image" id="fileToUpload">
                        </div>
                        <div class="col-xl-5 col-12">
                            <input class="btn bg-primary text-white mb-1 w-100" type="submit" value="Convert Image to Text">
                        </div>
                        <div class="col-12">
                            <label class="btn bg-primary text-white mb-1 w-100">
                                <input style="display: none;" type="file" name="imagecam" id="fileToUpload" accept="image/*" capture="environment">Take Photo
                            </label>
                        </div>
                    </div>
                <?php } if(isset($_GET["mic"])) { ?>
                    <div class="row">
                        <div class="col-xl-7 col-12">
                            <input class="form-control mb-1 w-100" type="file" name="audio" id="fileToUpload">
                        </div>
                        <div class="col-xl-5 col-12">
                            <input class="btn bg-primary text-white mb-1 w-100" type="submit" value="Convert Audio to Text">
                        </div>
                        <div class="col-12">
                            <label class="btn bg-primary text-white mb-1 w-100">
                                <input style="display: none;" type="file" name="audiomic" id="fileToUpload" accept="audio/*" capture="user">Record Voice
                            </label>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <textarea name="hasil" id="hasil" cols="30" rows="10" class="w-100 text-black" disabled></textarea>
            </div>
        </div>
        <div class="row">
            <?php if ($_SESSION['Akses']=="Premium") {?>
                <div class="col-6">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <a class="btn bg-primary w-100 py-2 my-4 text-white scale" href="./?menu=history">History</a>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-0">
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-6">
                </div>
            <?php } ?>
            <div class="col-6 text-end">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-0">
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn bg-danger w-100 py-2 my-4 text-white scale" type="submit" name="report"><b>Report</b></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php } ?>
<script>
    // $(document).ready(function () {
    //     createCookie("teks", document.getElementById('awal').value);
    // });
    // function createCookie(name, value) {
    //     document.cookie = escape(name) + "=" + escape(value) + "; path=/";
    // }
    function replace_spasi(text) {
        text=text.replace(/ /g, "");
        return text;
    }
    async function translasi() {
        // fetch('http://127.0.0.1:8080/'+document.getElementById('awal').value, {
        //     mode: 'no-cors'
        // })

        // .then(response => {
        //     console.log(response)
        //     response.text()
        // })
        // .then(text => document.getElementById('hasil').value = text)
        // .catch(error => console.error('Error:', error));

        // .then(response => response.json())
        // .then(data => {
        //     const posts = data.data.children.map(child => child.data);
        //     console.log(posts.map(post => post));
        // })
        // .catch(error => console.error(error));

        // .then(response=>response.json())
        // .then(data=>{ console.log(data); })

        // .then(response => {
        //     if (!response.ok) {
        //         throw new Error(response);
        //     }
        //     document.getElementById('hasil').value = response.text();
        // })

        let aksara = document.getElementById('aksara');
        const isaksaraChecked = aksara.checked;
        if (isaksaraChecked) {aksara=true;} else {aksara=false;}

        let murda = document.getElementById('murda');
        let rekan = document.getElementById('rekan');
        let swara = document.getElementById('swara');
        let wilangan = document.getElementById('wilangan');
        let khusus = document.getElementById('khusus');
        const ismurdaChecked = murda.checked;
        const isrekanChecked = rekan.checked;
        const isswaraChecked = swara.checked;
        const iswilanganChecked = wilangan.checked;
        const iskhususChecked = khusus.checked;

        if (ismurdaChecked) {murda=true;} else {murda=false;}
        if (isrekanChecked) {rekan=true;} else {rekan=false;}
        if (isswaraChecked) {swara=true;} else {swara=false;}
        if (iswilanganChecked) {wilangan=true;} else {wilangan=false;}
        if (iskhususChecked) {khusus=true;} else {khusus=false;}
        
        let translasi = document.getElementById('awal').value;
        translasi=replace_spasi(translasi);
        const output = await runPhpScript('./code.php', {
            translasi: translasi,
            aksara: aksara,
            murda: murda,
            rekan: rekan,
            swara: swara,
            wilangan: wilangan,
            khusus: khusus
        });
        document.getElementById('hasil').value = output.hasil;
        console.log(output.hasil);
    }
    async function runPhpScript(scriptUrl, data) {
        console.log(data);
        const response = await fetch(scriptUrl+'?translasi='+data.translasi+'&aksara='+data.aksara+'&murda='+data.murda+'&rekan='+data.rekan+'&swara='+data.swara+'&wilangan='+data.wilangan+'&khusus='+data.khusus, {
            method: 'GET',
            headers: {
            'Content-Type': 'application/json'
            }
        });
        const output = await response.json();
        return output;
    }
</script>
</body>
</html>