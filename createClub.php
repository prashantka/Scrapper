<?php
   
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: bca22feb06024ab7bc3d929176a32d28';
    $stream_context = stream_context_create($reqPrefs);
	

	for($s=1;$s<=5;$s++){
		$uri = "http://api.football-data.org/alpha/teams/".$s."/";
		$response = file_get_contents($uri, false, $stream_context);
		$fixtures = json_decode($response,true);
		echo $s.",".$fixtures['name'].",".$fixtures['code']."<br>";
	}
	
?>