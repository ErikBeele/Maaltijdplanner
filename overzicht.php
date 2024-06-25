<!DOCTYPE html>
<html>
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
            <li><a href="ingrediëntenlijst.php">ingrediëntenlijst</a></li>
        </ul>
    </nav>
   </header>

   <table class="toegevoegd">
    <tr>
        <th>titel</th>
        <th>type</th>
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
    $bestelling = $_POST['gerecht'] ?? [];
    $aantal = $_POST['num-gerechten'] ?? 0;

    $dbhost = "localhost";
    $dbname = "maaltijdplanner";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";

    try { 
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM gerechten");
        $stmt->execute(); 

        $gerechten = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($gerechten as $row) {
            if (in_array($row['type'], $bestelling)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['titel']) . "</td>";
                echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                for ($i = 1; $i <= 6; $i++) {
                    echo "<td>" . htmlspecialchars($row["ingrediënt$i"]) . "</td>";
                }
                echo "<td>" . htmlspecialchars($row['tijd']) . "</td>";
                echo "<td>" . htmlspecialchars($row['rating']) . "</td>";
                echo "</tr>";
            }
        }
    } catch (PDOException $err) {
        echo "Database couldn't reach the connection. " . $err->getMessage();
        exit(); 
    }
    ?>

    </table>
</body>
</html>
