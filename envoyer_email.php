<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Envoyer_email{

    public $nom;
    public $prenom;
    public $tel;
    public $email;
    public $sujet;
    public $message;  


    // methodes
    public function __construct($data)
    {    
        $this->prenom = ltrim(htmlentities(ucfirst($data["prenom"])));
        $this->nom = ltrim(htmlentities(strtoupper($data["nom"])));
        $this->tel = ltrim(htmlentities($data["tel"]));
        $this->email = ltrim(htmlentities(strtolower($data["email"])));
        $this->sujet = ltrim(htmlentities(ucfirst($data["sujet"])));
        $this->message = ltrim(htmlentities($data["message"]));

    }

    public function send_email($phpMailer)
    {
        print_r($this->nom);
        try{

            $phpMailer->SMTPDebug = SMTP::DEBUG_SERVER;
            $phpMailer->isSMTP();
            $phpMailer->Host  = 'smtp.gmail.com';
            $phpMailer->SMTPAuth = true;
            $phpMailer->Username = 'tidave97266@gmail.com';
            $phpMailer->Password = 'jhzbppmejksgdosb';
            $phpMailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $phpMailer->Port = 587;

            //Configuration 
            $phpMailer->setFrom('root@localhost', 'Mailer');
            $phpMailer->addAddress($this->email, $this->nom.''.$this->prenom);
            $phpMailer->addReplyTo($this->email,'Répondre a votre message:');
        

            print_r($phpMailer);

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: { $phpMailer->ErrorInfo}";
        }
        
    }

}