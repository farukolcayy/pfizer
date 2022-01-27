
 <?php

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $school_name = $_POST['school_name'];
    $school_department = $_POST['school_department'];
    $className = $_POST['className'];

    $data = array();


    try {

        $conn = new PDO('mysql:host=5.2.84.96;dbname=badiwork_pfizer;charset=utf8;port=3306', 'badiwork_pfizer', 'Ok?2021?.');
        $query = $conn->prepare("INSERT INTO basvuru SET
            name = ?,
            surname = ?,
            emailAddress = ?,
            phoneNumber = ?,
            university = ?,
            department = ?,
            class = ?");
    
        $insert = $query->execute(array($name,$surname,$email,$tel,$school_name,$school_department,$className));
    
        if ($insert) {
            $last_id = $conn->lastInsertId();
            $data['status'] = 'ok';
            $data['result'] = 'Başvurunuz iletildi';
            echo json_encode($data);
        } else {
            $data['status'] = 'err';
            $data['result'] = 'Hata: Başvurunuz iletilemedi!';
            echo json_encode($data);
        }
    } catch (PDOexception $exe) {
    
        $data['status'] = 'err';
        $data['result'] = 'Bağlantı Hatası!';
        // $data['result'] = $exe->getMessage();
        echo json_encode($data);
    }