<?php
$recaptcha = $_POST['g-recaptcha-response'];
 
if(!empty($recaptcha)) {
    $recaptcha = $_REQUEST['g-recaptcha-response'];
    $secret = 'секретный ключ';
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret ."&response=".$recaptcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0");
    $curlData = curl_exec($curl);
    curl_close($curl); 
    $curlData = json_decode($curlData, true);
    if($curlData['success']) {
        $fio = $_POST['fio'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $fio = htmlspecialchars($fio);
        $email = htmlspecialchars($email);
        $message = htmlspecialchars($message);
        $fio = urldecode($fio);
        $email = urldecode($email);
        $message = urldecode($message);
        $fio = trim($fio);
        $email = trim($email);
        $message  = trim($message);
        if (mail("kuda@otpravit.ru", "Заявка с сайта", "ФИО:".$fio.". E-mail: ".$email." Сообщение: ".$message ,"From: info@satename.ru \r\n")){  
        echo "Сообщение успешно отправлено"; 
        } else { 
        echo "При отправке сообщения возникли ошибки";
        }
    } else {
        echo "Подтвердите, что вы не робот и попробуйте еще раз";
    }
}
else {
    echo "поставьте галочку в поле 'Я не робот' для отправки сообщения";
}
?>