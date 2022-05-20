<?php 

$servername = "localhost";
$username = "SummaUSER";
$password = "SummaICT!";
$dbname = "ontwikkelen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "SELECT * FROM inschrijfformulier";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Voornaam: " . $row["Voornaam"]. " Achternaam " . $row["Achternaam"] ." Personeelsnummer " . $row["Personeelsnummer"]. " - Afdeling: " . $row["Afdeling"]. " " . $row["Familie"]. $row["Vegetarisch"]. " - Name: " . $row["auto"].  "<br>";
  }
} else {
  echo "0 results";
}

#PAGINA 1 FUNCTIES
#Deze functie word include in de form tabel van pagina 1
#De functie heeft alle afdelingen in een aray en weergeeft deze als een select option in de dropdown menu
function dropdown(){
        $afdeling = array("Accountants", "Receptie", "HRM", "Belastingadviseurs", "Administratie", "Directie");
        echo '<label for="afdeling">Kies uw afdeling</label>';
        echo '<select name="afdeling">';

        foreach ($afdeling as $value){
            echo '<option value="'.$value.'" required >'.$value.' </option>';
        }
        echo '</select>';
    }

#Als bij familie ja is geselecteerd dan laat de familie beschrijving zien. Ook voeg het de familie keuze en familie beschrijving in 1 variable
    function bold(){  
      if (isset($_POST['familie_be'])) { 
        $familie = $_SESSION["familie"];
        if ($familie == "Ja"){ 
          $familie_be = $_POST['familie_be']; 
          echo "<th>Familie beschrijving</th>" ;
          echo "<td><b>$familie_be</b></td>" ;
        } else {
            $familie_be = "Geen Familie";
            echo "$familie_be";
        }  
      }

    }
    ?>  
    
