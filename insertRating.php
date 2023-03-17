
<?php

$liveName = $_POST['liveName'];
$emailAddress = $_POST['emailAddress'];
$programSubject = $_POST['programSubjectRating'];
$instructor = $_POST['instructorRating'];
$ratingScore = $_POST['ratingScore'];
$ratingComment = $_POST['ratingComment'];

$data = array();

try {

    $conn = new PDO(-);
    $query = $conn->prepare("INSERT INTO live_rating SET
        emailAddress = ?,
        liveName = ?,
        programSubject = ?,
        instructor = ?,
        ratingScore = ?,
        ratingComment = ?");

    $insert = $query->execute(array($emailAddress, $liveName, $programSubject, $instructor, $ratingScore, $ratingComment));

    if ($insert) {
        $data['status'] = 'ok';
        $data['result'] = 'Geri bildirim kaydedildi';
        // echo 'Geri Bildiriminiz Kaydedildi';
    } else {
        $data['status'] = 'err';
        $data['result'] = 'Geri bildirim kaydedildi';
    }

    echo json_encode($data);
} catch (PDOexception $exe) {

    $data['status'] = 'err';
    $data['result'] = 'Geri bildirim kaydedildi';

    echo json_encode($data);
}
