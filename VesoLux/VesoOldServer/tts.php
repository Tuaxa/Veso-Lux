<?php
rootroot
$baglan=mysqli_connect("localhost","epiz_31834455","","epiz_31834455_zerdar");

$key=$_GET["pirokey"];

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



function replace($piro)

{

 $piro = str_replace("'", '', $piro);

$piro = str_replace('"', '', $piro);

$piro = str_replace('`', '', $piro);

return $piro;

}

function generateRandomString($length = 10) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];

    }

    return $randomString;

}

$yitersd = generateRandomString(4);



echo"<form action='".str_replace("/ves/","",$_SERVER["SCRIPT_NAME"])."' method='post'>

<div></div>

<textarea name='dsid'>Discord Id here (e.g. 962716499452243968)</textarea>

<div></div>

<textarea name='mail'>Mail here (e.g. tuaxapiro@gmail.com)</textarea>

<div></div>

<textarea name='usnm'>Username here (e.g. Piro Tuaxa)</textarea>

<div></div>

<textarea name='dcna'>Discord Name And Tag here (e.g. Tuaxa#9999)</textarea>

<div></div>

<div>Write sure</div>

<textarea name='gonderdd'>Write Here sure</textarea>

<div></div>

<input type='submit' name='gonder' value='if you write click here' />

</form>";

//INSERT INTO `VL` (`ip`, `keyz`, `discordid`, `uid`, `hwid`, `mailto`, `username`, `dcname`, `pass`, `first`, `usid`) VALUES ('31', '31', '31', '31', '31', '', '31', '31', '31', '31', '1');

if ($_POST['gonder'])

{

$belge = fopen(str_replace("/ves/","",$_SERVER["SCRIPT_NAME"]).".old",'r+');

$icerik = fread($belge, filesize(str_replace("/ves/","",$_SERVER["SCRIPT_NAME"]).".old"));

if($icerik == "1")

{

    echo"trying to crack. BOZO! :) v-a-1";

}

else

{

if($_POST['gonderdd'] == "sure")

{

$data1 = $_POST['dsid'];

$data2 = $_POST['mail'];

$data3 = $_POST['usnm'];

$data4 = $_POST['dcna'];

$sec = "SELECT * FROM VL";

$sonuc=$baglan->query($sec);

$usid = 0;

while($cek=$sonuc->fetch_assoc())

{

if($cek["ip"]!=getUserIP() && $cek["discordid"]!=$data1 && $cek["mailto"]!=$data2 && $cek["username"] != $data3 && $cek["dcname"] != $data4)

{

//$usid = $cek["usid"];

}

elseif($cek["ip"]==getUserIP())

{

echo"same ip found in database. please contact admins";

die();

}

elseif($cek["discordid"]==$data1)

{

echo"same discord id found in database. please contact admins";

die();

}

elseif($cek["mailto"]==$data2)

{

echo"same mail id found in database. please contact admins";

die();

}

elseif($cek["username"] == $data3)

{

echo"same username id found in database. please contact admins";

die();

}

elseif($cek["dcname"] == $data4)

{

echo"same discord name id found in database. please contact admins";

die();

}



}



touch(str_replace("/ves/","",$_SERVER["SCRIPT_NAME"]).".old","1");

while($cek=$sonuc->fetch_assoc())

{

if($cek["ip"]==getUserIP() && $cek["discordid"]==$data1 && $cek["mailto"]==$data2 && $cek["username"] == $data3 && $cek["dcname"] == $data4)

{

$usid = $cek["usid"];

}

echo "admins will give more information please wait. Deleating this page on 5 second. <h1>Your ?d copied to clipboard please save it.</h1>".str_replace("/ves/","",$_SERVER["SCRIPT_NAME"]).$_POST['gonder'] ;





}



echo "

<input type='text' name='mytext' id='mytext'  value='".base64_encode($usid.$data3."-")."'> 

<script>

function copyText()

{

var mytext = document.getElementById('mytext');	

	

mytext.select(); //select text field



document.execCommand('copy');  //Copy text

}	

copyText()

</script>";

$data55 = generateRandomString(20);

$sorgu = $baglan->query("INSERT INTO `VL` (`ip`, `keyz`, `discordid`, `uid`, `hwid`, `mailto`, `username`, `dcname`, `pass`, `first`, `usid`) VALUES ('".getUserIP()."', '".generateRandomString(20)."', '".replace($data1)."', 'new user', 'new user', '".replace($data2)."', '".replace($data3)."', '".replace($data4)."', '".$data55."', '1', '');");



//=======================================================================================================

// Create new webhook in your Discord channel settings and copy&paste URL

//=======================================================================================================



$webhookurl = "https://discord.com/api/webhooks/987447116135796806/zv11FDzNaWfX-ucgmBsaLj7VZTs6ATmTy-PftZ_b4o1tc6hRMB_fn1q6gSHF_ttnf3Vi";



//=======================================================================================================

// Compose message. You can use Markdown

// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting

//========================================================================================================



$timestamp = date("c", strtotime("now"));



$json_data = json_encode([

    // Message

    "content" => "biri kay?t oldu lan bilgileri : ",

    

    // Username

    "username" => "piro of piro hook",



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

            "title" => "biri daha geldi :)",



            // Embed Type

            "type" => "rich",



            // Embed Description

            "description" => "güzel 150 robux daha geldi",



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

                    "name" => "Name",

                    "value" => $data3,

                    "inline" => true

                ],

                 [

                    "name" => "Discord Name",

                    "value" => $data4,

                    "inline" => false

                ],

                // Field 2

                [

                    "name" => "Discord Id",

                    "value" =>  $data1,

                    "inline" => true

                ], [

                    "name" => "ip",

                    "value" => getUserIP(),

                    "inline" => false

                ],[

                    "name" => "Mail",

                    "value" => $data2,

                    "inline" => false

                ],

                [

                    "name" => "Auth.tuaxa kodu (bunun için bir dosya aç?n ad?n? Auth.tuaxa yap?n içine alttaki kodu yap??t?r?p adama at?n)",

                    "value" =>  base64_encode(base64_encode($data2).",".base64_encode($data55).",".base64_encode($data1)),

                    "inline" => false

                ],

                [

                    "name" => "Adamın vermesi gereken kod : ",

                    "value" =>  base64_encode($usid.$data3."-"),

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







unlink(str_replace("/ves/","",$_SERVER["SCRIPT_NAME"]));

unlink(str_replace("/ves/","",$_SERVER["SCRIPT_NAME"]).".old");

}

}

}









?>

