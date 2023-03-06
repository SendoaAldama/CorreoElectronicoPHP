<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Incluir el archivo autoload.php de PHPMailer
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    //Variables de completacion
    $apodo = "";    //Apodo que seria el nombre del usuario
    $para = "";     //Correo electronico al que se le va a mandar el mensaje (receptor)
    $emisor = "";   //Cuenta que manda el mensaje (emisor)
    $contraC = "";  //Aquí se añade la contraseña del correo, contraseña que nos dan para aplicaciones externas gmail
    $nombreEmisor = "";     //El nombre del emisor, el que se va a mostrar en el mensaje
    
    // Crear una instancia de PHPMailer
    $mail = new PHPMailer();

    // Configurar el servidor SMTP y las credenciales de autenticación
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $emisor;   //Cuenta que manda el mensaje (emisor)
    $mail->Password = $contraC; //Aquí se añade la contraseña del correo, contraseña que nos dan para aplicaciones externas gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configurar el mensaje
    $mail->setFrom($emisor, $nombreEmisor); //Inicamos el emisor y el nombre que se va a mostrar
    $mail->addAddress($para);   //Para quien va dirigido (Receptor)
    $mail->Subject = 'Registro de cuenta';  //Asunto
    $mail->Body = "Hola ".$apodo.",\nTe mandamos este mensaje desde Iron Fitness para decirte que su cuenta se a registrado correctamente con el correo ".$para.".";    //Mensaje

    // Enviar el correo
    if ($mail->send())  //Si lo manda
    {

        echo 'El correo se ha enviado correctamente';

    } 
    else    //Si hubo un error
    {

        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;

    }

?>