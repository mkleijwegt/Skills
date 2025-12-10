<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=alcohol","root","");

    if(isset($_GET['id'])) {
        $query = $db->prepare("DELETE FROM vodka WHERE id = :id");
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

        $query->bindParam("id", $id);
        if($query->execute()){
            echo "Item is verwijderd";
        }else {
            echo "Er is een fout opgetreden";
        }
        echo "<br>";
    }

    }catch(PDOException $e){
        echo "ERROR:" . $e->getMessage();
    }
  

    $query = $db->prepare("SELECT * FROM vodka");
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as &$data){
        ?><a href="../php/index.php">Go to home</a> <?php
        echo "</a>";
        echo "<br>";
    }