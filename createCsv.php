

<?php
   header('Content-Type: text/html; charset=utf-8');
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 2737d07a38964ede9ae5f259302cf405';
	$reqPrefs['http']['header'] = 'Content-Type: text/html; charset=utf-8';
    $stream_context = stream_context_create($reqPrefs);
	
	/* echo "<pre>";
print_r($fixtures);
echo "</pre>"; */
	
	
	
	for($s=116;$s<120;$s++){
		$uri = "http://api.football-data.org/alpha/teams/".$s."/players";
		$response = file_get_contents($uri, false, $stream_context);
		$fixtures = json_decode($response,true);
		$players= $fixtures['players'];
		foreach($players as $row){
			
			$value = $row['marketValue'];
			$marketVal=filter_var($value, FILTER_SANITIZE_NUMBER_INT);
			echo $row['name']."<br>";
			/* echo $s.",",$row['id'].",".$row['name'].",".$row['position'].",".$row['dateOfBirth'].",".$row['nationality'].",".$row['contractUntil'].",".$row['jerseyNumber'].",".$marketVal."<br>"; */
			//.$row['marketValue'].","
		}
	}
	
	
	
	/* for($count=0;$count<11;$count++){
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
		}  */
?>