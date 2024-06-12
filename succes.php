<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Bevestiging toevoeging</title>
</head>

<h2>Toegevoegd</h2>

<table class="toegevoegd">
    <tr>
        <th>titel</th>
        <th>soort gerecht</th>
        <th>duur</th>
        <th>ingrediënten</th>
        <th>rating</th>
    </tr>

<?php

$titel = $_POST["titel"];
$gerecht = $_POST["type"];
$duur = $_POST["tijd"];
$ingrediënt = $_POST["ingrediënt"];
$rating = $_POST["rating"];

$dbhost = "localhost";
$dbname = "maaltijdplanner";
$dbuser = "bit_academy";
$dbpass = "bit_academy";

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "INSERT INTO gerechten (titel, Type, ingrediënten, tijd, rating)
    VALUES ('$titel', '$gerecht', '$ingrediënt', $duur, '$rating')";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    echo "<tr>";
    echo "<td> $titel </td>" . PHP_EOL;
    echo "<td> $gerecht </td>" . PHP_EOL;
    echo "<td> $ingrediënt </td>" . PHP_EOL;
    echo "<td> $duur </td>" . PHP_EOL;
    echo "<td> $rating </td>" . PHP_EOL;
    echo "</tr>";
    echo "gerecht toegevoegd." . PHP_EOL;
} catch (PDOException $err) {
    echo "Database avoided the connection. " . $err->getMessage();
    exit();
}
?>

<a href="toevoegen.php">gerechten toevoegen</a>
<a href="index.php">Gerechten kiezen</a>
<a href="overzicht.php">Gekozen gerechten zien</a>

</table>
    </div>
</html>