
 <?php
 /* Bağlantıyı Başlat */
 $mysqli = new mysqli("localhost","badiworks_ecs","!ecs!2021!","badiworks_ecs");/* Bağlantıyı Kontrol Et */
 if ($mysqli->connect_error){
     /* Bağlantı Başarısız İse */
     echo "Bağlantı Başarısız. Hata: " . $mysqli->connect_error;
     exit;
 }

   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $email = $_POST['email'];
   $tel = $_POST['tel'];
   $school_name = $_POST['school_name'];
   $school_department = $_POST['school_department'];
   $className = $_POST['className'];
   


  if(!empty($name) && !empty($surname) && !empty($email) && !empty($tel) && !empty($school_name) && !empty($school_department) && !empty($className) && $className!="Sınıf Seçiniz..."  ){
      $sql= "INSERT INTO basvuru (name,surname,emailAddress,phoneNumber,university,department,class) VALUES ('$name','$surname','$email','$tel','$school_name','$school_department','$className')";
     
    
      mysqli_set_charset($mysqli,"utf8");
        
      if(mysqli_query($mysqli, $sql))
      {
          echo "Sorunuz iletildi";
      } 
      else
      {
          echo "Hata: Sorunuz iletilemedi!";
          
      }

    }
    else
{
    echo "Tüm alanlar doldurulmalı!";
}




 $mysqli->close();
 ?>

