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
            <li><a href="index.php">Kiezen</a></li>
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

    $stmt = $conn->prepare("SELECT * FROM gerechten ");
    $stmt->execute(); 

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='tabel'>";
        echo "<tr>";
        echo "<td>" . $row['titel'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['type'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt1'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt2'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt3'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt4'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt5'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['ingrediënt6'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['tijd'] . "</td>" . PHP_EOL;
        echo "<td>" . $row['rating'] . "</td>" . PHP_EOL;
        echo "</tr>";
        echo "</div>";

        $ingredient1 = $_POST['ingrediënt1'];
        $ingredient2 = $_POST['ingrediënt2'];
        $ingredient3 = $_POST['ingrediënt3'];
        $ingredient4 = $_POST['ingrediënt4'];
        $ingredient5 = $_POST['ingrediënt5'];
        $ingredient6 = $_POST['ingrediënt6'];

        echo "<label for='ingrediënt'>Ingrediënt 1:</label><br>";
        echo "<input type='text' id='ingrediënt' name='ingrediënt' value='$ingredient1'><br>";
        echo "<label for='ingrediënt2'>Ingrediënt 2:</label><br>";
        echo "<input type='text' id='ingrediënt2' name='ingrediënt2' value='$ingredient2'><br>";
        echo "<label for='ingrediënt3'>Ingrediënt 3:</label><br>";
        echo "<input type='text' id='ingrediënt3' name='ingrediënt3' value='$ingredient3'><br>";
        echo "<label for='ingrediënt4'>Ingrediënt 4:</label><br>";
        echo "<input type='text' id='ingrediënt4' name='ingrediënt4' value='$ingredient4'><br>";
        echo "<label for='ingrediënt'>Ingrediënt 5:</label><br>";
        echo "<input type='text' id='ingrediënt5' name='ingrediënt5' value='$ingredient5'><br>";
        echo "<label for='ingrediënt6'>Ingrediënt 6:</label><br>";
        echo "<input type='text' id='ingrediënt6' name='ingrediënt6' value='$ingredient6'><br>";
    }
} catch (PDOException $err) {
    echo "Database couldn't reach the connection. " . $err->getMessage() ;
    exit(); 
}
?>

<th><a href="index.php">Kiezen</a></th>

</table>
</body>
</html>
