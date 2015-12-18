<?php

header('Content-Type: text/html; charset=Windows-1252');



//$s=3;$team="as-saint-etienne";

for($s=4;$s<=5;$s++){
/* 
$arrayofteams=array("ac-ajaccio","as-nancy","as-saint-etienne","estac-troyes","evian-thonon-gaillard","fc-lorient","fc-sochaux","girondins-bordeaux","lille-osc","montpellier-hsc","ogc-nice","olympique-lyon","olympique-marseille","paris-saint-germain","sc-bastia","stade-brest","stade-reims","stade-rennes","toulouse-fc","valenciennes-fc"); */
	$arrayofteams=array("ac-ajaccio","as-nancy","estac-troyes","fc-sochaux","stade-brest","valenciennes-fc");
	foreach($arrayofteams as $team){

$url="http://www.worldfootball.net/teams/$team/201".$s."/2/";
$html = file_get_contents($url); //get the html returned from the following url

$table_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){
   
    //if any html is actually returned

    $table_doc->loadHTML($html);
    libxml_clear_errors(); //remove errors for yucky html

    $xpath = new DOMXPath($table_doc);
    $rows = $xpath->query('//table[@class="standard_tabelle"]');

    
    foreach ($rows as $row) {
        
        $something=str_word_count($row->nodeValue, 2);
        $playerArray=preg_split("/\s+/", $row->nodeValue);
        $position="";$k=0;
        $line="";
		$managerCount=0;
        while($k<sizeof($playerArray)){
            if($playerArray[$k]=="Goalkeeper"){
				
                $position=$playerArray[$k];
                $k++;continue;
            }else if($playerArray[$k]=="Defender"){
                $position="Defender";$k++;continue;
            }
            else if($playerArray[$k]=="Midfielder"){
                $position=$playerArray[$k];$k++;continue;
            }
            else if($playerArray[$k]=="Forward"){
                $position=$playerArray[$k];$k++;continue;
            }
            else if($playerArray[$k]=="Ass. Manager"){
                $position=$playerArray[$k];$k++;continue;
            }
            else if($playerArray[$k]=="Manager"){
				$managerCount++;
				if($managerCount==1)
				$position=$playerArray[$k];
			    echo $playerArray[$k+1]." ".$playerArray[$k+2].",".$playerArray[$k+3].",";
				$y=$s-1;
				echo "201".$y."/1".$s;echo ",".$team."<br>";
			    break;
            }
            else if($playerArray[$k]=="Goalkeeper-Coach"){
                $position=$playerArray[$k];$k++;continue;
            }
            if (preg_match('/\//', $playerArray[$k])){
				/* if (!ctype_digit($playerArray[$k-3])) {
				echo $playerArray[$k-3]." ";
				}
                echo $playerArray[$k-2].",".$position.",";
				$y=$s-1;
				echo "201".$y."/1".$s;echo ",".$team;
                print("<br>"); */
				$k++;
            }else{
					$k++;
            }
          }
        break;
    }
}
 }
 }
?>


