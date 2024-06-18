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
            <li><a href="toevoegen.php">Toevoegen</a></li>
            <li><a href="overzicht.php">Maaltijden</a></li>
        </ul>
    </nav>
   </header>

   <table class="toegevoegd">
    <tr>
        <th>titel</th>
        <th>gerecht</th>
        <th>ingrediënt 1</th>
        <th>ingrediënt 2</th>
        <th>ingrediënt 3</th>
        <th>ingrediënt 4</th>
        <th>ingrediënt 5</th>
        <th>ingrediënt 6</th>
        <th>duur</th>
        <th>rating</th>
    </tr>

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

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='tabel'>";
        echo "<tr>";
        echo "<td>" . $row['titel'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['type'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt 1'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt 2'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt 3'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt 4'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt 5'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt 6'] . "</td>" . PHP_EOL;
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

<th><a href="toevoegen.php">Toevoegen</a></th>
<th><a href="index.php">Gerechten</a></th>

</table>
</body>
</html>
