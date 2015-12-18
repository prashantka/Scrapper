<?php
   header('Content-Type: text/html; charset=Windows-1252');
$scrape1 = fopen('withManagerExlcsv.csv', "r");

while ($row = fgetcsv($scrape1)) {
	
	$needle = $row[1];
	$year = $row[4];
	$scrap = fopen('positionsExlCsv.csv', "r");
	$istrue=false;
		while ($row1 = fgetcsv($scrap)) {
			if(isset($row1[1]) && $needle==$row1[0] && $year=$row1[2]){
				echo $row1[1]."<br>";//.",".$row1[0].",".$row1[2].",".$row1[3]."<br>";
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