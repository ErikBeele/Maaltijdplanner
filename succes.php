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
            <li><a href="overzicht.php">Maaltijd</a></li>
        </ul>
    </nav>
   </header>

<h2>Toegevoegd</h2>

<table class="toegevoegd">
    <tr>
        <th>titel</th>
        <th>gerecht</th>
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

<a href="toevoegen.php">Gerechten toevoegen</a>
<a href="index.php">Gerechten kiezen</a>
<a href="overzicht.php">Overzicht</a>

</table>
    </div>
</html>