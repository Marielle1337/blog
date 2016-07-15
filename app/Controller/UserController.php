<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
    public function login()
    {
        $errors = [];

        $userManager = new \Manager\BlogManager();
        $userManager->setTable('users');
//print_r($_POST);die();
        if(isset($_POST['connect'])) {
            if(empty($_POST['login']) || empty($_POST['password'])) {
                // Redirection vers le login
                $this->redirectToRoute('login');
            }
            
            // Creation du Manager
            $authentificationManager = new \W\Security\AuthentificationManager();
            $id = $authentificationManager->isValidLoginInfo($_POST['login'], $_POST['password']);

            // Erreurs de connexion
            if(!$id){
                $errors['user'] = 'Le login ou l\'email n\'existe pas';
            }
            
            // Si la connexion a reussi
            if($id) {
                $userInfos = $userManager->find($id);
                $authentificationManager->logUserIn($userInfos);
                $this->redirectToRoute('home');
            } else {
                echo 'La connexion a échoué';
            }
            
        }

        if(!empty($_POST)) {
            foreach($_POST as $key => $value){
                $_POST[$key] = strip_tags(trim($value));
            }
        }

        if(isset($_POST['signup'])){

            if($_POST['password'] !== $_POST['password2']){
                $errors['confirm_password'] = 'Les mots de passe renseignés sont différents';
            }
            if(strlen($_POST['password']) < 10){
                $errors['password'] = 'Le mot de passe est trop court ! (10 caractères minimum)';
            }
            if(strlen($_POST['login']) < 3){
                $errors['login'] = 'Le login est trop court !';
            }
            if(strlen($_POST['firstname']) < 3){
                $errors['firstname'] = 'Le firstname est trop court !';
            }

            if(!$errors){

                $data = [
                    'login' => $_POST['login'],
                    'email' => $_POST['email'],
                    'firstname' => $_POST['firstname'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'role' => 'user'
                ];

                echo 'Inscription prise en compte !';
                $userManager->insert($data);

                // Creation du Manager
                $authentificationManager = new \W\Security\AuthentificationManager();
                $id = $authentificationManager->isValidLoginInfo($_POST['login'], $_POST['password']);
                
                // Si la connexion a reussi
                if($id) {
                    $userInfos = $userManager->find($id);
                    $authentificationManager->logUserIn($userInfos);
                    echo 'Utilisateur connecté';
                    //$this->redirectToRoute('home');
                } else {
                    echo 'La connexion a échoué';
                }
            }
        }

        $this->show('blog/connection');
    }

    public function contact()
    {
        $this->show('blog/contact');
    }

    public function aboutMe()
    {
        $manager = new \Manager\BlogManager();
        $manager->setTable('whoIAm');
        $pres = $manager-> findAll();
        $this->show('blog/aboutMe', ['pres'=>$pres]);
    }

    public function logout()
    {
        $authentificationManager = new \W\Security\AuthentificationManager();
        $authentificationManager->logUserOut();

        $this->redirectToRoute('home');
    }

    public function sendMail($destMail, $destName, $title, $content)
    {
        $mail = new \PHPMailer();

        $mail->isSMTP();                                        // On va se servir de SMTP
        $mail->Host = 'smtp.gmail.com';                 // Serveur SMTP
        $mail->SMTPAuth = true;                                 // Active l'autentification SMTP
        $mail->Username = 'mail.wf3@gmail.com';                 // SMTP username
        $mail->Password = 'mailwf3741';                         // SMTP password
        $mail->SMTPSecure = 'tls';                              // TLS Mode
        $mail->Port = 587;                                      // Port TCP à utiliser

        $mail->Sender='mailer@monsite.fr';
        $mail->setFrom('mailer@monsite.fr', 'Benjamin Cerbai', false);
        $mail->addAddress($destMail, $destName);          // Ajouter un destinataire
        $mail->addReplyTo('contact@monsite.fr', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);                                     // Set email format to HTML

        $mail->Subject = $title;
        $mail->Body    = $content;
        $mail->AltBody = strip_tags($content);

        if(!$mail->send()) {
            echo 'Le message n\'a pas pu être envoyé';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Le message a été envoyé';
        }
    }

}
