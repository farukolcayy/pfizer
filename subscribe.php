<?php


$mysqli = new mysqli("localhost","pfizerkariyer_pfizerkariyer","2021pfizer?","pfizerkariyer_pfizerkariyer");/* Bağlantıyı Kontrol Et */
if ($mysqli->connect_error){
    /* Bağlantı Başarısız İse */
    echo "Bağlantı Başarısız. Hata: " . $mysqli->connect_error;
    exit;
}



$subscribe = $_POST['subscribe_email'];



if(!empty($subscribe)){
    $sql="INSERT INTO abone (subscribe) VALUES ('$subscribe')";

    mysqli_set_charset($mysqli,"utf8");
   
    if(mysqli_query($mysqli, $sql))
    {
        echo "Abone Olundu";
    } 
    else
    {
        echo "Hata: Abone olunamadı!";
        
    }

} else
{
    echo "Alanlar doldurulmalı!";
}






?>
