<?php

$curl = curl_init();

$latitude = $_POST['lat'];
$longitude = $_POST['lon'];
$driverEmailID = $_POST['driverEmailId'];
$speed = $_POST['speed'];

//$latitude="22.22222222";
//$longitude="88.8888888";

/*$valueData = array(
    "loc_lat"=>$latitude,
    "loc_lng"=>$longitude,
    "alt"=>"129.54683239",
    "bearing"=>"296.0",
    "accuracy"=>"15.0",
    "time_stamp"=>1488454913743,
    "status"=>4,
    "curr_speed"=>120.00,
    "is_mock"=>true

);
echo "\nValue Data =>".$valueData;
$valueJsonEncoded = json_encode($valueData);
echo "\n\nValue Data Encoded=>".$valueJsonEncoded;
$postBodyData = array(
    "key"=>"satyadriver@hexa.com",
    "value"=>$valueJsonEncoded
);

echo "\n\nPost Bof Data".$postBodyData;
$postBodyDataJsonEncoded = json_encode($postBodyData);
echo "\n\nPost Bof Data Encoded".$postBodyDataJsonEncoded;
$completePostData = array(
    "records"=>$$postBodyDataJsonEncoded
);
echo "\n\nComplete Post Data".$completePostData;
$completePostDataJsonEncoded = json_encode($completePostData);
echo "\n\nComplete Post Data Encoded".$completePostDataJsonEncoded;
*/

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://4alzlx.hexarides.com/T2kKcZenR7",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
 // CURLOPT_POSTFIELDS => $completePostDataJsonEncoded,
    CURLOPT_POSTFIELDS => "{\"records\":[{\"key\":\"".$driverEmailID."\", \"value\":{\"loc_lat\":\"".$latitude."\",\"loc_lng\":\"".$longitude."\",\"alt\":\"129.00000000\",\"bearing\":\"296.0\",\"accuracy\":\"15.0\",\"time_stamp\":\"1488454913743\",\"sequence\":\"126\",\"status\":\"4\",\"curr_speed\":\"".$speed."\",\"is_mock\":true}}]}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\n",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/vnd.kafka.json.v1+json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$info = curl_getinfo($curl);
echo "Status Code==>".$info["http_code"];
curl_close($curl);

if ($err) {
  echo "\ncURL Error #:" . $err;
} else {
    echo"\n\n---------------\n";
  echo "\n".$response;
}