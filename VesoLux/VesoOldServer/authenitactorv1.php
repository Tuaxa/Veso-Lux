<?php

rootroot

$baglan=mysqli_connect("localhost","epiz_31834455","","epiz_31834455_zerdar");

$key=$_GET["pirokey"];

$disid=$_GET["disid"];

if ($baglan->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

function create_guid() { // Create GUID (Globally Unique Identifier)

    $guid = '';

    $namespace = rand(11111, 99999);

    $uid = uniqid('', true);

    $data = $namespace;

    $data .= $_SERVER['REQUEST_TIME'];

    $data .= $_SERVER['HTTP_USER_AGENT'];

    $data .= $_SERVER['REMOTE_ADDR'];

    $data .= $_SERVER['REMOTE_PORT'];

    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));

    $guid = substr($hash,  0,  8) . '-' .

            substr($hash,  8,  4) . '-' .

            substr($hash, 12,  4) . '-' .

            substr($hash, 16,  4) . '-' .

            substr($hash, 20, 12);

    return $guid;

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

if($cek["keyz"]==$key && $cek["discordid"]==$disid && $cek["ip"]==getUserIP())

{

$yiterkey = create_guid();

    $sorgu = $baglan->query("UPDATE VL SET uid = '".$yiterkey."' WHERE usid = ".$cek["usid"]);

echo base64_encode($yiterkey);

die();

}

else if($cek["keyz"]==$key && $cek["discordid"]==$disid)

{

     die("Auth Error : V-C-1");

}

else if($cek["ip"]==getUserIP() && $cek["discordid"]==$disid)

{

    die("Auth Error : V-C-2");

}

else if($cek["keyz"]==$key && $cek["ip"]==getUserIP())

{

    die("Auth Error : V-C-3");

}



}



?>