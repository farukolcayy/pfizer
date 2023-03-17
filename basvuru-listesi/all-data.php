<?php

$data = array();

try {

    $conn = new PDO(-);

    $query1 = $conn->query("SELECT * FROM basvuru ORDER BY `basvuru`.`applyDate` DESC", PDO::FETCH_ASSOC);
    $result1 = $query1->fetchAll();

    $data['status'] = 'ok';
    $data['data1'] = $result1;

    echo json_encode($data);
} catch (PDOexception $exe) {

    $data['status'] = 'err';
    $data['result'] = $exe->getMessage();
    echo json_encode($data);
}
