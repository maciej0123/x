<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Czytelnicy</title>

</head>
<body>

<div class="container">
    <?php
    $strona = 'pracownicy';
    include 'menu.php';

    ?>
    <div class="main-content">
        <h1 style="text-align: center;">
            Tabela z pracownikami
        </h1>

        <?php
            if(isset($_GET['t'])) {
                $t = $_GET['t'];
            }

        // sql
        $sql = "SELECT Id_pracownika, 
                Imie AS Imie, 
                Miasto AS Miasto, 
                Data_zatrudnienia as 'Data_zatrudnienia',
                Wynagrodzenie AS 'Wynagrodzenie',
                'Edytuj' AS '+' FROM pracownicy";


        $query = $con->query($sql);

        // jesli liczba wierszy > 0
        if ($query->num_rows > 0) {
            echo '<table border="1" style="width:100%; border-collapse: collapse; text-align: center;">';
            echo '<tr>';

            // nazwy tabel
            $fetch_fields = $query->fetch_fields();
            foreach ($fetch_fields as $f) {
                if ($f->name === '+') echo '<th>' . '<a href="dodaj.php?t=pracownicy">' . $f->name . '</th>';
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
                        echo '<td><a href="edytuj.php?id=' . $fetch_assoc['Id_pracownika'] . "&t=pracownicy" . '">' . $fa . '</a></td>';
                    } 
                    
                    else {
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
