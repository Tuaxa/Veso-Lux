<?php

rootroot

$baglan=mysqli_connect("localhost","epiz_31834455","","epiz_31834455_zerdar");

$key=$_GET["pirokey"];

$uid=$_GET["uid"];

$hwid=$_GET["hwid"];



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



if($cek["uid"]==$uid && $cek["ip"]==getUserIP() && $cek["keyz"]==$key)

{

    if($cek["first"] == "1")

    {

    $sorgu = $baglan->query("UPDATE VL SET hwid = '".$hwid."' WHERE usid = ".$cek["usid"]);

    echo  base64_encode($hwid);

    }

    else

    {



    }

}

else if($cek["uid"]!=$uid && $cek["ip"]==getUserIP() && $cek["keyz"]==$key)

{

     die("Auth Error : V-H-2");

}

else if($cek["uid"]==$uid && $cek["ip"]==getUserIP() && $cek["keyz"]!=$key)

{

    die("Auth Error : V-H-3");

}

else if($cek["uid"]==$uid && $cek["ip"]!=getUserIP() && $cek["keyz"]==$key)

{

    die("Auth Error : V-H-1");

}

  

}



?>