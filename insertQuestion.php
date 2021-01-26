
<?php

$link = mysqli_connect("localhost", "pfizerkariyer_pfizerkariyer", "2021pfizer?", "pfizerkariyer_pfizerkariyer");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security

$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$surname = mysqli_real_escape_string($link, $_REQUEST['surname']);
$question = mysqli_real_escape_string($link, $_REQUEST['question']);

if (!empty($name) && !empty($surname) && !empty($question)) {

    $sql = "INSERT INTO live_questions (name,surname, question) VALUES ('$name','$surname', '$question')";

    mysqli_set_charset($link, "utf8");
    if (mysqli_query($link, $sql)) {
        echo "Sorunuz iletildi";
    } else {
        echo "Hata: Sorunuz iletilemedi!";
    }
} else {
    echo "Tüm alanlar doldurulmalı!";
}

// Close connection
mysqli_close($link);


?>