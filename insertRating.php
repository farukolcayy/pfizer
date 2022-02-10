
<?php

$liveName = $_POST['liveName'];
$emailAddress = $_POST['emailAddress'];
$programSubject = $_POST['programSubjectRating'];
$instructor = $_POST['instructorRating'];
$ratingScore = $_POST['ratingScore'];
$ratingComment = $_POST['ratingComment'];

$data = array();

try {

    $conn = new PDO('mysql:host=5.2.84.96;dbname=badiwork_pfizer;charset=utf8;port=3306', 'badiwork_pfizer', 'Ok?2021?.');
    $query = $conn->prepare("INSERT INTO live_rating SET
        liveName = ?,
        programSubject = ?,
        instructor = ?,
        ratingScore = ?,
        ratingComment = ?");

    $insert = $query->execute(array($liveName, $programSubject, $instructor, $ratingScore, $ratingComment));

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