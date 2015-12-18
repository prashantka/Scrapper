<?php
   header('Content-Type: text/html; charset=Windows-1252');
   
$scrape1 = fopen('scrape1.csv', "r");

while ($row = fgetcsv($scrape1)) {
	
	$needle = $row[5];
	$year = $row[4];
	$scrap = fopen('manager13-15ExlCSv.csv', "r");
	$istrue=false;
		while ($row1 = fgetcsv($scrap)) {
			if(isset($row1[2]) && $needle==$row1[2] && $year=$row1[1]){
				echo $row1[0]."<br>";//.",".$row1[0].",".$row1[2].",".$row1[3]."<br>";
				$istrue=true;
				break;
			}
		}
		
		if(!$istrue){
			echo "<br>";//$needle.",XX,XX,XX"."<br>";
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