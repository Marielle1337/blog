<?php

namespace Controller;

use \W\Controller\Controller;

class SubscriptionController extends Controller
{
    public function subscriptions()//Page qui ajoutera un abonnement a la newsletter.
    {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
            $_POST[$key] = strip_tags(trim($value));
            }
        }
        //echo print_r($_SESSION);
        //$this->allowTo('admin');

        if(isset($_POST['subscription'])) {

        	$errors = [];

            if(empty($_POST['email'])){
            	$errors['email']['empty']=true;
            }
            if(empty($_POST['newsletter'])){
            	$errors['newsletter']['empty']=true;
            }
            
            
            // Si aucune erreur
            if(count($errors) == 0) {
                $email = $_POST['email'];
                $newsletter = $_POST['newsletter'];
                
                
                $managerSubscription = new \Manager\SubscriptionManager();
                $data =[
                    'email'=>$email,
                    'newsletter'=>$newsletter,
                    
                ];
                $managerSubscription -> insert($data);
                //vers page 
                if (isset($_POST['subscription'])){
                    $this->redirectToRoute('subscription');
                }

                
            } else {
                // Si j'ai des erreurs

                 $this->show('subscription/subscription', ['errors' => $errors]);
            }
            
        }
        else {
            // Premier acces a la page


            $this->show('subscription/subscription');
        }
    }
    
}