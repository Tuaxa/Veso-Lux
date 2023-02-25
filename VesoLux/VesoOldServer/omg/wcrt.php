<?php
$piro=$_GET["omg"];
if($piro == "selamgirlssw9oıree2jr54yh234yg32yu74g3u24gu23g4yuh43yuyug324ghyu32gyhu4h32yu4h23")
{}
else
{
return;
}
$baglan=mysqli_connect("localhost","root","","vesolux");
$username=$_GET["uname"];
$type=$_GET["type"];
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
    $guid = base64_encode(substr($hash,  0,  8)) . '-' .
            base64_encode(substr($hash,  8,  4)) . '-' .
            base64_encode(substr($hash, 12,  4)) . '-' .
            base64_encode(substr($hash, 16,  4)) . '-' .
            base64_encode(substr($hash, 20, 12));
    return $guid;
}
$sec = "SELECT * FROM VesoSocket";
$sonuc=$baglan->query($sec);
while($cek=$sonuc->fetch_assoc())
{

if($cek["username"] == $username && $username != "" || $username == "")
{
echo "Username Taken Or Empty";
return;
}
if($cek["discordid"] == $disid && $disid != "" || $disid == "")
{
echo "Discord Id Taken Or Empty";
return;
}


}
$key = create_guid();
$sorgu = $baglan->query("INSERT INTO `VesoSocket` (`keyz`, `hwid`, `ip`, `okey`, `username`,`type`, `discordid`, `usid`) VALUES ('".$key."', 'new user', 'new user', 'new user', '".$username."', '".$type."', '".$disid."', NULL);");
echo $key;
?>