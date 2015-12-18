<?php

 header('Content-Type: text/html; charset=utf-8');

for($s=4;$s<=5;$s++){
	/* $arrayofteams2012=array("ac-ajaccio","as-nancy","as-saint-etienne","estac-troyes","evian-thonon-gaillard","fc-lorient","fc-sochaux","girondins-bordeaux","lille-osc","montpellier-hsc","ogc-nice","olympique-lyon","olympique-marseille","paris-saint-germain","sc-bastia","stade-brest","stade-reims","stade-rennes","toulouse-fc","valenciennes-fc");
	$arrayofteams=array("as-monaco","ea-guingamp","fc-nantes","fc-metz","rc-lens","sm-caen"); */
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

    $pokemon_xpath = new DOMXPath($table_doc);
//class="dunkel"
    //get all the h2's with an id
    $pokemon_row = $pokemon_xpath->query('//td[@class="dunkel"]');
printLines($pokemon_row,$s,$team);
    /* if($pokemon_row->length > 0){
        $i=0;
        foreach($pokemon_row as $row){
			   if($i>=6){
				  //   echo "201".$s;
					 echo"<br/>";
					 $i=0;
				}
				if(empty($row->nodeValue)){
					echo "MANAGER";
				}
                echo $row->nodeValue . ",";
                $i++;
            
                    
            //print_r($row)."<br>";
        }
    } */
 //   print("<br>");
    $pokemon_row = $pokemon_xpath->query('//td[@class="hell"]');
printLines($pokemon_row,$s,$team);
/*     if($pokemon_row->length > 0){
        $i=0;
        foreach($pokemon_row as $row){
             if($i>=6){
                 //echo "201".$s.
				 echo "<br/>";
                 $i=0;
            } 
				if(empty($row->nodeValue)){
					echo "MANAGER";
				}
                echo $row->nodeValue . ",";
                $i++;
            
                  
            //print_r($row)."<br>";
        }
    } */
}
//print("<br>");
}
}

function printLines($pokemon_row,$s,$team){
	if($pokemon_row->length > 0){
			
        $i=0;//echo $team.",";
        foreach($pokemon_row as $row){
		if(empty($row->nodeValue)){
				//	echo "MANAGER";
				break;
				}
             if($i>=6){
				 $y=$s-1;
                 echo "201".$y."/1".$s;echo ",".$team.",";
				 echo "<br/>";
                 $i=0;
            } 
				
					echo $row->nodeValue . ",";
				
                
                $i++;
            
                  
            //print_r($row)."<br>";
        }
    }
}

if(isset($_POST['Submit'])){
	$url=$_POST['urlInput'];
	$html= file_get_contents($url);
}
    /* print("<form method=POST>");
    print("<input type=text name=urlInput></input>");
	print("<input type=submit name=Submit value=Scrape>");
    print("</form>");
    
   $teamStack = array("Fc", "FC");
    array_push($teamStack, "apple", "raspberry"); */
    

?>