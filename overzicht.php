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
        <ul>
            <li><a href="toevoegen.php">Gerechten toevoegen</a></li>
            <li><a href="overzicht.php">Maaltijden bekijken</a></li>
        </ul>
    </nav>
   </header>
   <?php
    $dbhost = "localhost";
    $dbname = "boodschappen";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM gerechten " . $order);
    $stmt->execute(); 

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='tabel'>";
        echo "<tr>";
        echo "<td>" . $row['titel'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['type'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënten'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['tijd'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['rating'] . "</td>" . PHP_EOL;
        echo "</tr>";
        echo "</div>";
    }
} catch (PDOException $err) {
    echo "Database couldn't reach the connection. " . $err->getMessage() ;
    exit(); 
}
?>

<th><a href="toevoegen.php">Gerecht toevoegen</a></th>
<th><a href="index.php">Gerechten plannen</a></th>

</table>
</body>
</html>
