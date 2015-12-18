<?php
$tocopy = fopen('tocopy.csv', "r");

while ($row = fgetcsv($tocopy)) {
	
$needle= $row[3];
$master = fopen('master.csv', "r");
$istrue=false;
	while ($row1 = fgetcsv($master)) {
		if($needle==$row1[0]){
			echo $needle.",".$row1[1]."<br>";
			$istrue=true;break;
		}
	}
	
	if(!$istrue){
		echo $needle.",XXXXXX"."<br>";
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

/* $f = fopen($file, "r");
$o = fopen($output_file, "a");
while ($row = fgetcsv($f,'',';')) {
  if ($row[1] == 'H') {         
    $row[4] = ''; // whatever you want to replace K with
     echo ('FOUND ! ');        
  }
  fputcsv($o,$row,';');    
} */	
?>