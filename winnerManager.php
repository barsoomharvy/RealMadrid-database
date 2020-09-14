
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
	echo "<strong>list of manager with their achievements</strong>";
	echo "<table border=\"1\" cellpadding=\"3\">";
	echo "<tr><th>Manager Id</th><th>Name</th><th>Games Won</th></tr>\n";
	$result = $db->query('select managerId, name, count(outcome) from manager as m, matchesByClub as ma where outcome = "Win" and m.managerId = ma.managedby');
	while ($row = $result->fetcharray()){
		echo "<tr><td>" . $row['managerId'] ."</td><td>" . $row['name'] . "</td><td>" .
		$row['count(outcome)'] . "</td></tr>\n";
		}
	echo "</table>";
?>
</body>


