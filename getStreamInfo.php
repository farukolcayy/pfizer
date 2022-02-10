
<?php


$data = array();

try {

    $conn = new PDO('mysql:host=5.2.84.96;dbname=badiwork_pfizer;charset=utf8;port=3306', 'badiwork_pfizer', 'Ok?2021?.');

    $query1 = $conn->query("SELECT * FROM canli_yayin WHERE Id=1", PDO::FETCH_ASSOC);
    $result1 = $query1->fetchAll();

    $data['status'] = 'ok';
    $data['result'] = $result1[0];

    echo json_encode($data);
} catch (PDOexception $exe) {

    $data['status'] = 'err';
    $data['result'] = $exe->getMessage();
    echo json_encode($data);
}
