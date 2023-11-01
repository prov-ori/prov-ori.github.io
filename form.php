<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    $to = "jktrut@gmail.com"; // Замените на свой email
    $subject = "Сообщение с контактной формы";
    $headers = "From: $email";
    
    mail($to, $subject, $message, $headers);
    echo "Ваше сообщение успешно отправлено.";
} else {
    echo "Произошла ошибка при отправке.";
}
?>
