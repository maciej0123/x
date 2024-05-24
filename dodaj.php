<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dodaj</title>
</head>
<style>
    .container2 {
        border: 5px solid;
        border-color: #DFCA9F;
        padding: 10px;
        border-radius: 5px;
        width: 300px; 
        margin: 0 auto;
    }
    
    label {
        display: inline-block;
        display: block; 
        margin-bottom: 5px;
    }

    input {
        text-align: center;
    }

</style>
<body>

<div class="container">
    <?php include 'menu.php'; ?>
    

    <div class="main-content">
        <?php
            if(isset($_GET['t'])) {
                $t = $_GET['t'];
            }
        ?>
        <h1 style="text-align: center;">Dodaj <?php echo $t; ?></h1>

        <div class="container2">
            <form action="" method="POST">
                <?php
                if ($t === 'ksiazki') {
                    $array = array('Tytul', 'Imie', 'Nazwisko', 'Wydawnictwo', 'Rok_wyd', 'Cena', 'dostepna', 'Id_dzial');
                }
                else if ($t === 'pracownicy') {
                    $array = array('Imie', 'Miasto', 'Data_zatrudnienia', 'Wynagrodzenie');
                }
                else if ($t === 'stanowiska') {
                    $array = array('Nazwa');
                }
                else if ($t === 'wypozyczenia') {
                    $array = array('Sygnatura', 'Id_pracownika', 'Nr_czytelnika', 'Data_wypozyczenia', 'Data_zwrotu');
                }
                 else {
                    $array = array('Imię', 'Nazwisko', 'Miejscowość', 'Ulica_i_nr', 'Nr_telefonu');
                }
                
                foreach ($array as $f) {
                    echo "<label for='$f'>$f</label>";
                    echo "<input type='text' id='$f' name='$f'>";
                }
                ?>
                <br><br>
                <input type="submit" value="Dodaj <?php echo $t ?>">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($t === 'czytelnicy') {
                    $imie = $_POST['Imię'];
                    $nazwisko = $_POST['Nazwisko'];
                    $miejscowosc = $_POST['Miejscowość'];
                    $ulica_nr = $_POST['Ulica_i_nr'];
                    $telefon = $_POST['Nr_telefonu'];

                    $sql = "INSERT INTO czytelnicy (imie, nazwisko, miejscowosc, ulica_i_nr, telefon) 
                            VALUES ('$imie', '$nazwisko', '$miejscowosc', '$ulica_nr', '$telefon')";
                } else if ($t === 'ksiazki') {
                    $tytul = $_POST['Tytul'];
                    $imie = $_POST['Imie'];
                    $nazwisko = $_POST['Nazwisko'];
                    $wydawnictwo = $_POST['Wydawnictwo'];
                    $rok_wyd = $_POST['Rok_wyd'];
                    $cena = $_POST['Cena'];
                    $dostepna = isset($_POST['dostepna']) ? 1 : 0;
                    $id_dzial = $_POST['Id_dzial'];

                    $sql = "INSERT INTO ksiazki (Tytul, Imie, Nazwisko, Wydawnictwo, Rok_wyd, Cena, dostepna, Id_dzial) 
                            VALUES ('$tytul', '$imie', '$nazwisko', '$wydawnictwo', '$rok_wyd', '$cena', '$dostepna', '$id_dzial')";
                } else if ($t === 'pracownicy') {
                    $imie = $_POST['Imie'];
                    $miasto = $_POST['Miasto'];
                    $data_zatrudnienia = $_POST['Data_zatrudnienia'];
                    $wynagrodzenie = $_POST['Wynagrodzenie'];

                    $sql = "INSERT INTO pracownicy (imie, miasto, data_zatrudnienia, wynagrodzenie) 
                            VALUES ('$imie', '$miasto', '$data_zatrudnienia', '$wynagrodzenie')";
                } else if ($t === 'stanowiska') {
                    $stanowisko = $_POST['Nazwa'];

                    $sql = "INSERT INTO stanowiska (Nazwa)
                    VALUES ('$stanowisko')";

                } else if ($t === 'wypozyczenia') {
                    $sygnatura = $_POST['Sygnatura'];
                    $Id_pracownika = $_POST['Id_pracownika'];
                    $Nr_czytelnika = $_POST['Nr_czytelnika'];
                    $Data_wypozyczenia = $_POST['Data_wypozyczenia'];
                    $Data_zwrotu = $_POST['Data_zwrotu'];

                    $sql = "INSERT INTO wypozyczenia (Sygnatura, Id_pracownika, Nr_czytelnika, Data_wypozyczenia, Data_zwrotu)
                    VALUES ('$sygnatura', '$Id_pracownika', '$Nr_czytelnika', '$Data_wypozyczenia', '$Data_zwrotu')";
                }
                

                if ($con->query($sql)) {
                    echo "<br>";
                    echo "<span style='color: green;'>Dodano $t</span>";
                } else {
                    echo "<span style='color: red;'>Nie udało się dodać czytelnika</span>";
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
