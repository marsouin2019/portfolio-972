<?php
include("class/PHPMailer/src/envoyer_email.php");

//variable superglobale contient valeur du formulaire
print_r($_POST);


require 'class/PHPMailer/src/Exception.php';
require 'class/PHPMailer/src/PHPMailer.php';
require 'class/PHPMailer/src/SMTP.php';
require 'class/envoyer_email.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer();
print_r($mail);

$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$email = htmlentities($_POST['email']);
$sujet = htmlentities($_POST['sujet']);
$tel = htmlentities($_POST['tel']);
$message = htmlentities($_POST['message']);



//envoie email


function send_email( $email, $sujet,$nom,$prenom,$tel,$message)
{
    //mis en forme
    $to ='tidave97266@gmail.com';
    $msg = 'Bonjours, je suis'.$nom.''.$prenom.''.$tel. "\r\n";
    $msg .='voici mon message:'."\r\n";
    $msg .= $message;
    $headers = 'from:hostmaster@gmail.com'."\r\n". 'Reply-to: '.$email . "\r\n". 'XMailer: PHP/'. phpversion();
    
    if(mail($to, $sujet, $msg, $headers))
    {
        echo"<html>
        <head>
            <title>Message Envoyé !</title>
        </head>
        <body onLoad=\"javascript:alert(' Votre message a bien été envoyer,je vous répondrai dans les plus brefs délais!');window.location='contact.php'\">
        </body>
            </html>";
    }
   
        
}