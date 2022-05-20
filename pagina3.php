<?php
session_start();
include 'functions.php';

#Pagina 1 resultaten ophalen uit de session van de vorige pagina.
$voornaam = $_SESSION["voornaam"];
$achternaam = $_SESSION["achternaam"];
$personeelsnummer = $_SESSION["personeelsnummer"];
$afdeling = $_SESSION["afdeling"];
$familie = $_SESSION["familie"];

#Pagina 2 resultaten ophalen van input vega en de 4 intresse gebieden.  
$vegatarisch = $_POST['vega'];
#Pagina 2 resultaten ophalen van input familie beschrijving alleen als familie_be gepost is.  
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_POST['familie_be'])) {        
    $familie_be = $_POST['familie_be'];
}else {
  $familie_be = "Niet aanwezig";
}
}


?> 
       


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>

<h1> Uw formulier overzicht</h1>

<table>
            <tr>
                <th>Uw voornaam:</th>
                <td><?php echo $voornaam . "<br>"; ?></td>
            </tr>

            <tr>
                <th>Uw Achternaam:</th>
                <td><?php echo $achternaam . "<br>"; ?></td>              </tr>
            </tr>

            <tr>
                <th>Uw personeelsnummer:</th>
                <td><?php echo $personeelsnummer . "<br>"; ?></td>              </tr>
            </tr>

            <tr>
                <th>Uw afdeling:</th>
                <td><?php echo $afdeling . "<br>"; ?></td>              </tr>
            </tr>


            <tr>
                <th>Komt familie mee?</th>
                <td><?php echo $familie . "<br>"; ?></td>              </tr>
            </tr>
 <!--Pagina 2 resultaten ophalen van input familie en familie omschrijving.  -->     
            <tr>

              <?php    bold() . "<br>"; ?> 

            </tr>
 <!--Pagina 2 resultaten ophalen van input taxi. -->          
            <tr>
                <?php 
#Als de directie taxi heeft geselecteerd en auto dan word er "Neem contact op weergeven";
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                            if (isset($_POST['taxi'])) {            
                            if ($_POST['taxi'] == "Ja" and $_POST['auto'] == "Ja"){ 
                                            $taxi = $_POST['taxi'] ;
                                            echo '<th>Komt u met de taxi?. </th>';
                                            echo '<td> '. $taxi .'  :U als Directie komt met de auto en heeft om een taxi gervaagd, Neem contact op  <br> </td>';
                                        } 
                                    }
                                } else {
                                    
                                }           
                    ?>  
            </tr>

            <tr>
                <th>Bent u vegetarisch??</th>
                <td><?php echo $vegatarisch . "<br>"; ?></td>          
            </tr>
<!--Pagina 2 resultaten ophalen van input auto.   -->     
            <tr>
                <?php
#Als "komt met auto" is geselecteerd maak van de POST een Variable anders maak een Variable die leeg is.
                    if (isset($_POST['auto'])) {
                        $auto = $_POST['auto'];
                        echo '<th>Komt u met de auto? </th>';
                        echo '<td>' .$auto .' <br> </td>';
                    }else{
                        $auto = "Nee";
                        echo '<th>Komt u met de auto? </th>';
                        echo '<td>'.$auto.'  :Niet geselecteerd<br> </td>';
                    }
                
                ?>  
            </tr>
 <!--Pagina 2 resultaten ophalen van inputs 4 intresses.  -->                
            <tr>
                <?php 
#Als een intresse is geselecteerd dan maak van de POST een Variable anders maak een Variable die leeg is 
                echo '<th>Uw intresses zijn:</th>';
                if (isset($_POST['Actief'])) {
                    $Actief = $_POST['Actief'];
                    echo '<td>'. $Actief. '<br></td> ';
                  } else {
                    $Actief = "";
                  }

                  if (isset($_POST['Spelletjes'])) {
                    $Spelletjes = $_POST['Spelletjes'];
                    echo '<td>'. $Spelletjes. '<br></td> ';
                  } else {
                    $Spelletjes = "";
                  }

                  if (isset($_POST['Cultuur'])) {
                    $Cultuur = $_POST['Cultuur'];
                    echo '<td>'. $Cultuur. '<br></td> ';
                  } else {
                    $Cultuur = "";
                  }

                  if (isset($_POST['Natuur'])) {
                    $Natuur = $_POST['Natuur'];
                    echo '<td>'. $Natuur. ' <br></td>';
                  } else {
                    $Natuur = "";
                  }
                ?>  
            </tr>
    </table>



<?php


  #Insert alle variables als op de vorige pagina op de button word geklikt
if(isset($_POST['Submit2'])){



   // Check connection

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "ontwikkelen";
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   #Insert alle variable naar database
   $sql = "INSERT INTO inschrijfformulier ( `Voornaam`, `Achternaam`, `Personeelsnummer`, `Afdeling`, `Familie`, `Vegetarisch`, `auto`, `Interesse1`, `Interesse2`, `Interesse3`, `Interesse4`) 
   VALUES ('$voornaam','$achternaam','$personeelsnummer','$afdeling','$familie_be','$vegatarisch','$auto','$Actief','$Spelletjes','$Cultuur','$Natuur')";
   

   if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   $conn->close();
}
?>
</body>
</html>