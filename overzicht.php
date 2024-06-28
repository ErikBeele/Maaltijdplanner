<!DOCTYPE html>
<html>
<head>
<title>Maaltijdplanner</title>
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

   <!--Table hoofdtekst(bovenste rij)--->
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
//Haalt de geselecteerd gerechtstype(vlees, vis of vega) en hoeveel keer in 1 week wil je een soort gerecht
    $bestelling = $_POST['gerecht'] ?? [];
    $aantal = $_POST['num-gerechten'] ?? 0;

//De connectie met de database
    $dbhost = "localhost";
    $dbname = "maaltijdplanner";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";

//Als de connectie is gesloten dan selecteert het alles uit de tabel "gerechten". 
//De foreach zorgt ervoor dat de titel, het type, de 6 ingrediënten, de tijd en de rating van het gerecht print.
//Als de database niet is gevonden geeft de pagina een melding dat de database de pagina niet heeft kunnen bereiken.
    try { 
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM gerechten");
        $stmt->execute(); 

        $gerechten = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($gerechten as $rij) {
            if (in_array($rij['type'], $bestelling)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($rij['titel']) . "</td>";
                echo "<td>" . htmlspecialchars($rij['type']) . "</td>";
                for ($i = 1; $i <= 6; $i++) {
                    echo "<td>" . htmlspecialchars($rij["ingrediënt$i"]) . "</td>";
                }
                echo "<td>" . htmlspecialchars($rij['tijd']) . "</td>";
                echo "<td>" . htmlspecialchars($rij['rating']) . "</td>";
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
