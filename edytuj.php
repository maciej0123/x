<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edycja</title>
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

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $t = $_GET['t'];

            $sql = "SELECT id_czytelnika AS ID, 
                    imie AS Imię, 
                    nazwisko AS Nazwisko, 
                    miejscowosc AS Miejscowość, 
                    ulica_i_nr as 'Ulica_i_nr',
                    telefon AS 'Nr_telefonu' FROM czytelnicy WHERE id_czytelnika = $id";

            if ($t === 'ksiazki') {
                $sql = "SELECT Sygnatura AS ID, 
                    imie AS Imię, 
                    nazwisko AS Nazwisko, 
                    Wydawnictwo AS Wydawnictwo, 
                    Rok_wyd as 'Wydanie',
                    Cena AS 'Cena',
                    Id_dzial,
                    dostepna as 'Dostepnosc' FROM ksiazki WHERE Sygnatura = $id"; 
            }

            else if ($t === 'wypozyczenia') {
                $sql = "SELECT Nr_transakcji as ID,
                    Sygnatura,
                    Id_pracownika,
                    Nr_czytelnika,
                    Data_wypozyczenia,
                    Data_zwrotu FROM wypozyczenia WHERE Nr_transakcji = $id";
            }

            else if ($t === 'stanowiska') {
                $sql = "SELECT Id_stanowiska as ID,
                Nazwa FROM stanowiska WHERE Id_stanowiska = $id";
            }

            else if ($t === 'pracownicy') {
                $sql = "SELECT Id_pracownika as ID, 
                Imie, 
                Miasto, 
                Data_zatrudnienia, 
                Wynagrodzenie FROM pracownicy WHERE Id_pracownika = $id";
            }
            
            
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $fetch_assoc = $result->fetch_assoc();
                ?>
                    <h1 style="text-align: center;">Edycja <?php echo $t ?></h1>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $fetch_assoc['ID']; ?>">
                        <div class="container2">
                            <?php
                            foreach ($fetch_assoc as $c => $value) {   
                                echo "<br>";
                                if ($c === 'ID') {
                                    echo "<label for='$c'><b>ID</b></label>";
                                    echo "<input id='$c' name='$c' value='$value' readonly>";
                                }
                                else {
                                    echo "<label for='$c'>$c</label>";
                                    echo "<input type='text' id='$c' name='$c' value='$value'>";
                                }
                            }
                            echo "<br>";
                            ?>
                            <br>
                            <input type="submit" value="Zapisz zmiany">
                        </div>        
                    </form>

                    <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            // czytelnicy
                            if ($t === 'czytelnicy') {
                                $imie = $_POST['Imię'];
                                $nazwisko = $_POST['Nazwisko'];
                                $miejscowosc = $_POST['Miejscowość'];
                                $ulica_nr = $_POST['Ulica_i_nr'];
                                $telefon = $_POST['Nr_telefonu'];

                                $sql = "UPDATE czytelnicy SET 
                                    imie = '$imie', 
                                    nazwisko = '$nazwisko', 
                                    miejscowosc = '$miejscowosc', 
                                    ulica_i_nr = '$ulica_nr',
                                    telefon = '$telefon' 
                                WHERE id_czytelnika = $id";
                                // ksiazki
                            } else if ($t === 'ksiazki') {
                                $imie = $_POST['Imię'];
                                $nazwisko = $_POST['Nazwisko'];
                                $wydawnictwo = $_POST['Wydawnictwo'];
                                $Rok_wyd = $_POST['Wydanie'];
                                $Id_dzial = $_POST['Id_dzial'];
                                $cena = $_POST['Cena'];

                                $sql = "UPDATE ksiazki SET 
                                    Imie = '$imie', 
                                    Nazwisko = '$nazwisko', 
                                    Wydawnictwo = '$wydawnictwo', 
                                    Rok_wyd = '$Rok_wyd',
                                    Cena = '$cena'
                                WHERE Sygnatura = $id";

                            } else if ($t === 'wypozyczenia') {
                                $sygnatura = $_POST['Sygnatura'];
                                $Id_pracownika = $_POST['Id_pracownika'];
                                $Nr_czytelnika = $_POST['Nr_czytelnika'];
                                $Data_wypozyczenia = $_POST['Data_wypozyczenia'];
                                $Data_zwrotu = $_POST['Data_zwrotu'];

                                $sql = "UPDATE wypozyczenia SET 
                                Sygnatura = '$sygnatura', 
                                Id_pracownika = '$Id_pracownika', 
                                Nr_czytelnika = '$Nr_czytelnika', 
                                Data_wypozyczenia = '$Data_wypozyczenia',
                                Data_zwrotu = '$Data_zwrotu'
                            WHERE Nr_transakcji = $id";

                             } else if ($t === 'stanowiska') {
                                $nazwa = $_POST['Nazwa'];

                                $sql = "UPDATE stanowiska SET 
                                Nazwa = '$nazwa' 
                            WHERE Id_stanowiska = $id";
                             } else if ($t === 'pracownicy') {
                                $imie = $_POST['Imie'];
                                $miasto = $_POST['Miasto'];
                                $data_zatrudnienia = $_POST['Data_zatrudnienia'];
                                $wynagrodzenie = $_POST['Wynagrodzenie'];
                            
                                $sql = "UPDATE pracownicy SET 
                                            Imie = '$imie', 
                                            Miasto = '$miasto', 
                                            Data_zatrudnienia = '$data_zatrudnienia', 
                                            Wynagrodzenie = '$wynagrodzenie' 
                                        WHERE Id_pracownika = $id";
                            }

                           

                            if ($con->query($sql)) {
                                echo "<br><br>";
                                echo "<span style='color: green;'>Pomyslnie zaktualizowano dane</span>";
                            } else {
                                echo "<span style='color: red;'>Nie udalo sie zaktualizowac danych</span>";
                            }
                        }
                    ?>
                    
                <?php 
                
            } else {
                echo "Brak danych dla podanego ID.";
            }
        } else {
            echo "Nie podano ID.";
        }

        $con->close();
        ?>

    </div>
</div>

</body>
</html>
