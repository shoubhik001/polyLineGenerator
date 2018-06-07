<?php
//Generate Encoded Polyline Algorithm Format for Google Static Maps API
// http://bit.ly/sw3deL (Japanese)
// http://bit.ly/tnKt4m (English)
function encodeGPolyline($path){
	$enc = "";
	$old = true;
	foreach($path as $latlng){
		if($old === true){
			$enc .= encodeGPolylineNum($latlng[0]).
			        encodeGPolylineNum($latlng[1]);
		}else{
			$enc .= encodeGPolylineNum($latlng[0] - $old[0]).
			        encodeGPolylineNum($latlng[1] - $old[1]);
		}
		$old = $latlng;
	}
	return $enc;
}
 
function encodeGPolylineNum($num){
	$fu = false;
	if($num < 0){
		$fu = true;
	}
	//STEP2
	$num = round($num * 100000);
	//STEP3
	//$num = decbin($num);
	//STEP4
	$num = $num << 1;
	//STEP5
	if($fu){
		$num = ~$num;
	}
	//STEP6 - STEP7
	$num = decbin($num);
	$n = str_split($num);
	$num = array();
	$nn = "";
	for($c=count($n)-1;$c >= 0;$c--){
		$nn = $n[$c].$nn;
		if(strlen($nn) == 5){
			array_push($num,$nn);
			$nn = "";
		}
	}
	if(strlen($nn)>0){
		$nn = str_repeat("0",5 - strlen($nn)).$nn;
		array_push($num,$nn);
	}
	//STEP8 - STEP9 - STEP10 - STEP11
 
	for($c = 0;$c < count($num);$c++){
		if($c != count($num)-1){
			$num[$c] = chr(bindec($num[$c]) + 32 + 63);
		}else{
			$num[$c] = chr(bindec($num[$c]) + 63);
		}
	}
	return implode("",$num);
}
 
//例
echo encodeGPolylineNum(-179.9832104);
echo "<br/><br/>";
echo encodeGPolyline(
	array(
		array(38.5,-120.2),array(40.7,-120.95),array(43.252,-126.453)
	)
);
?>