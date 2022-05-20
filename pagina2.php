<?php
include 'functions.php';
session_start();
# Session aangemaakt van de POSTS op pagina 1
if (isset($_POST['Submit1'])) {
    $_SESSION["voornaam"] = $_POST['voornaam'];
    $_SESSION["achternaam"] = $_POST['achternaam'];
    $_SESSION["personeelsnummer"] = $_POST['personeelsnummer'];
    $_SESSION["afdeling"] = $_POST['afdeling'];
    $_SESSION["familie"] = $_POST['familie'];
  } 
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>

<h1>Medewerkinformatie</h1>

<!-- Formulier inputs 2-->
<form action="http://localhost/pj/pagina3.php" method="post">
    <table>
<!-- optional input 1 (Familie). Indien op de vorige pagina voor familie Ja is gekozen-->    
            <tr>
                <?php
#Als op pagina 1 bij familie "Ja" is geselecteerd dan maak een nieuwe input aan die vraagt om familie beschrijving 
                    if ($_POST['familie'] == "Ja"){
                        echo '<th>beschrijf uw familie</th>';
                        echo '<td><textarea name="familie_be" rows="4" cols="50"> </textarea>></td>';

                      } 
                ?>
            </tr>
<!-- optional input 2 (Taxi). Indien op de vorige pagina voor directie is gekozen -->    
            <tr>
                <?php 
#Als op pagina 1 bij afdelingen directie is geselecteerd dan maak een nieuwe input aan die vraagt om taxi met een pulldown ja/nee
                    if ($_POST['afdeling'] == "Directie"){
                        echo '<th>Heeft u een taxi nodig?</th>';
                        echo '<td> <select name="taxi">';
                        echo '<option value="Nee"> Nee </option>';
                        echo '<option value="Ja"> Ja </option> </select> </td>';
                      } 

                ?>
            </tr>
<!-- input 3 (Vega). -->    
            <tr>
                <th>Bent u vegatarisch</th>
                <td>
                    <select name="vega">
                            <option value="Nee"> Nee </option>
                            <option value="Ja"> Ja </option>
                    </select>
                </td>
            </tr>
<!-- input 4 (Auto). -->    
            <tr>
                <th>Komt u met de auto?</th>
                <td> 
                    <input type="checkbox" name="auto" value="Ja">
                    <label for="auto">Ja ik kom met de auto</label><br>
                </td>
            </tr>
<!-- input 5 (Intresse). -->    
            <tr>
                <th>Wat zijn uw intresse gebieden?</th>
                <td>
                    <input type="checkbox" name="Actief" value="Actief">
                    <label for="Actief">Actief</label><br>    
                    <input type="checkbox" name="Spelletjes" value="Spelletjes">
                    <label for="Spelletjes">Spelletjes</label><br>   
                    <input type="checkbox" name="Cultuur" value="Cultuur">
                    <label for="Cultuur">Cultuur</label><br>   
                    <input type="checkbox" name="Natuur" value="Natuur">
                    <label for="Natuur">Natuur</label><br>   
                </td>
            <tr>
    </table>
    <input type="submit" name="Submit2" value="Overzicht">
</form>

</body>
</html>
