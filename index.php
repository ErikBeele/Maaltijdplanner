<!DOCTYPE html>

<head>
<title>Maaltijdplanner</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="box">
   <header>
    <nav>
        <img src="logo.png" alt="websitelogo">
        <ul>
            <li><a href="#">Gerechten</a></li>
            <li><a href="#">Maaltijden</a></li>
            <li><a href="#">Aanbiedingen</a></li>
            <li><a href="#">ingrediënten</a></li>
            <li><a href="#">klantenservice</a></li>
        </ul>
        <img src="list.png" alt="yourlist">
        <img src="profile.png" alt="profile">
    </nav>
   </header>
<?php
    $dbhost = "localhost";
    $dbname = "maaltijdplanner";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";

    $dbuser2 = "root";
    $dbpass2 = "";

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM gerechten ");
    $stmt->execute(); 

    $conn2 = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser2, $dbpass2);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt2 = $conn2->prepare("SELECT * FROM gerechten ");
    $stmt2->execute(); 
?>

<div class= "form">
    <form action="gerechten.php" method="POST">
      <label for="gerecht">Soort gerecht:</label><br>
      <select id="gerecht" name="gerecht"><br>
      <option value="vlees">Vlees</option>
      <option value="vis">Vis</option>
      <option value="vegatarisch">Vegatarisch</option>
    </form>
</div>
<?php
} catch (PDOException $err) {
    echo "Database avoided the connection. " . $err->getMessage() ;
    exit();
}





?>

</table>


</form>
   
<footer>
    Contactgegevens: 175777@student.horizoncollege.nl
</footer>
    </div>
</body>



</html>
