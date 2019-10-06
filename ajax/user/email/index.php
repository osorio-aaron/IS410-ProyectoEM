<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $correo = $_POST['correo'];
        $codigo = $_POST['codigo'];
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->Username = 'aaronosorio0798@gmail.com';
        $mail->Password = 'aamoosba1';
        $mail->setFrom('aaronosorio0798@gmail.com','Easy Market');
        $mail->addAddress($correo,'Easy Market');
        $mail->Subject = 'El equipo de Easy Market le informa:';
        $mail->Body = $codigo;
        if (!$mail->Send()) {
            echo "Error: ".$mail->ErrorInfo;
        }else{
            echo "Mensaje Enviado";
        }    
    }
?>