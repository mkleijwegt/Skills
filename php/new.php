<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=alcohol", "root", "");
    if (isset($_POST['verzenden'])){
        $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_STRING);
        $percent = filter_input(INPUT_POST, "percent", FILTER_SANITIZE_DECIMAL);
        $beschrijving = filter_input(INPUT_POST, "beschrijving", FILTER_SANITIZE_STRING);

        $query = $db->prepare("INSERT INTO vodka (naam,percent,beschrijving) VALUES (:naam, :percent, :beschrijving)");
        $query->bindParam("naam", $naam);
        $query->bindParam("percent", $percent);
        $query->bindParam("beschrijving", $beschrijving);

        if ($query->execute()){
            echo "de nieuwe gegevens zijn toegevoegd";
        } else {
            echo "er is een fout";
        }
        echo "<br>";
    }
} catch (PDOException $e){
    die ("Error:" . $e->getMessage());
}