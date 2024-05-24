<div class="menu">
    <a href="index.php" class="menu-1 <?php if ($strona === 'index') echo 'akt'; ?>">Strona główna</a>
    <a href="czytelnicy.php" class="menu-2 <?php if ($strona === 'czytelnicy') echo 'akt'; ?>">Czytelnicy</a>
    <a href="ksiazki.php" class="menu-1 <?php if ($strona === 'ksiazki') echo 'akt'; ?>">Książki</a>
    <a href="pracownicy.php" class="menu-2 <?php if ($strona === 'prawonicy') echo 'akt'; ?>">Pracownicy</a>
    <a href="stanowiska.php" class="menu-1 <?php if ($strona === 'stanowiska') echo 'akt'; ?>">Stanowiska</a>
    <a href="wypozyczenia.php" class="menu-2 <?php if ($strona === 'wypozyczenia') echo 'akt'; ?>">Wypożyczenia</a>

    <?php
    
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "biblioteka";

        $con = new MYSQLI($host, $username, $password, $db);
        if ($con->connect_error) die("Error: " . $con->connect_error);

    ?>
</div>
