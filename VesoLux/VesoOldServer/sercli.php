<?php

$baglan=mysqli_connect("localhost","root","","vesolux");
$key=$_GET["pirokey"];
$uid=$_GET["uid"];
$hwid=$_GET["hwid"];
$timedm=$_GET["mise"];

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

if ((int)strftime("%M",time()+date("Z",time())) == (int)$timedm)
{}else{die("Auth Error : V-S-3");}
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

function genkey()
{
    $time = time();
$check = $time+date("Z",$time);

$timed = (int)strftime("%M", $check)*35;

$ip = (int)str_replace(".","",getUserIP())*66;
return $timed;
}

$sec = "SELECT * FROM VL";
$sonuc=$baglan->query($sec);
while($cek=$sonuc->fetch_assoc())
{
if($cek["uid"]==$uid && $cek["hwid"]==$hwid && $cek["keyz"]==$key)
{
$yiter = (int)str_replace("-","",genkey())*$cek["usid"];
echo base64_encode("H1L2")."-".base64_encode("LuaGuardKey")."-".base64_encode($yiter.$cek["discordid"])."-".base64_encode("C2S3")."-".base64_encode("-")."-".base64_encode("CR2")."-".base64_encode($cek["uid"].$cek["hwid"]);
//=======================================================================================================
// Create new webhook in your Discord channel settings and copy&paste URL
//=======================================================================================================

$webhookurl = "https://discord.com/api/webhooks/989287472938749993/uKtAwuwLSyaaoZObfPLl2cof31xGFp3bt7efu14_Smu2ljA0NlXwBWzEg2Del5ZbL-0T";

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================

$timestamp = date("c", strtotime("now"));
    $time = time();
$check = $time+date("Z",$time);

$timed = (int)strftime("%M", $check)*35;
$json_data = json_encode([
    // Message
    "content" => "Authentication",
    
    // Username
    "username" => "Romantik Osmanım -> Ormantik Usmanım -> Urmantik Usmanım",

    // Avatar URL.
    // Uncoment to replace image set in webhook
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => "Bir Client Auth Oldu.",

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "Auth Ver : V1B",

            // URL of title link

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "3366ff" ),

            // Footer

            // Thumbnail
            //"thumbnail" => [
            //    "url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=400"
            //],

            // Author


            // Additional Fields array
            "fields" => [
                // Field 2
                [
                    "name" => "Hwid",
                    "value" => $cek["hwid"]."-".$hwid,
                    "inline" => true
                ],
                 [
                    "name" => "Key",
                    "value" =>  $cek["keyz"]."-".$key,
                    "inline" => false
                ],
                // Field 2
                [
                    "name" => "Guid (uid)",
                    "value" =>  $cek["uid"]."-".$uid,
                    "inline" => true
                ], [
                    "name" => "Ip",
                    "value" => $cek["ip"]."-".getUserIP(),
                    "inline" => false
                ],[
                    "name" => "Zaman",
                    "value" => $timed,
                    "inline" => false
                ],
                [
                    "name" => "şimdi burda crack varsa ne yapcaz diyorsan oku imanlı kardeşim ilim irfan öğreteyim az :",
                    "value" =>  "1.Dizilimler : Dizilimleri anlatayım mesela hwidden örnek vereyim **DataBasedeki Hwid-Bilgisayarın verdiği hwid** üsteki veriler böyle dizilmiştir. ikisi uymuyorsa sorun vardır.
                    2.Zaman uyumsuzluğu (mesela seninki 59 burdaki 58 veya 60 1-2 dklık kayma olabilir sorun etmeyin) : mesela seninki 1 burdaki 10 biraz şüphelenmek lazım.
                    3.Hwid uyumsuzluğu : Bilgisayarın verdiği databasedeki ile uyuyormu uymuyormu kontrol edin (uymuyorsa bu gelmez ama belki hata çıkar insan gücüde önemli.)
                    4.Guid uyumuszluğu : Bilgisayarın verdiği databasedeki ile uyuyormu uymuyormu kontrol edin (uymuyorsa bu gelmez ama belki hata çıkar insan gücüde önemli.)
                    5.Key uyumuszluğu : Bilgisayarın verdiği databasedeki ile uyuyormu uymuyormu kontrol edin (uymuyorsa bu gelmez ama belki hata çıkar insan gücüde önemli.)
                    5.Ip uyumuszluğu : Bilgisayarın verdiği databasedeki ile uyuyormu uymuyormu kontrol edin (uymuyorsa bu gelmez ama belki hata çıkar insan gücüde önemli.)
                    bu kadar.",
                    "inline" => false
                ],
                // Field 2
                
                // Etc..
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );
die();
}
else if($cek["uid"]==$uid && $cek["keyz"]==$key)
{
     die("Auth Error : V-S-1");
}
else if($cek["hwid"]==$hwid && $cek["keyz"]==$key)
{
    die("Auth Error : V-S-2");
}
else if($cek["uid"]==$uid && $cek["hwid"]==$hwid)
{
    die("Auth Error : V-S-4");
}   
}

?>