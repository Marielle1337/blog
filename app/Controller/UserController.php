<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
    public function login()
    {
        unset($_SESSION['flash']);

        $errors = [];

        $userManager = new \Manager\BlogManager();
        $userManager->setTable('users');

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
                $errors['connect'] = 'La connexion a échoué';
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
            if(isset($_POST['newsletter']) && $_POST['newsletter'] != '1'){
                $errors['newsletter'] = 'Paramètre d\'ajout à la newsletter invalide';
            }

            if(!$errors){

                if($_POST['newsletter']){
                    $newsManager = new \Manager\SubscriptionManager();
                    $newsManager->insert(['email'=>$_POST['email']]);
                }

                $data = [
                    'login' => $_POST['login'],
                    'email' => $_POST['email'],
                    'firstname' => $_POST['firstname'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'role' => 'user'
                ];

                $_SESSION['flash'] = 'Inscription prise en compte ! <br/>';
                $userManager->insert($data);

                // Creation du Manager
                $authentificationManager = new \W\Security\AuthentificationManager();
                $id = $authentificationManager->isValidLoginInfo($_POST['login'], $_POST['password']);
                
                // Si la connexion a reussi
                if($id) {
                    $userInfos = $userManager->find($id);
                    $authentificationManager->logUserIn($userInfos);
                    $_SESSION['flash'].= 'Utilisateur connecté <br/>';
                    //$this->redirectToRoute('home');
                } else {
                    $_SESSION['flash'].= 'La connexion a échoué <br/>';
                }
            }
        }

        $this->show('blog/connection', ['categories' => BlogController::categoriesMenu()]);
    }

    public function aboutMe()
    {
        $manager = new \Manager\BlogManager();
        $manager->setTable('whoIAm');
        $pres = $manager-> findAll();
        $this->show('blog/aboutMe', ['pres'=>$pres, 'categories' => BlogController::categoriesMenu()]);
    }

    public function logout()
    {
        $authentificationManager = new \W\Security\AuthentificationManager();
        $authentificationManager->logUserOut();

        $this->redirectToRoute('home');
    }
    
    //gestion de recupération du mot de passe
    public function lostPassword()
    {
        $displayMessage = false;
        // On soumet le formualire
        if (isset($_POST['reset-pass'])) {
            // On déclare le tableau d'erreur
            $errors = [];

            // On fait les vérifications
            if (!empty($_POST['email'])) {
                // Avant de valider un champ, on le nettoie
                $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
                // On teste la validité du email
                $isemailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

                if (!$isemailValid) {
                    // Si l'email n'est pas valide
                    $errors['email']['invalid'] = true;
                }
            } else {
                // Si l'email est vide
                $errors['email']['empty'] = true;
            }

            // Ajout en DB
            // Si pas d erreur
            if (count($errors) === 0) {

                // On vérifie si le mail exist en bdd
                $usersManager = new \Manager\UsersManager();
                $mailExists = $usersManager->emailExists($_POST['email']);

                if ($mailExists) {
                    $token = \W\Security\StringUtils::randomString(32);
                    $uId = $usersManager->getIdForMail($_POST['email']);

                    $this->insertTokenReplaceOld($uId, $token);
                    // Envoi du mail
                    $this->sendRecoveryLink($_POST['email'], $token);
                }
            }
            // Si j'ai une erreur
            $this->show('blog/lostPassword', ['errors' => $errors, 'categories' => BlogController::categoriesMenu()]);
        }
        
        $this->show('blog/lostPassword', ['categories' => BlogController::categoriesMenu()]);
    }

    // Insert un token à l'utilisateur concerné
    private function insertTokenReplaceOld($id, $token)
    {
        $recoveryTokenManager = new \Manager\RecoveryTokenManager();
        if($recoveryTokenManager->tokenExistsForUser($id)) {
            $recoveryTokenManager->deleteTokenForUser($id);
        }
        $recoveryTokenManager->update(['token' => $token], $id);
    }

    // Envoie de l email pour la réinitialisation du mot de passe
    public function sendRecoveryLink($email, $token)
    {
        $mailer = new \PHPMailer();

        $mailer->isSMTP();                                      // On va se servir de SMTP
        $mailer->Host = 'smtp.gmail.com';  				        // Serveur SMTP
        $mailer->SMTPAuth = true;                               // Active l'autentification SMTP
        $mailer->Username = 'projet.wf3@gmail.com';             // SMTP username
        $mailer->Password = 'Projet_JVC2016';                   // SMTP password
        $mailer->SMTPSecure = 'tls';                            // TLS Mode
        $mailer->Port = 587;                                    // Port TCP à utiliser

        $mailer->Sender='projet.wf3@gmail.com';
        $mailer->setFrom('projet.wf3@gmail.com', 'Benjamin Cerbai', false);
        $mailer->addAddress($email);                 // Ajouter un destinataire ....quelle adresse ???

        $mailer->isHTML(true);                                  // Set email format to HTML

        $mailer->Subject = 'Demande de changement de mot de passe';
        $mailer->Body    = 'Bonjour, <br><br>
        Vous avez fait une demande de changement de mot de passe, sur le site de Benjamin Cerbai. <br>
        Cliquez sur ce lien pour changer votre mot de passe : <a href="http://localhost'.$this->generateUrl('resetPassword', ['tk' => $token]).'">Cliquez ici</a>.
        <br><br>
        Bonne continuation sur le site.';
        $mailer->AltBody = 'Le message en texte brut, pour les clients qui ont désactivé l\'affichage HTML';

        $mailer->send();

        $_SESSION['flash'] = 'Un email vient de vous être envoyé';
    }

    public function resetPassword($tk)
    {
        $tk; // token
        $recoveryTokenManager = new \Manager\RecoveryTokenManager();
        $idUser = $recoveryTokenManager->getUserIdByToken($tk);
        if ($idUser === false) {
            /* Si ce token n'a jamais été émis, on redirige */
            $this->redirectToRoute('login');
        }
        /* A partir de la, je sais que mon token existe en DB */

        /* Si on a soumis le nouveau mot de passe */
        if (isset($_POST['change_password'])) {
            // On déclare le tableau d'erreur
            $errors = [];

            // Verification
            if (!empty($_POST['new_pass'])) {
                if (strlen($_POST['new_pass']) < 8 || strlen($_POST['new_pass']) > 50) {
                    // S'il est pas vide et qu'il est pas compris entre 2 et 50 carractères
                    $errors['new_pass']['size'] = true;
                }
            } else {
                // Si on a pas précisé de mot de passe
                $errors['new_pass']['empty'] = true;
            }

            if (!empty($_POST['password2'])) {
                if (!empty($_POST['new_pass']) && ($_POST['new_pass'] !== $_POST['password2'])) {
                    // Si les deux mot de passe ne sont pas identique
                    $errors['password2']['different'] = true;
                }
            } else {
                // Si la vérification de mot de passe n'est pas renseigné
                $errors['password2']['empty'] = true;
            }

            // S'il n'y a pas d'erreur, on entre les changement dans la base de donnée
            if (count($errors) === 0) {

                /* Hash du nouveau mot de passe */
                $passHash = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);

                /*  Mise à jour du mot de passe */

                // Model pour insertion en base de donnees
                $usersManager = new \Manager\UsersManager();
                $data = ['password' => $passHash];
                $usersManager->update($data, $idUser);

                /* Suppression du token maintenant inutile */
                $recoveryTokenManager->deleteToken($tk);

                /* Pour affichage du message */
                $passUpdated = true;
                $this->redirectToRoute('login');
            }
            // Si j'ai une erreur
            $this->show('blog/resetPassword', ['errors' => $errors, 'categories' => BlogController::categoriesMenu()]);
        }
        $this->show('blog/resetPassword.php', ['categories' => BlogController::categoriesMenu()]);
    }
}
