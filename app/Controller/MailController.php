<?php

namespace Controller;

use \W\Controller\Controller;

class MailController extends Controller
{
    public function archive()//liste de toute les newsletters 
    {
        //si tu es admin 
        //$this->allowTo('admin');
        
        $managerNewsletters = new \Manager\MailManager();
        $managerNewsletters->setTable('newsletters');
        $newsletters = $managerNewsletters -> findAll($orderBy = "sendDate", $orderDir = "DESC");
        //$this->searchBar();// je te garde quand meme ta searchbar ???
        $this->show('mail/archive', ['newsletters'=>$newsletters]);
    }
    
    public function newsletters()// 
    {
        // Autorisation
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
            $_POST[$key] = strip_tags(trim($value));
            }
        }
        //echo print_r($_SESSION);
        //$this->allowTo('admin');

        if(isset($_POST['addNewsletter'])){

            $errors = [];

            if(empty($_POST['content'])){
            $errors['content']['empty']=true;
            }
            if(empty($_POST['title'])){
            $errors['title']['empty']=true;
            }
            if(empty($_POST['sendDate'])){
            $errors['sendDate']['empty']=true;
            }

            // Si aucune erreur
            if(count($errors) == 0) {
                $title = $_POST['title'];
                $sendDate = $_POST['sendDate'];
                $content = $_POST['content'];

                $managerNewsletters = new \Manager\MailManager();
                $managerNewsletters->setTable('newsletters');
                $data =[
                    'title'=>$title,
                    'content'=>$content,
                    'sendDate'=>$sendDate,

                ];
                $managerNewsletters -> insert($data);
                $this->redirectToRoute('newsletter');
            } else {
                // Si j'ai des erreurs

                $this->show('mail/newsletter', ['errors' => $errors, 'title'=>$title, 'sendDate'=>$sendDate, 'content'=>$content]);
            } 

        }else{
        // premier acces a la page
            $this->show('mail/newsletter');
        }
        //$this->show('mail/newsletter.php');
    }
    
}