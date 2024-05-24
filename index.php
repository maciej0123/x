<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edytor biblioteki</title>

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
    <?php
    $strona = 'index';
    include 'menu.php';

    ?>
    <div class="main-content">
        <h1 style="text-align: center;">
            Strona główna
        </h1>
    </div>
</div>

</body>
</html>
