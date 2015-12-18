<?php
   
header('Content-Type: text/html; charset=Windows-1252');
$scrape1 = fopen('tempScrap1Exlcsv.csv', "r");

while ($row = fgetcsv($scrape1)) {
	
$needle= $row[2];$year= $row[12];
$scrap = fopen('withManagerExlcsv.csv', "r");
$istrue=false;
	while ($row1 = fgetcsv($scrap)) {
		if(isset($row1[1]) && $needle==$row1[1] && $year=$row1[4]){
			echo $row1[1].",".$row1[0].",".$row1[2].",".$row1[3].",".$row1[6].",".$row1[7].",".$row1[8]."<br>";//.",".$row1[7].",".$row1[8]."<br>";
			$istrue=true;break;
		}
	}
	
	if(!$istrue){
		echo $needle.",XX,XX,XX"."<br>";
	}
}



function searchForId($id, $array) {
   foreach ($array as $key => $val) {
       if ($val['uid'] === $id) {
           return $key;
       }
   }
   return null;
}
?>