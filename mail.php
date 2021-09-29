<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

    if (isset($_POST['demoGonder'])) {
        $name = ucwords(strip_tags(trim($_POST['artistName'])));
        $email = strip_tags(trim($_POST['artistMail']));
        $about = ucfirst(strip_tags(trim($_POST['artistAbout'])));
        $demoType = ucwords(strip_tags(trim($_POST['demoType'])));
        $demoURL = strip_tags(trim($_POST['demoURL']));

        if (!name) {
            header('Location: index.php?error=NoName');
        }elseif(!email){
            header('Location: index.php?error=NoEmail');
        }elseif(!about){
            header('Location: index.php?error=NoAbout');
        }elseif(!demoType){
            header('Location: index.php?error=NoDemoType');
        }elseif(!demoURL){
            header('Location: index.php?error=NoDemoURL');
        }else{

            $mail = new PHPMailer(true);

            //Ayarlar
            $mail->setLanguage('tr');
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'artxn.register@gmail.com';
            $mail->Password   = 'Artx.0686';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom('artxn.register@gmail.com', 'Demo Submit Bot');
            $mail->addAddress('mrsgreylady@gmail.com');
            $mail->addReplyTo($email, $name);

            $mail->isHTML(true);
            $rndNum = rand(1, 100);
            $rndNum2 = rand(100, 9999);
            $mail->Subject = $demoType . ' DEMO - '. $name . ' | ' . $rndNum . ' - ' . $rndNum2;
            $mail->Body    = '
            <div style="margin: 0 auto; width: 50%; border-radius: 12px; font-family: Arial, Helvetica, sans-serif;">
                <div style="background-color: rgb(81, 27, 102); padding: 5px; border-radius: 8px 8px 0 0; text-align: center; font-size: 1.2rem; color: #f0f0f0;">
                    <p class="margin: 0; padding: 0;">
                        Merhabalar ben <span style="color: rgb(255, 95, 242);">'. $name .'</span>,
                    </p>
                    <div>
                        <p>
                        '. $about .'
                        </p>
                        <p>E-Posta adresim: <a href=mailto:'. $email .' style="text-decoration: none; color: rgb(255, 95, 242);">'. $email .'</a></p>
                        <p>
                            Saygılarımla <span style="color: rgb(255, 95, 242);">'. $demoType .'</span> türündeki demo\'mu sizlere sunarım:
                        </p>
                    </div>
                </div>
                <div style="background-color: #272727; padding: 15px; text-align: center; border-radius: 0 0 8px 8px;">
                    <a href="'. $demoURL .'" style="text-decoration: none; color: #f0f0f0; font-family: Arial, Helvetica, sans-serif; font-size: 1.2rem; background-color: rgb(81, 27, 102); padding: 0.4rem 1.5rem; border-radius: 8px;">Demo\'ya git</a>
                </div>
            </div>
            ';
            $mail->AltBody = '<b>Gönderen: </b>' . $name . '<br>' . '<b>E-Posta: </b>' . $email . '<br>' . '<b>Hakkında: </b>' . $about . '<br>' . '<b>Demo Türü: </b>' . $demoType . '<br>' . '<b>Demo Bağlantısı: </b>' . '<a href='.$demoURL.'>Demoya git</a>';

            $mail->send();
            header('Location: index.php?process=sent');
        }
    }
?>