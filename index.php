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
            <li><a href="overzicht.php">Maaltijden</a></li>
        </ul>
    </nav>
   </header>
<?php
    $dbhost = "localhost";
    $dbname = "maaltijdplanner";
    $dbuser = "bit_academy";
    $dbpass = "bit_academy";

try { 
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM gerechten ");
    $stmt->execute(); 
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
</div>

<div class="aantalgerechten">
            <label for="num-gerechten">Selecteer het aantal Gerechten voor deze week:</label>
            <input type="number" id="num-gerechten" name="num-gerechten" min="1" max="7" required>
            <div id="ingredient-inputs"></div>
            <input type="checkbox" id="confirm" onchange="toggleInput()"> Ik bevestig mijn keuze
            <button type="submit">Submit</button>
            </form>
        </div>

        <script>
            function generateIngredientInputs() {
                const num = parseInt(document.getElementById('num-gerechten').value);
                const container = document.getElementById('ingredient-inputs');
                const vleesChecked = document.getElementById('vlees').checked;
                const visChecked = document.getElementById('vis').checked;
                const vegetarischChecked = document.getElementById('vegetarisch').checked;

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
            }

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
            }
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
        ?>          
   
<footer>
    <p>MADE BY:</p>
<p>Don van Gulik: 175736@student.horizoncollege.nl</p>
<p>Erik Beelen: 175777@student.horizoncollege.nl</p>
</footer>
    </div>
</body>



</html>
