
<!DOCTYPE html>
<?php

class realMadrid extends SQLite3
{
    function __construct()
    {
        $this->open('RealMadridTeam.db');
    }
}

$db = new realMadrid();
if(!$db){
    echo $db -> lastErrorMsg();
  }
  else{
    //echo "Opened database successfully\n";
}
?>


<head></head>
<body>
<?php
	echo "<strong>Here are the players with more than 20 redCards</strong>";
	echo "<table border=\"1\" cellpadding=\"3\">";
	echo "<tr><th>Player No.</th><th>Name</th><th>Red Cards</th></tr>\n";
	$result = $db->query('SELECT playerId,name, redcards FROM players group by name having redcards > 20');
	while ($row = $result->fetcharray()){
		echo "<tr><td>" . $row['playerId'] ."</td><td>" . $row['name'] . "</td><td>" .
		$row['redCards'] . "</td></tr>\n";
		}	

	echo "</table>"
?>
</body>


