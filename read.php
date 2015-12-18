<?php

	$reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: bca22feb06024ab7bc3d929176a32d28';
    $stream_context = stream_context_create($reqPrefs);
/* 	$fp = fopen('team.json', 'w');
	$t=1;
	while($t<10){
		$teams="http://api.football-data.org/teams/$t";
		$response = file_get_contents($teams, false, $stream_context);
		$tnames = json_decode($response,true);
		fwrite($fp, json_encode($response));
		$t++;
	}
	
	fclose($fp);  */
	
		
		

   /*  $uri = 'http://api.football-data.org/alpha/soccerseasons';
    
	$s=1;
	
	//$fp = fopen('results.json', 'w');
	while($s<=5){
	$players="http://api.football-data.org/alpha/teams/$s/players";
	$response = file_get_contents($players, false, $stream_context);
           $fixtures = json_decode($response,true);
		$fp = fopen("results$s.json", 'w');
	
	fwrite($fp, json_encode($response));
	fclose($fp);
	$s++;
	}
	 */
	 
	
	/* $s=2;
    $uri="http://api.football-data.org/alpha/teams/2/players";
	$response = file_get_contents($uri, false, $stream_context);
    $fixtures = json_decode($response,true);
		

	
		$file = fopen("contacts.csv","w");
		foreach ($fixtures as $line)
		{
			//foreach ($line as $element){
				fputcsv($file,explode(" ",$line['caption']));
				fputcsv($file,explode(" ",$line['league']));
				fputcsv($file,explode(" ",$line['year']));
				fputcsv($file,explode(" ",$element['numberOfTeams']));
				fputcsv($file,explode(" ",$element['numberOfGames']));
				fputcsv($file,explode(" ",$element['lastUpdated'])); 
			//}
			
		}
		fclose($file); */
		
		
	$s=2;
    $uri="http://api.football-data.org/alpha/teams/2/players";
	$response = file_get_contents($uri, false, $stream_context);
    $fixtures = json_decode($response,true);
		
		 for($count=0;$count<11;$count++){
			//echo "<br>".$fixtures[$count]['_links'];
			//echo "<br>".$fixtures[$count]['teams'];
			//echo "<br>".$fixtures[$count]['fixtures'];
			//echo "<br>".$fixtures[$count]['leagueTable'];
			echo "<br>".$fixtures[$count]['caption'];
			echo "<br>".$fixtures[$count]['league'];
			echo "<br>".$fixtures[$count]['year'];
			echo "<br>".$fixtures[$count]['numberOfTeams'];
			echo "<br>".$fixtures[$count]['numberOfGames'];
			echo "<br>".$fixtures[$count]['lastUpdated'];	
		} 
	

		
		
	//echo json_encode($response);
?>