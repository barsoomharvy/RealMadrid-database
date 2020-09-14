
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
	echo "<strong>list of players in the club for more than 5 years</strong>";
	echo "<table border=\"1\" cellpadding=\"3\">";
	echo "<tr><th>Player Name</th><th>Years With Club</th></tr>\n";
	$result = $db->query('select name, yearsWithClub from players where yearsWithClub > 5');
	while ($row = $result->fetcharray()){
		echo "<tr><td>" . $row['name'] ."</td><td>" . $row['yearsWithClub'] . "</td></tr>\n";
		}
	echo "</table>";
?>
</body>


