<?php

 header('Content-Type: text/html; charset=utf-8');
for($s=3;$s<=5;$s++){
	//$arrayofteams=array("ac-ajaccio","as-nancy","as-saint-etienne","estac-troyes","evian-thonon-gaillard","fc-lorient","fc-sochaux","girondins-bordeaux","lille-osc","montpellier-hsc","ogc-nice","olympique-lyon","olympique-marseille","paris-saint-germain","sc-bastia","stade-brest","stade-reims","stade-rennes","toulouse-fc","valenciennes-fc");
	$arrayofteams=array("as-monaco","ea-guingamp","fc-nantes","fc-metz","rc-lens","sm-caen");
	foreach($arrayofteams as $team){
	
	$url="http://www.worldfootball.net/teams/$team/201".$s."/2/";
	print("<a href=$url>$url</a>");echo "<br>";
	}
	print("<br>");
}

?>