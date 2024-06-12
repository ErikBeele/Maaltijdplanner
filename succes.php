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
$gerecht = $_POST["gerecht"];
$duur = $_POST["tijd"];
$ingrediënt = $_POST["ingrediënt"];
$rating = $_POST["rating"];

$dbhost = "localhost";
$dbname = "boodschappen";
$dbuser = "root";
$dbpass = "";

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "INSERT INTO lijst (productnaam, merk, prijs)
    VALUES ('$product', '$merk', $prijs)";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    echo "<tr>";
    echo "<td> $product </td>" . PHP_EOL;
    echo "<td> $merk </td>" . PHP_EOL;
    echo "<td> $prijs </td>" . PHP_EOL;
    echo "</tr>";
    echo "Product toegevoegd." . PHP_EOL;
} catch (PDOException $err) {
    echo "Database avoided the connection. " . $err->getMessage();
    exit();
}
?>

<a href="boodschappen.php">product toevoegen</a>
<a href="index.php">Terug naar lijst</a>

</table>
    </div>
</html>