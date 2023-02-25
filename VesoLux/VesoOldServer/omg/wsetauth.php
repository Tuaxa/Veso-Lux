<?php
$piro=$_GET["omg"];
if($piro == "selamgirlssw9oıree2jr54yh234yg32yu74g3u24gu23g4yuh43yuyug324ghyu32gyhu4h32yu4h23")
{}
else
{
return;
}
$baglan=mysqli_connect("localhost","root","","vesolux");
$del=$_GET["del"];
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
$sec = "SELECT * FROM VesoDatas";
$sonuc=$baglan->query($sec);
while($cek=$sonuc->fetch_assoc())
{

if($del == "0")
{
$int_value = (int) $cek["executions"]+1;
$int_value1 = (int) $cek["onlineuser"]+1;
$int_value2 = (int) $cek["totalauthed"]+1;
$sorgu = $baglan->query("UPDATE `VesoDatas` SET `executions` = '".$int_value."', `onlineuser` = '".$int_value1."', `totalauthed` = '".$int_value2."' WHERE `VesoDatas`.`bos` = 1;");
echo "yes|".$int_value."|".$int_value1."|".$int_value2;
$pval = "yes";
return;
}
if($del == "1")
{
$int_value = (int) $cek["executions"];
$int_value1 = (int) $cek["onlineuser"]-1;
if ($int_value1 < 0)
{
$int_value1 = 0;   
}
$int_value2 = (int) $cek["totalauthed"];
$sorgu = $baglan->query("UPDATE `VesoDatas` SET `executions` = '".$int_value."', `onlineuser` = '".$int_value1."', `totalauthed` = '".$int_value2."' WHERE `VesoDatas`.`bos` = 1;");
echo "yes|".$int_value."|".$int_value1."|".$int_value2;
$pval = "yes";
return;
}

}
if ($pval == "no")
{
echo "Auth Set Fail";
return;
}
?>