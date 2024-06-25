<?php

include_once __DIR__ . '/../connection.php';

$requestInfo = $_REQUEST;

/** Contando a quantidade de dados */
$qry1 = "SELECT COUNT(WT0_ID) AS QTD FROM WT0010";
$count = $pdo->prepare($qry1);
$count->execute();
$row = $count->fetch(PDO::FETCH_ASSOC);

/** Buscando os dados de todos os registros */
$qry2 = "SELECT * FROM WT0010";
$stmt = $pdo->prepare($qry2);
$stmt->execute();
$sensors = $stmt->fetchAll(PDO::FETCH_ASSOC);

$result = [
    "draw" => intval($requestInfo['draw']),
    "recordsTotal" => intval($row['QTD']),
    "recordsFiltered" => intval($row['QTD']),
    "data" => $sensors
];

/** Objeto JSON */
echo json_encode($result);
