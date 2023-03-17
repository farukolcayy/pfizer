
<?php


$data = array();

try {

    $conn = new PDO(-);

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
