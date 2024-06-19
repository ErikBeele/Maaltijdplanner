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
            <li><a href="index.php">K iezen</a></li>
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
        <th>ingrediënt 1</th>
        <th>ingrediënt 2</th>
        <th>ingrediënt 3</th>
        <th>ingrediënt 4</th>
        <th>ingrediënt 5</th>
        <th>ingrediënt 6</th>
        <th>rating</th>
    </tr>

<?php

$titel = $_POST["titel"];
$gerecht = $_POST["type"];
$ingrediënt1 = $_POST["ingrediënt"];
$ingrediënt2 = $_POST["ingrediënt2"];
$ingrediënt3 = $_POST["ingrediënt3"];
$ingrediënt4 = $_POST["ingrediënt4"];
$ingrediënt5 = $_POST["ingrediënt5"];
$ingrediënt6 = $_POST["ingrediënt6"];
$duur = $_POST["tijd"];
$rating = $_POST["rating"];

$dbhost = "localhost";
$dbname = "maaltijdplanner";
$dbuser = "bit_academy";
$dbpass = "bit_academy";

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "INSERT INTO gerechten (titel, Type, ingrediënt1, ingrediënt2, ingrediënt3, ingrediënt4, ingrediënt5, ingrediënt6, tijd, rating)
    VALUES ('$titel', '$gerecht', '$ingrediënt1', '$ingrediënt2', '$ingrediënt3', '$ingrediënt4', '$ingrediënt5', '$ingrediënt6', $duur, '$rating')";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    echo "<tr>";
    echo "<td> $titel </td>" . PHP_EOL;
    echo "<td> $gerecht </td>" . PHP_EOL;
    echo "<td> $ingrediënt1 </td>" . PHP_EOL;
    echo "<td> $ingrediënt2 </td>" . PHP_EOL;
    echo "<td> $ingrediënt3 </td>" . PHP_EOL;
    echo "<td> $ingrediënt4 </td>" . PHP_EOL;
    echo "<td> $ingrediënt5 </td>" . PHP_EOL;
    echo "<td> $ingrediënt6 </td>" . PHP_EOL;
    echo "<td> $duur </td>" . PHP_EOL;
    echo "<td> $rating </td>" . PHP_EOL;
    echo "</tr>";
    echo "gerecht toegevoegd." . PHP_EOL;
} catch (PDOException $err) {
    echo "Database avoided the connection. " . $err->getMessage();
    exit();
}
?>

<a href="toevoegen.php">Toevoegen</a>
<a href="index.php">Kiezen</a>
<a href="overzicht.php">Overzicht</a>

</table>
    </div>
</html>