<?php

require '../../db/database.php';

global $pdo;

$naam = filter_input(INPUT_GET, 'naam', FILTER_SANITIZE_STRING);
$query = $pdo->prepare("SELECT * FROM vodka WHERE naam LIKE :naam");
$naam = "%". $naam . "%";
$query->bindParam('naam', $naam);
$query->execute();

$vodka=$query->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: text/html; charset=iso-8859-1');
echo json_encode($vodka);