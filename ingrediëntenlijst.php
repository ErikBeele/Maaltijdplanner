<!DOCTYPE html>
<!--Dit zorgt ervoor dat de linkjes worden gekoppeld met de juiste pagina's--->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="box">
   <header>
    <!--Dit is de navigatiebalk --->
    <nav>
        <ul>
            <li><a href="toevoegen.php">Toevoegen</a></li>
            <li><a href="index.php">Kiezen</a></li>
            <li><a href="ingrediëntenlijst.php">ingrediëntenlijst</a></li>
        </ul>
    </nav>
   </header>

<?php 
    //Informatie voor connectie met database
    $dbhost = "localhost";
    $dbname = "maaltijdplanner";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";

    //Connectie met database
try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM gerechten");
    $stmt->execute(); 

    //De juiste ingrediënten en het juiste aantal(6) ingrediënten worden geprind. Als er geen gerechten zijn gevonden krijg je het bericht "Geen gerechten gevonden".
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
    </div>
</html>
