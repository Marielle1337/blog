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
        //echo print_r($_SESSION);
        //$this->allowTo('admin');

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
                $this->show('mail/subscription', ['errors' => $errors]);
            }
            
        }
        else {
            // Premier acces a la page

            $this->show('mail/subscription');
        }
    }
    
}