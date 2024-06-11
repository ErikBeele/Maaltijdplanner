<?php

$dbhost = "localhost";
$dbname = "maaltijdplanner";
$dbuser = "bit_academy";
$dbpass = "bit_academy";

try { 
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM gerechten ");
$stmt->execute(); 
?>

<div class= "form">
    
<form action="gerechten.php" method="POST">
  <label for="gerecht">Soort gerecht:</label><br>
  <select id="gerecht" name="gerecht"><br>
  <option value="vlees">Vlees</option>
  <option value="vis">Vis</option>
  <option value="vegatarisch">Vegatarisch</option>
  <input type="submit" value=submit>
</form>
</div>
<div>test</div>
<?php
} catch (PDOException $err) {
  echo "Database avoided the connection. " . $err->getMessage() ;
  exit();
}

?>
