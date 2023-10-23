<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="text" name="tekst">
        <br><br>
        Ulubiony piłkarz:<br>
        Mak <input type="checkbox" name="pil[]" value="Mak">
        Piła <input type="checkbox" name="pil[]" value="Piła">
        Śkl <input type="checkbox" name="pil[]" value="Śkl">
        <br><br>
        Ulubiona drużyna:<br>
        LP <input type="radio" name="team" value="LP">
        LW <input type="radio" name="team" value="LW" checked>
        LG <input type="radio" name="team" value="LG">
        <br><br>
        Najlepszym trenerem jest:<br>
        <select name="trener">
            <option>One</option>
            <option>Two</option>
            <option>Three</option>
        </select>
        <br><br>
        Wczytaj zdjęcie drużyny:<br>
        <input type="file" name="plik">
        <br><br>
        <input type="submit" name="submit">
        <input type="reset">
    </form>
    <hr>
    <?php
        if(isset($_POST["submit"])) {
            if(isset($_POST["tekst"])) {
                echo $_POST["tekst"]."<br>";
            }
            if(isset($_POST["pil"])) {
                $pil = $_POST["pil"];
                echo "<b>Ulubiony/ni piłkarz/e: </b>";
                for($i = 0 ; $i < count($pil) ; $i++) {
                    echo $pil[$i]." ";
                }
                echo "<br>";
            }
            if(isset($_POST["team"])) {
                echo "<b>Ulubiona drużyna: </b>".$_POST["team"]."<br>";
            }
            if(isset($_POST["trener"])) {
                echo "<b>Najlepszym trenerem jest: </b>".$_POST["trener"]."<br";
            }
            $size = 5242880;
            if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
                if ($_FILES['plik']['size'] > $size)
                    echo 'Błąd! Plik jest za duży!';
	            else { 
                    if (isset($_FILES['plik']['type'])) 
                        echo 'Typ: '.$_FILES['plik']['type'].'<br/>';	
                    move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/zadanie/foto/'.$_FILES['plik']['name']);
                    $nazwa_pliku = $_FILES['plik']['name'];
                    echo '<br/><img src="/zadanie/foto/'.$nazwa_pliku.'" style="width: 100%;">';
                }
            }
            else {
                echo 'Błąd';
            }
        }
    ?>
</body>
</html>