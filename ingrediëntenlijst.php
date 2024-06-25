<?php 
    
    $dbhost = "localhost";
    $dbname = "maaltijdplanner";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM gerechten");
    $stmt->execute(); 

    $gerechten = $stmt->FetchAll(PDO::FETCH_ASSOC);
    
    if($gerechten) {
        foreach ($gerechten as $gerecht) {
            echo "<h2>" . htmlspecialchars($gerecht['titel']) . "</h2>";
            echo "<ul>";
            for ($i = 1; $i <= 6; $i++) {
                $ingredient = $gerecht["ingrediënt$i"];
                if (!empty($ingredient)) {
                    echo "<li>" . htmlspecialchars($ingredient) . "</li>";
                }
            }
            echo "</ul>";
        }
    } else {
        echo "<p>Geen gerechten gevonden.</p>";
    }
} catch (PDOException $err) {
    echo "Database connection failed: " . $err->getMessage();
    exit();
}


?>

<body>
    <li><a href="index.php">terug naar main page</a></li>
</body>
