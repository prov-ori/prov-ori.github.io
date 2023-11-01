&lt;?php
require 'PHPMailerAutoload.php';
 
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
 
$mail = new PHPMailer;
$mail-&gt;isSMTP();
$mail-&gt;Host = 'smtp.example.com';
$mail-&gt;SMTPAuth = true;
$mail-&gt;Username = 'your_email@example.com';
$mail-&gt;Password = 'your_email_password';
$mail-&gt;SMTPSecure = 'tls';
$mail-&gt;Port = 587;
 
$mail-&gt;setFrom($email, $name);
$mail-&gt;addAddress('your_email@example.com');
$mail-&gt;isHTML(true);
 
$mail-&gt;Subject = 'Сообщение с формы обратной связи';
$mail-&gt;Body    = "От: $name &lt;br&gt; Email: $email &lt;br&gt; Сообщение: $message";
 
if(!$mail-&gt;send()) {
    echo 'Ошибка при отправке сообщения.';
    echo 'Mailer Error: ' . $mail-&gt;ErrorInfo;
} else {
    echo 'Сообщение успешно отправлено!';
}
?&gt;