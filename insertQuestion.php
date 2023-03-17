
<?php


$nameSurname = $_POST['nameSurname'];
$question = $_POST['question'];
$emailAddress = $_POST['emailAddress'];

$data = array();

try {

    $conn = new PDO(-);
    $query = $conn->prepare("INSERT INTO questions SET
        nameSurname = ?,
        question = ?,
        emailAddress= ?");

    $insert = $query->execute(array($nameSurname, $question,$emailAddress));

    if ($insert) {
        $last_id = $conn->lastInsertId();
        echo 'Sorunuz İletildi';
    } else {
        echo 'Sorunuz İletilemedi!';
    }
} catch (PDOexception $exe) {
    echo 'Bağlantı Hatası';
}
