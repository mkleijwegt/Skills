<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=alcohol","root","");
    $query=$db->prepare("SELECT * FROM vodka WHERE id = :id");
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $query->bindParam("id", $id);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data){
        echo "<table class='table table-striped'>";
          echo "<thead>";
            echo "<tr>";
                echo "<th scope='col'>Name</th>";
                echo "<th scope='col'>Alcohol %</th>";
                echo "<th scope='col'>Description</th>";
            echo "</tr>";
        echo "</thead>";
        foreach($result as $data){
            echo "<tr>";
                echo "<td>" . $data['naam'] . "</td>";
                echo "<td>" . $data['percent'] . "</td>";
                echo "<td>" . $data['beschrijving'] . "</td>";
            echo "</tr>";
        }
    echo "</table>";
    }
} catch (PDOException $e) {
    die ("Error!:" . $e->getMessage());
}
?>

<a href="index.php">home</a>
<a href="new.php">Add new</a>
