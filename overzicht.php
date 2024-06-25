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

    $bestelling = $_POST['gerecht'];
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
       
        print_r($_POST);

        foreach ($bestelling as $key1 => $gerecht) {
            foreach ($gerecht as $key2 => $maaltijd) {
                echo $maaltijd;
            }
        } 
        foreach ($aantal as $key3 => $aan) {
            foreach ($aan as $key4 => $hoeveel) {
                echo $hoeveel;
            }
        } 
    }
} catch (PDOException $err) {
    echo "Database couldn't reach the connection. " . $err->getMessage() ;
    exit(); 
}
?>

</table>
</body>
</html>
