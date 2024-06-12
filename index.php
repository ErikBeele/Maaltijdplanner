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
            <li><a href="toevoegen.php">Gerechten</a></li>
            <li><a href="overzicht.php">Maaltijden</a></li>
            <li><a href="#">Aanbiedingen</a></li>
            <li><a href="#">ingrediënten</a></li>
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
    <form action="gerechten.php" method="POST">
        <label for="gerecht">Kies een voorkeur gerecht:</label><br>
        <input type="checkbox" name="gerecht[]" value="vlees" id="vlees">
        <label for="vlees" class="vlees">Vlees</label><br>
        <input type="checkbox" name="gerecht[]" value="vis" id="vis">
        <label for="vis" class="vis">Vis</label><br>
        <input type="checkbox" name="gerecht[]" value="vegetarisch" id="vegetarisch">
        <label for="vegetarisch" class="vegetarisch">Vegetarisch</label><br>
    </form>
</div>


<div class="aantalgerechten">
        <form method="post" onsubmit="return validateForm()">
            <label for="num-gerechten">Selecteer het aantal Gerechten voor deze week:</label>
            <input type="number" id="num-gerechten" name="num-gerechten" min="1" max="7" required>
            <input type="checkbox" id="confirm-checkbox" onchange="toggleInput()"> Ik bevestig mijn keuze
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var numGerechten = document.getElementById('num-gerechten').value;
            if (numGerechten > 7) {
                alert("Het aantal Gerechten kan niet hoger zijn dan 7.");
                return false;
            }
            return true;
        }

        document.getElementById('num-gerechten').addEventListener('input', function() {
            if (this.value > 7) {
                this.value = 7;
            }
        });

        function toggleInput() {
            var checkbox = document.getElementById('confirm-checkbox');
            var input = document.getElementById('num-gerechten');
            if (checkbox.checked) {
                input.disabled = true;
            } else {
                input.disabled = false;
            }
        }
    </script>

<?php
} catch (PDOException $err) {
    echo "Database avoided the connection. " . $err->getMessage() ;
    exit();
}

?>

</table>


</form>
   
<footer>
Don van Gulik: 175736@student.horizoncollege.nl
Erik Beelen: 175777@student.horizoncollege.nl
</footer>
    </div>
</body>



</html>
