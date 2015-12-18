<?php
 //utf-8 Windows-1252
header('Content-Type: text/html; charset=Windows-1252');
ini_set('max_execution_time',4440);
$nullaList = fopen('BaenullPlayerList.csv', "r");
$istrue=false;

while ($row = fgetcsv($nullaList)) {
	$arr=explode(" ",$row[0]);
	//if(sizeof($arr)>2){
		//print_r($arr);echo "<br>";
	//}
	if(isset($arr[0]) && isset($arr[1]))
	{
		$fName=$arr[0];$lName=$arr[1];
	//echo $fName." ".$lName."<br>"; 
$url="http://www.worldfootball.net/search/?q=".$fName."+".$lName."&kind=1";
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
			$playerArray=preg_split("/\s+/", $row->nodeValue);
		//	print_r($playerArray);
			
				echo $fName." ".$lName.",";
				//$p=sizeof($playerArray)-2;
			
			if(isset($playerArray[8]))
			echo $playerArray[8];
			echo "<br>";break;
			
		}
		print("<br>");
	}

}
}
        // $position="";$k=0;
        // $line="";
		// $managerCount=0;
        // while($k<sizeof($playerArray)){
            // if($playerArray[$k]=="Goalkeeper"){
				
                // $position=$playerArray[$k];
                // $k++;continue;
            // }else if($playerArray[$k]=="Defender"){
                // $position="Defender";$k++;continue;
            // }
            // else if($playerArray[$k]=="Midfielder"){
                // $position=$playerArray[$k];$k++;continue;
            // }
            // else if($playerArray[$k]=="Forward"){
                // $position=$playerArray[$k];$k++;continue;
            // }
            // else if($playerArray[$k]=="Ass. Manager"){
                // $position=$playerArray[$k];$k++;continue;
            // }
            // else if($playerArray[$k]=="Manager"){
				// $managerCount++;
				// if($managerCount==1)
				// $position=$playerArray[$k];
			    // echo $playerArray[$k+1]." ".$playerArray[$k+2].",".$playerArray[$k+3].",";
				// $y=$s-1;
				// echo "201".$y."/1".$s;echo ",".$team."<br>";
			    // break;
            // }
            // else if($playerArray[$k]=="Goalkeeper-Coach"){
                // $position=$playerArray[$k];$k++;continue;
            // }
            // if (preg_match('/\//', $playerArray[$k])){
				
				// $k++;
            // }else{
					// $k++;
            // }
          // }
        
   // }
//}
//}


 ?>


