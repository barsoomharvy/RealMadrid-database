
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
    //echo "Opened database successfully";
}

?>


<html lang=\"en\">
<head>
<title>Real Madrid Club</title>
</head>
<body>
<img src = "realMadrid.jpg" alt = "Real Madrid" width="1400" height ="150">
<h1>Real Madrid</h1>
<h2>Project Real-Madrid is designed to keep the data and information related to the club
covering most of the aspects that any clubs have.
The database keeps the record of players, managers,
matches by players, matches by the club, and different stadiums the club owns.</h2>
<h3>Current players of Real Mamdrid Team</h3>
<table border=\"1\" cellpadding=\"3\">
<tr><th>Player No.</th><th>Name</th><th>Nationality</th><th>Position</th></tr>

<?php
$results = $db->query('select playerId, name, nationality,position, redCards  from players');
while ($row = $results->fetcharray()) {
    echo "<tr><td>" . $row['playerId'] ."</td><td>" . $row['name'] . "</td><td>" .
    $row['nationality'] . "</td><td>" . $row['position'] . "</td></tr>";
}
?>
<br></br>

</table>
<form action = 'web.php' method = 'POST'>
<input type = 'submit' name = 'redcard' value = 'Player with more than 20 red cards'>
</form>
<form action = 'frenchPlayer.php' method = 'POST'>
<input type = 'submit' name = 'french' value = 'French players'>
</form>
<form action = 'winnerManager.php' method = 'POST'>
<input type = 'submit' name = 'manager' value = 'Most successful manager'>
</form>
<form action = 'longestPlayer.php' method = 'POST'>
<input type = 'submit' name = 'elitePlayer' value = 'Players at the club for more than 5 years'>
</form>
</body>
</html>




