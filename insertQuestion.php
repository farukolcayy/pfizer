
<?php


$nameSurname = $_POST['nameSurname'];
$question = $_POST['question'];

$data = array();

try {

    $conn = new PDO('mysql:host=5.2.84.96;dbname=badiwork_pfizer;charset=utf8;port=3306', 'badiwork_pfizer', 'Ok?2021?.');
    $query = $conn->prepare("INSERT INTO questions SET
        nameSurname = ?,
        question = ?");

    $insert = $query->execute(array($nameSurname, $question));

    if ($insert) {
        $last_id = $conn->lastInsertId();
        echo 'Sorunuz İletildi';
    } else {
        echo 'Sorunuz İletilemedi!';
    }
} catch (PDOexception $exe) {
    echo 'Bağlantı Hatası';
}
