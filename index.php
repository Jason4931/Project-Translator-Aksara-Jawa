<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "translator_aksara_jawa";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    };
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    };
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cantarell&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: "Cantarell";
    }
    .glow:hover {
        opacity: 0.8;
        color: #0d6efd;
    }
    .activeglow {
        color: #555566;
    }
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
    .scalesm {
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
    .scalesm:hover {
        scale: 102.5%;
        transition-timing-function: ease-out;
        transition: scale 0.5s;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
exec("cd C:\xampp\htdocs\Project Translator Aksara Jawa\TranslateAksara; npm start");
if(!isset($_SESSION['ID'])) {
    if(isset($_GET['login'])){
        $title="Login - Translator Aksara Jawa";
        include "Login.php";
    }
    else if(isset($_GET['register'])){
        $title="Register - Translator Aksara Jawa";
        include "Register.php";
    }
    else {
        $title="Translator Aksara Jawa";
        include "Landing.php";
    }
}
else if(isset($_GET['logout'])){
    include "Logout.php";
}
else{
    $sql = "SELECT * FROM `premium` WHERE `Username`='$_SESSION[Name]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $now=date("Y-m-d");
    if($result->num_rows>0 && $now > $row["Date"]) {
        $sql = "UPDATE `account` SET `Akses`='User' WHERE `ID`='$_SESSION[ID]'";
        $result = $conn->query($sql);
        $sql2 = "DELETE FROM `premium` WHERE `Username`='$_SESSION[Name]'";
        $result2 = $conn->query($sql2); 
        $_SESSION["Akses"]="User";
    }
    if(!isset($_GET['menu'])){
        $_GET['menu']=null;
    }
    switch ($_GET['menu']) {
        case "translate":
            $title="Translate - Translator Aksara Jawa";
            $_SESSION["Active"]="translate";
            include "Translate.php";
            break;
        case "history":
            $title="Translate - Translator Aksara Jawa";
            $_SESSION["Active"]="translate";
            include "History.php";
            break;
        case "feedback":
            $title="Feedback - Translator Aksara Jawa";
            $_SESSION["Active"]="feedback";
            include "Feedback.php";
            break;
        case "premium":
            $title="Premium - Translator Aksara Jawa";
            $_SESSION["Active"]="premium";
            include "Premium.php";
            break;
        case "premiumM":
            $title="Premium - Translator Aksara Jawa";
            $_SESSION["Active"]="premium";
            include "PremiumM.php";
            break;
        case "premiumMM":
            $title="Premium - Translator Aksara Jawa";
            $_SESSION["Active"]="premium";
            include "PremiumM+.php";
            break;
        case "materi":
            $title="Materi - Translator Aksara Jawa";
            $_SESSION["Active"]="materi";
            include "Materi.php";
            break;
        case "moderator":
            $title="Moderator - Translator Aksara Jawa";
            $_SESSION["Active"]="moderator";
            include "Moderator.php";
            break;
        case "reports":
            $title="Reports - Translator Aksara Jawa";
            $_SESSION["Active"]="reports";
            include "Reports.php";
            break;
        default:
            $title="Home - Translator Aksara Jawa";
            $_SESSION["Active"]="home";
            include "Home.php";
            break;
    }
}
?><title><?=$title?></title>
</html>