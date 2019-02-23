<?php
// Method : POST, PUT, GET , etc
// Data : array("param" => "value) ==> index.php?param=value
// Source :

function call($method, $url, $data = false )
{

    $curl = curl_init();

    if ($method == "POST") {
       curl_setopt($curl,CURLOPT_POST,1);

       if ($data)
         curl_setopt($curl, CURL_POSTFIELDS, $data);
    } 
    else {
      if($data)
      $url = sprint("%s?%s", $url, http_build_query($data));
    }

    //Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_sepopt($curl, CURLOPT_USERPWD,"username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    curl_close($curl);

    return $result;

}

$url = "http://localhost:3000/api/org.operatingsystem.biznet.Share";

$res = call("GET",$url);
var_dump($res);

echo "\n";
?>
