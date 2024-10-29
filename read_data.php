<?php
header('Content-Type: application/json');
require 'db_connect.php';

try {
    $sql = "SELECT * FROM `sicakliklar` ORDER BY tarih DESC LIMIT 15;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    //print_r($result);
    $data = [];
    foreach ($result as $row) {
        $data[] = [
            'datetime' => $row->tarih,
            'value1' => (int)$row->s1,
            'value2' => (int)$row->s2,
            'value3' => (int)$row->s3,
            'value4' => (int)$row->s4,
            'value5' => (int)$row->s5,
            'value6' => (int)$row->s6,
        ];
    }


   echo json_encode($data);
} catch (\PDOException $e) {

     echo json_encode(['error' => $e->getMessage()]);
}
