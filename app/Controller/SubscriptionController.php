<?php

namespace Controller;

use \W\Controller\Controller;

class SubscriptionController extends Controller
{
    public function subscriptions()//Page qui ajoutera un abonnement a la newsletter.
    {
        if (!empty($_POST)) {
            if($_POST['content']){
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = trim($value);
                }
            } else {
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = strip_tags(trim($value));
                }
            }
        }

        unset($_SESSION['flash']);

        if(isset($_POST['subscription'])) {

        	$errors = [];

            if(empty($_POST['email'])){
            	$errors['email']['empty']=true;
            }
            
            // Si aucune erreur
            if(count($errors) == 0) {
                $email = $_POST['email'];
                
                $managerSubscription = new \Manager\SubscriptionManager();

                $managerSubscription -> insert(['email'=>$email]);

                //vers page 
                if (isset($_POST['subscription'])){
                    //$this->redirectToRoute('subscription');
                }

                
            } else {
                // Si j'ai des erreurs
                $this->show('mail/subscription', ['errors' => $errors, 'categories' => BlogController::categoriesMenu()]);
            }
            
        }

        if(isset($_POST['unsubscribe'])){
            $this->redirectToRoute('unsubscribe', ['email'=>$_POST['email']]);

        } 

        $this->show('mail/subscription', ['categories' => BlogController::categoriesMenu()]);
    }

    public function unsubscribe($email)
    {
        unset($_SESSION['flash']);

        $delete = new \Manager\SubscriptionManager();
        $delete->deleteMail($email);

        $_SESSION['flash'] = 'Vous n\'êtes plus abonné à la newsletter.';

        $this->redirectToRoute('subscription');
    }
    
}