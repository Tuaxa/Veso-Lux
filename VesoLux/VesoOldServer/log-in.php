<?php

rootroot

$baglan=mysqli_connect("localhost","epiz_31834455","","epiz_31834455_zerdar");

$email=$_GET["email"];

$disid=$_GET["disid"];

if ($baglan->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}



function getUserIP()

{

    // Get real visitor IP behind CloudFlare network

    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {

              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

    }

    $client  = @$_SERVER['HTTP_CLIENT_IP'];

    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

    $remote  = $_SERVER['REMOTE_ADDR'];



    if(filter_var($client, FILTER_VALIDATE_IP))

    {

        $ip = $client;

    }

    elseif(filter_var($forward, FILTER_VALIDATE_IP))

    {

        $ip = $forward;

    }

    else

    {

        $ip = $remote;

    }



    return $ip;

}





$sec = "SELECT * FROM VL";

$sonuc=$baglan->query($sec);

while($cek=$sonuc->fetch_assoc())

{

if($cek["email"]==$email && $cek["discordid"]==$disid && $cek["ip"]==getUserIP())

{



echo base64_encode($cek["keyz"]);

die();

}

else if($cek["email"]==$email && $cek["discordid"]==$disid)

{

     die("Login Error : V-C-1");

}

else if($cek["ip"]==getUserIP() && $cek["discordid"]==$disid)

{

    die("Login Error : V-C-2");

}

else if($cek["email"]==$email && $cek["ip"]==getUserIP())

{

    die("Login Error : V-C-3");

}



}



?>