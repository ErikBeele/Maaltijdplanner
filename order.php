<!DOCTYPE html>

<?php

print_r($_POST);

    $keuze = $_POST['gerecht'];
    $aantal = $_POST['num-gerechten'];

    $dbhost = "localhost";
    $dbname = "maaltijdplanner";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM gerechten WHERE type = $keuze");
    $stmt->execute(); 

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        foreach ($aantal as $aantal => $dagen) {
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
    }
} catch (PDOException $err) {
    echo "Database couldn't reach the connection. " . $err->getMessage() ;
    exit(); 
}
?>

<html>

<a href="toevoegen.php">Toevoegen</a>
<a href="index.php">Kiezen</a>
<a href="overzicht.php">Overzicht</a>

</html>