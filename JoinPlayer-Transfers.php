<?php
   //utf-8 Windows-1252
header('Content-Type: text/html; charset=Windows-1252');
$club = fopen('1clubdata.csv', "r");
set_time_limit(240);
while ($row = fgetcsv($club)) {
	
$needle= $row[0];
$transfer = fopen('Transfer.csv', "r");
$istrue=false;
	while ($row1 = fgetcsv($transfer)) {
		if(isset($row1[0]) && $needle==$row1[0]){
			//echo similar_text(
			echo $needle.",".$row1[0]."<br>";
			$istrue=true;break;
		}
	}
	
	/* if(!$istrue){
		echo $needle."<br>";
	} */
}

?>