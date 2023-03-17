
 <?php

    $email = $_POST['emailAddress'];
    $tel = $_POST['phoneNumber'];

    $data = array();


    try {

        $conn = new PDO('mysql:host=5.2.84.96;dbname=badiwork_pfizer;charset=utf8;port=3306', '-----', '-----');
        $query = $conn->prepare("INSERT INTO contact SET
            emailAddress = ?,
            phoneNumber = ?");
    
        $insert = $query->execute(array($email,$tel));
    
        if ($insert) {
            $last_id = $conn->lastInsertId();
            $data['status'] = 'ok';
            $data['result'] = 'Giriş Başarılı';
            echo json_encode($data);
        } else {
            $data['status'] = 'err';
            $data['result'] = 'Hata: Giriş Başarısız!';
            echo json_encode($data);
        }
    } catch (PDOexception $exe) {
    
        $data['status'] = 'err';
        $data['result'] = 'Bağlantı Hatası!';
        // $data['result'] = $exe->getMessage();
        echo json_encode($data);
    }
