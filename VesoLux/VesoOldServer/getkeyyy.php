<?php

$baglan=mysqli_connect("localhost","root","","vesolux");
$key=$_GET["pirokey"];
$disid=$_GET["disid"];
$email=$_GET["smel"];
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
if($cek["pass"]==$key && $cek["discordid"]==$disid && $cek["ip"]==getUserIP() && $cek["mailto"] == $email)
{
echo base64_encode(base64_encode($cek["keyz"]).",".create_guid());
die();
}
else if($cek["pass"]==$key && $cek["discordid"]==$disid && $cek["ip"]!=getUserIP() && $cek["mailto"] == $email)
{
     die("Username Error : V-K-1");
}
else if($cek["pass"]==$key && $cek["discordid"]==$disid && $cek["ip"]==getUserIP() && $cek["mailto"] != $email)

{
    die("Username Error : V-K-4");
}
else if($cek["pass"]==$key && $cek["discordid"]!=$disid && $cek["ip"]==getUserIP() && $cek["mailto"] == $email)
{
    die("Username Error : V-K-2");
}
else if($cek["pass"]!=$key && $cek["discordid"]==$disid && $cek["ip"]==getUserIP() && $cek["mailto"] == $email)
{
    die("Username Error : V-K-3");
}

}

?>