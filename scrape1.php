<?php
 header('Content-Type: text/html; charset=utf-8');
 for($ligue=2;$ligue<3;$ligue++){
 for($s=3;$s<=4;$s++){
/* $arrayofteams2012=array("ac-ajaccio","as-nancy","as-saint-etienne","estac-troyes","evian-thonon-gaillard","fc-lorient","fc-sochaux","girondins-bordeaux","lille-osc","montpellier-hsc","ogc-nice","olympique-lyon","olympique-marseille","paris-saint-germain","sc-bastia","stade-brest","stade-reims","stade-rennes","toulouse-fc","valenciennes-fc");
$arrayofteams=array("as-monaco","ea-guingamp","fc-nantes","fc-metz","rc-lens","sm-caen"); */
$arrayofteams=array("ac-ajaccio","as-nancy","estac-troyes","fc-sochaux","stade-brest","valenciennes-fc");
foreach($arrayofteams as $team){

	$j=$s+1;
	
		$url="http://www.worldfootball.net/team_performance/".$team."/fra-ligue-".$ligue."-201".$s."-201".$j."/";
		 $html = file_get_contents($url); //get the html returned from the following url

		$table_doc = new DOMDocument();

		libxml_use_internal_errors(TRUE); //disable libxml errors

		if(!empty($html)){ 
			
			//if any html is actually returned

			$table_doc->loadHTML($html);
			libxml_clear_errors(); //remove errors for yucky html

			$pokemon_xpath = new DOMXPath($table_doc);
		//class="dunkel"
			//get all the h2's with an id
			$pokemon_row = $pokemon_xpath->query('//td[@class="hell"]');
			printLines($pokemon_row,$s,$j,$team,$ligue);
			/* if($pokemon_row->length > 0){
				$i=0;$strig="";
				foreach($pokemon_row as $row){
					if($i<10){
						$strig.=$row->nodeValue . ",";
						$i++;
					}
					if($i>=10){
					   //  echo "<br/>";
						 
						 $strig.="";
						 echo $strig."<br>";
						 $i=0;
						 $strig="";
					}        
					//print_r($row)."<br>";
				}
			} */
		   // print("<br>");
			$pokemon_row = $pokemon_xpath->query('//td[@class="dunkel"]');
			printLines($pokemon_row,$s,$j,$team,$ligue);
			/* if($pokemon_row->length > 0){
				$i=0;
				foreach($pokemon_row as $row){ 
					if($i<10 && $row->nodeValue!=" "){
						echo $row->nodeValue . ",";
						$i++;
					}
					if($i>=10){
						 echo "<br/>";
						 $i=0;
					}        
					//print_r($row)."<br>";
				}
			}   */  
		}

	
 }
 } 
 }
 function printLines($pokemon_row,$s,$j,$team,$ligue){
	 if($pokemon_row->length > 0){
				$i=0;  
				foreach($pokemon_row as $row){ 
					if($i<10 && $row->nodeValue!=" "){
						echo $row->nodeValue . ",";
						$i++;
					}
					if($i>=10){
						echo "201".$s."/1".$j;
						 echo "<br/>";
						 echo "Ligue".$ligue.",".$team.",";
						 $i=0;
					}        
					//print_r($row)."<br>";
				}
			}  
 }
 
 

?>