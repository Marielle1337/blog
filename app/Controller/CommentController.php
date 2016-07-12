<?php

namespace Controller;

use \W\Controller\Controller;

class CommentController extends Controller
{
    
    public function addComment()//Page pour les commentaires.
    {
        //echo print_r($_SESSION);
        //$this->allowTo('admin');

        if(isset($_POST['addComment'])) {

        	$errors = [];

            if(empty($_POST['author'])){
            	$errors['author']=true;
            }
            if(empty($_POST['dateCreated'])){
            	$errors['dateCreated']=true;
            }
            if (empty($_POST['content'])) {
            	$errors['content']=true;
            }
            
            // Si aucune erreur
            if(count($errors) == 0) {
                $dateCreated = $_POST['dateCreated'];
                $author = $_POST['author'];
                $content = $_POST['content'];
                
                $managerComments = new \Manager\CommentManager();
                $data =[
                    'author'=>$author,
                    'dateCreated'=>$dateCreated,
                    'content'=>$content,
                ];
                $managerComments -> insert($data);
                //vers page task
                if (isset($_POST['addComment'])){
                    $this->redirectToRoute('home');
                }
                
            } else {
                // Si j'ai des erreurs

                 $this->show('blog/home', ['errors' => $errors]);
            }
            
        }
        else {
            // Premier acces a la page

            $this->show('blog/home');
        }
    } 
}