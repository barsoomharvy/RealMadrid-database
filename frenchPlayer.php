
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
	echo "<strong>Here are the french players</strong>";
	echo "<table border=\"1\" cellpadding=\"3\">";
	echo "<tr><th>Player No.</th><th>Name</th><th>Nationality</th></tr>\n";
	$result = $db->query('SELECT playerId, name, nationality FROM players where nationality = "French"');
	while ($row = $result->fetcharray()){
		echo "<tr><td>" . $row['playerId'] ."</td><td>" . $row['name'] . "</td><td>" .
		$row['nationality'] . "</td></tr>\n";
		}
	echo "</table>";
?>
</body>


