<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Excepton;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setForm('jktrut@gmail.com', 'Administrator');
    $mail->addAddress('mihailziljajevsite@gmail.com');
    $mail->Subject = 'Привет! Это админ сайта ""';

    $manwoman = 'man';
    if($_POST['manwoman'] == "woman") {
        $manwoman = "woman";
    }

    $body = '<h1>Message text</h1>';

    if (trim(!empty($_POST['name']))){
        $body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
    }
    if (trim(!empty($_POST['email']))){
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    }
    if (trim(!empty($_POST['manwoman']))){
        $body.='<p><strong>Man or woman:</strong> '.$_POST['manwoman'].'</p>';
    }
    if (trim(!empty($_POST['age']))){
        $body.='<p><strong>Age:</strong> '.$_POST['age'].'</p>';
    }
    if (trim(!empty($_POST['message']))){
        $body.='<p><strong>Message:</strong> '.$_POST['message'].'</p>';
    }
    if (!empty($_FILES['image']['tmp_name'])) {
        $filePath = __DIR__ . "/files/" . $_FILES['image']['name'];
        if (copy($_FILES['image']['tmp_name'], $filePath)){
            $fileAttach = $filePath;
            $body.='<p><strong>Фото в приложении</strong>';
            $mail->addAttachment($fileAttach);
        }
    }

    $mail->Body = $body;

    if(!$mail->send()) {
        $message = 'Error';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>