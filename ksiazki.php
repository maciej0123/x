<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ksiazki</title>

</head>
<body>

<div class="container">
    <?php
    $strona = 'ksiazki';
    include 'menu.php';

    ?>
    <div class="main-content">
        <h1 style="text-align: center;">
            Tabela z ksiazkami
        </h1>

        <?php
            if(isset($_GET['t'])) {
                $t = $_GET['t'];
            }

        // sql
        $sql = "SELECT Sygnatura, 
                Tytul AS Tytuł, 
                Imie AS Imie,
                Nazwisko AS Nazwisko,
                Wydawnictwo AS Wydawnictwo, 
                Rok_wyd  as 'Rok wydawnictwa',
                Cena AS 'Cena',
                Id_dzial as 'Dzial',
                'Edytuj' AS '+' FROM ksiazki";


        $query = $con->query($sql);

        // jesli liczba wierszy > 0
        if ($query->num_rows > 0) {
            echo '<table border="1" style="width:100%; border-collapse: collapse; text-align: center;">';
            echo '<tr>';

            // nazwy tabel
            $fetch_fields = $query->fetch_fields();
            foreach ($fetch_fields as $f) {
                if ($f->name === '+') echo '<th>' . '<a href="dodaj.php?t=ksiazki">' . $f->name . '</th>';
                else echo '<th>' . $f->name . '</th>';
            }

            echo '</tr>';
            // wartosci w tabelach
            while ($fetch_assoc = $query->fetch_assoc()) {
                echo '<tr>';
            
                foreach ($fetch_fields as $f) {
                    $fa = $fetch_assoc[$f->name];
                    
                    // Dodaj
                    if ($f->name === '+') {
                        echo '<td><a href="edytuj.php?id=' . $fetch_assoc['Sygnatura'] . "&t=ksiazki" . '">' . $fa . '</a></td>';
                    } 

                    // Telefon
                    else if ($f->name === 'Nr. telefonu') {
                        if (!empty($fa) && is_numeric($fa)) { 
                            $telefon = number_format($fa, 0, '', ' '); 
                            echo '<td>' . $telefon . '</td>';
                        } else {
                            echo '<td>' . $fa . '</td>'; 
                        }
                    

                    // Ulica
                    } else if ($f->name === 'Ulica i nr.') {
                        $ulica = explode(' ', $fa);
                        $last = count($ulica)-1;
                        $ulica[$last] = 'Nr. ' . $ulica[$last];  
                        $ulica = implode(' ', $ulica);

                        if (is_numeric($fa)) $ulica = 'Brak ulicy ' . $ulica;  
                        echo '<td>' . $ulica . '</td>'; 
                    } else {
                        echo '<td>' . $fa . '</td>'; 
                    }
                }
            
                echo '</tr>';
            }

            echo '</table>';
        }

        $con->close();
        ?>
            
    </div>
</div>

</body>
</html>
