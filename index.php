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

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM gerechten ");
    $stmt->execute(); 
?>

<div class= "form">
    <form action="gerechten.php" method="POST">
      <label for="gerecht">Soort gerecht:</label><br>
      <input type="radio" name="vlees" value="a">Vlees<br>
      <input type="radio" name="vis" value="b">Vis<br>
      <input type="radio" name="vegetarisch" value="c">Vegetarisch<br>
    </form>
</div>

<div class="aantalgerechten">
    <form action="aantalgerechten.php" method="post">
        <label for="num-gerechten">aantal gerechten</label>
        <input type="number" id="num-gerechten" min="1" required>
        <button type="submit">Verstuur</button>
</form>

<?php
} catch (PDOException $err) {
    echo "Database avoided the connection. " . $err->getMessage() ;
    exit();
}

?>

</table>


</form>
   
<footer>
Don van Gulik: 175736@student.horizoncollege.nl
Erik Beelen: 175777@student.horizoncollege.nl
</footer>
    </div>
</body>



</html>
