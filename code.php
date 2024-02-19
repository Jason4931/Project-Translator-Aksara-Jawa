<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "translator_aksara_jawa";
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://127.0.0.1:8080/$_GET[translasi]/$_GET[aksara]/$_GET[murda]/$_GET[rekan]/$_GET[swara]/$_GET[wilangan]/$_GET[khusus]");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$responseBody = curl_multi_getcontent($curl);
$jsonData = json_decode($responseBody);
// print_r($jsonData);
// echo $jsonData->hasil;
if($_GET['translasi'] != "") {
    $sql = "INSERT INTO `history` (`Name`, `History`) VALUES ('$_SESSION[Name]', '$_GET[translasi]')";
    $result = $conn->query($sql);
}
echo $responseBody;
curl_close($curl);
?>