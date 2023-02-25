<?php
$piro=$_GET["omg"];
if($piro == "selamgirlssw9oıree2jr54yh234yg32yu74g3u24gu23g4yuh43yuyug324ghyu32gyhu4h32yu4h23")
{}
else
{
return;
}
$baglan=mysqli_connect("localhost","root","","vesolux");
$key=$_GET["keyz"];
$hwid=$_GET["hwid"];
$ip=$_GET["ip"];
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
$pval = "no";
$sec = "SELECT * FROM VesoSocket";
$sonuc=$baglan->query($sec);
while($cek=$sonuc->fetch_assoc())
{
if($cek["keyz"]==$key && $cek["ip"]=="new user" && $cek["hwid"]=="new user" )
{
echo"NewUser";
$pval = "yes";
return;    
}
elseif($cek["keyz"]==$key && $cek["ip"]==$ip && $cek["hwid"]==$hwid && $cek["ip"]!="new user" && $cek["hwid"]!="new user" )
{
$yiterkey = create_guid();
$sorgu = $baglan->query("UPDATE VesoSocket SET okey = '".$yiterkey."' WHERE usid = ".$cek["usid"]);
echo $yiterkey."|1Auth";
$pval = "yes";
return;
}


}
if ($pval == "no")
{
echo "Auth Fail";
return;
}
?>