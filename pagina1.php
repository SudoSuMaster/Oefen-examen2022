<?php
include 'functions.php';
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>

<h1>Medewerkinformatie</h1>
<!-- Formulier inputs 1-->
<form action="http://localhost/pj/pagina2.php" method="post">
    <table>
<!-- input 1 (voornaam). -->    
            <tr>
                <th>voornaam</th>
                <td><input type="text"  name="voornaam" required></td>
            <tr>
<!-- input 2 (Achternaam). -->  
            </tr>
                <th>Achternaam</th>
                <td><input type="text"  name="achternaam" required></td>
                </tr>
<!-- input 3 (Personeelsnummer). -->  
            <tr>
                <th>Personeelsnummer</th>
                <td><input type="number"  name="personeelsnummer" required></td>
            <tr>
<!-- input 4 (Afdeling). -->  
            </tr>
                <th>Afdeling</th>          
                <td><?php dropdown()?></td>          
            </tr>
<!-- input 4 (Familie komt?). -->  
            <tr>
                <th>Familie komt mee ?</th>        
                <td>  
                    <select name="familie">
                            <option value="Nee"> Nee </option>
                            <option value="Ja"> Ja </option>
                     </select>
                </td>
            </tr>
    </table>
    <input type="submit" name="Submit1">
</form>
</body>
</html>

