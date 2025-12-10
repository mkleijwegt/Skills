<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>

</body>
</html>

<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=alcohol", "root", "");

    if (isset($_POST['verzenden'])){
        $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_STRING);
        $percent = filter_input(INPUT_POST, "percent", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $beschrijving = filter_input(INPUT_POST, "beschrijving", FILTER_SANITIZE_STRING);

        $query = $db->prepare("UPDATE vodka SET naam = :naam, percent = :percent, beschrijving = :beschrijving WHERE id = :id");

        $query->bindParam("naam", $naam);
        $query->bindParam("percent", $percent);
        $query->bindParam("beschrijving", $beschrijving);
        $query->bindParam("id", $_GET['id']);
        if($query->execute()){
            echo "gegevens zijn aangepast" . "<br>";
            ?>
            <a href="../php/index.php">Go to home</a>
            <?php
        } else {
            echo "er is een error opgetreden";
        }
        echo "<br>";
    } else {
        $query = $db->prepare("SELECT * FROM vodka WHERE id = :id");
        $query->bindParam("id", $_GET['id']);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $data){
            $naam = $data['naam'];
            $percent = $data['percent'];
            $beschrijving = $data['beschrijving'];
        }

        ?>

<form method="post" action="">
    <label>naam</label>
    <input type="text" name="naam" value="<?=$data['naam']?>"><br>

    <label>percent</label>
    <input type="number" step="0.01" name="percent" value="<?=$data['percent']?>"><br>

    <label>beschrijving</label>
    <input type="text" name="beschrijving" value="<?=$data['beschrijving']?>"><br>

    <input type="submit" name="verzenden" value="opslaan">
</form>

<?php
    }
} catch (PDOException $e){
    die ("ERROR:" . $e->getMessage());
}

?>


