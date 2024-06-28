<!DOCTYPE html>

<head>
<title>Maaltijdplanner</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="form.css">
</head>
<!-- head bevat title en links naar de styling voor de pagina -->
<body>
    <div class="box">
   <header>
    <nav>
        <ul>
            <li><a href="toevoegen.php">Toevoegen</a></li>
            <li><a href="overzicht.php">Maaltijden</a></li>
            <li><a href="ingrediëntenlijst.php">ingrediëntenlijst</a></li>
<!-- de nav,ul en de li bevat de links naar de andere paginas die in de navbar zitten -->
        </ul>
    </nav>
   </header>
<?php
    $dbhost = "localhost";
    $dbname = "maaltijdplanner";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";
// hierboven staan de gegevens die we gebruiken om verbinding te maken met de database.
try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// bij $conn zijn de gegevens die nodig zijn om een database connectie te laten werken.
    $stmt = $conn->prepare("SELECT * FROM gerechten ");
    $stmt->execute(); 
    // de $stmt prepared de de gegevens op van de gerechten en execute het.
?>

<div class="form">
    <form action="overzicht.php" method="POST">
        <label for="gerecht">Kies hier tussen de 3 voorkeur Ingrediënten</label><br>
        <input type="checkbox" class="gerechtenbox" name="gerecht[]" value="vlees" id="vlees">
        <label for="vlees" class="vlees">VLEES</label><br>
        <input type="checkbox" class="gerechtenbox" name="gerecht[]" value="vis" id="vis">
        <label for="vis" class="vis">VIS</label><br>
        <input type="checkbox" class="gerechtenbox" name="gerecht[]" value="vegetarisch" id="vegetarisch">
        <label for="vegetarisch" class="vegetarisch">VEGATARISCH</label><br>
</div>    <!-- hier is de opbouw van de form de action zorgt voor waar het naar verstuurd wordt -->
          <!-- de code hierboven zorgt ervoor dat je de keuze kan maken tussen vlees,vis,vegatairsch -->

<div class="aantalgerechten">
            <label for="num-gerechten">Selecteer het aantal Gerechten voor deze week:</label>
            <input type="number" id="num-gerechten" name="num-gerechten" min="1" max="7" required>
            <div id="ingredient-inputs"></div>
            <input type="checkbox" id="confirm" onchange="toggleInput()"> Ik bevestig mijn keuze
            <button type="submit">Submit</button>
            </form>
        </div>
<!-- de code hierboven zorgt de code ervoor dat je kan aangeven hoeveel gerechten je wilt voor aankomende week. -->
<!-- als je de keuze bevestigd krijg je de keuze om te kiezen hoeveel gerechten van welk ingredient je wilt -->
       
       <script>
            function generateIngredientInputs() {
                const num = parseInt(document.getElementById('num-gerechten').value);
                const container = document.getElementById('ingredient-inputs');
                const vleesChecked = document.getElementById('vlees').checked;
                const visChecked = document.getElementById('vis').checked;
                const vegetarischChecked = document.getElementById('vegetarisch').checked;
// Deze functie haalt het aantal gerechten op dat de gebruiker heeft ingevoerd en controleert welke ingrediëntencheckboxen zijn aangevinkt.
// daarna genereert het invoervelden voor de geselecteerde ingrediënten in de container.

                container.innerHTML = '';

                if (num > 0) {
                    if (vleesChecked) {
                        container.innerHTML += '<label>Vlees:</label><input type="number" name="vlees-count" min="0" max="' + num + '" oninput="checkTotal();" required><br>';
                    }
                    if (visChecked) {
                        container.innerHTML += '<label>Vis:</label><input type="number" name="vis-count" min="0" max="' + num + '" oninput="checkTotal();" required><br>';
                    }
                    if (vegetarischChecked) {
                        container.innerHTML += '<label>Vegetarisch:</label><input type="number" name="vegetarisch-count" min="0" max="' + num + '" oninput="checkTotal();" required><br>';
                    }
                }
            }
// code hierboven zorgt ervoor dat als de ingredient wordt geselecteerd het verder wordt verwerkt en opteld hoeveel er totaal zijn.
            document.getElementById('num-gerechten').addEventListener('input', generateIngredientInputs);

            function toggleInput() {
                const confirm = document.getElementById('confirm');
                const numGerechten = document.getElementById('num-gerechten');
                numGerechten.disabled = !confirm.checked;
                if (confirm.checked) {
                    generateIngredientInputs();
                }
            }

            document.addEventListener('DOMContentLoaded', (event) => {
                toggleInput();
            });
// code hierboven checkt of de functie checkbox ID is aangevinkt als het true is wordt het verder verwerkt als het false is gebeurt er niks mee.
            function checkTotal() {
                const numGerechten = parseInt(document.getElementById('num-gerechten').value);
                const vleesCount = parseInt(document.getElementsByName('vlees-count')[0]?.value || 0);
                const visCount = parseInt(document.getElementsByName('vis-count')[0]?.value || 0);
                const vegetarischCount = parseInt(document.getElementsByName('vegetarisch-count')[0]?.value || 0);

                const totalSelected = vleesCount + visCount + vegetarischCount;

                if (totalSelected > numGerechten) {
                    alert("Het totaal aantal gerechten mag niet hoger zijn dan " + numGerechten + ".");
                    return false;
                }
            } // code hierboven zorgt ervoor dat er niet meer ingredienten geselecteerd kunnen zijn dan het aantal selecteerde gerechten.
             

            function validateForm() {
                const numGerechten = parseInt(document.getElementById('num-gerechten').value);
                const vleesCount = parseInt(document.getElementsByName('vlees-count')[0]?.value || 0);
                const visCount = parseInt(document.getElementsByName('vis-count')[0]?.value || 0);
                const vegetarischCount = parseInt(document.getElementsByName('vegetarisch-count')[0]?.value || 0);

                const totalSelected = vleesCount + visCount + vegetarischCount;

                if (totalSelected !== numGerechten) {
                    alert("Het totaal aantal gerechten moet gelijk zijn aan " + numGerechten + ".");
                    return false;
                }
                return true;
            } // code hierboven count het aantal gerechten en ingredienten en zorgt ervoor dat het aantal gerechten gelijk moet zijn aan aantal gerechten.
        </script> 

<?php
            } catch (PDOException $err) {
                echo "Database connection failed: " . $err->getMessage();
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $keuze = $_POST['gerecht'] ?? [];
                $aantal = $_POST['num-gerechten'] ?? 0;
                $vleesCount = $_POST['vlees-count'] ?? 0;
                $visCount = $_POST['vis-count'] ?? 0;
                $vegetarischCount = $_POST['vegetarisch-count'] ?? 0;

                echo "Gerecht: " . implode(', ', $keuze) . "<br>";
                echo "Aantal: " . htmlspecialchars($aantal) . "<br>";
                echo "Vlees: " . htmlspecialchars($vleesCount) . "<br>";
                echo "Vis: " . htmlspecialchars($visCount) . "<br>";
                echo "Vegetarisch: " . htmlspecialchars($vegetarischCount) . "<br>";
            }
            // code hierboven zorgt ervoor dat als er een foutmelding is het wordt aangegeven exit() stopt het als er een fout optreedt
            // ook wordt er gecheckt of er gebruik wordt gemaakt van post wat beteknd dat het formulier is ingediend.
            // count zorgt ervoor dat er wordt gecheckt hoeveel ervan zijn.
       ?>          
   
<footer>
    <p>MADE BY:</p>
<p>Don van Gulik: 175736@student.horizoncollege.nl</p>
<p>Erik Beelen: 175777@student.horizoncollege.nl</p>
</footer>
    </div>
</body>

        <!-- de footer bevat onze contactgegevens hier is gebruik gemaakt van <p> tag omdat je hiermee makkelijk kan schrijven.  -->

</html>
