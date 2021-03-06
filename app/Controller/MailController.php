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

        $this->searchBar();;

        $this->show('mail/archive', ['newsletters'=>$newsletters, 'categories' => BlogController::categoriesMenu()]);
    }
    
    public function newsletters()// ajout d'une newsletter
    {
        // Autorisation
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
        $this->allowTo('admin');

        if(isset($_POST['addNewsletter'])){

            $errors = [];

            if (strlen($_POST['title']) < 3) {
                $errors['title'] = 'Le titre renseigné est trop court (minimum 3 caractères)';
            }
            if (strlen($_POST['content']) < 3) {
                $errors['content'] = 'Le contenu renseigné est insuffisant (minimum 3 caractères)';
            }


            // Si aucune erreur
            if(count($errors) == 0) {
                $title = $_POST['title'];
                $sendDate = date("Y-m-d", strtotime($_POST['sendDate']));
                $content = $_POST['content'];

                $managerNewsletters = new \Manager\MailManager();
                $managerNewsletters->setTable('newsletters');
                $data = [
                    'title'=>$title,
                    'content'=>$content,
                ];

                if(!empty($sendDate)){
                    $data['sendDate']=$sendDate;
                }

                $managerNewsletters -> insert($data, false);

                $newsManager = new \Manager\SubscriptionManager();
                $news = $newsManager->findAll();

                if($news > 1){

                    foreach ($news as $new) {
                        $this->sendMail($new['email'], $title, $content);
                    }
                }

                $this->redirectToRoute('newsletter');
            } else {

                $this->searchBar();

                // Si j'ai des erreurs
                $this->show('mail/newsletter', ['errors' => $errors, 'title'=>$title, 'sendDate'=>$sendDate, 'content'=>$content, 'news'=>$news]);
            } 

        }else{

            $this->searchBar();

            // premier acces a la page
            $this->show('mail/newsletter', ['categories' => BlogController::categoriesMenu()]);
        }
        //$this->show('mail/newsletter.php');
    }

    private function sendMail($destMail, $title, $content, $sender='marielle010495@gmail.com', $senderName='Benjamin Cerbai')
    {
        $mail = new \PHPMailer();

        $mail->isSMTP();                                        // On va se servir de SMTP
        $mail->Host = 'smtp.gmail.com';                 // Serveur SMTP
        $mail->SMTPAuth = true;                                 // Active l'autentification SMTP
        $mail->Username = 'mail.wf3@gmail.com';                 // SMTP username
        $mail->Password = 'mailwf3741';                         // SMTP password
        $mail->SMTPSecure = 'tls';                              // TLS Mode
        $mail->Port = 587;                                      // Port TCP à utiliser

        $mail->Sender=$sender;
        $mail->setFrom($sender, $senderName, false);
        $mail->addAddress($destMail);          // Ajouter un destinataire
        $mail->addReplyTo($sender, $senderName);
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);                                     // Set email format to HTML

        $mail->Subject = $title;
        $mail->Body    = $content . '<footer> Vous souhaitez vous désabonner de la newsletter ? <a href="http://localhost'.$this->generateUrl('unsubscribe', ['email' => $destMail]).'">Cliquez ici</a> ! </footer>';
        $mail->AltBody = strip_tags($content. 'Vous souhaitez vous désabonner de la newsletter ? http://localhost'.$this->generateUrl('unsubscribe', ['email' => $destMail]).' Copiez/collez ce lien dans votre navigateur !');

        if(!$mail->send()) {
            echo 'Le message n\'a pas pu être envoyé';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Le message a été envoyé';
        }
    }

    public function edit($id)
    {
        $manager = new \Manager\MailManager();
        $newsletter = $manager->find($id);

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

        if(isset($_POST['addNewsletter'])){

            $errors = [];

            if (strlen($_POST['title']) < 3) {
                $errors['title'] = 'Le titre renseigné est trop court (minimum 3 caractères)';
            }
            if (strlen($_POST['content']) < 3) {
                $errors['content'] = 'Le contenu renseigné est insuffisant (minimum 3 caractères)';
            }

            // Si aucune erreur
            if(count($errors) == 0) {
            
                $data = [
                    'title'=>$_POST['title'],
                    'content'=>$_POST['content']
                ];

                if(!empty($_POST['sendDate'])){
                    $data['sendDate']=date('Y-m-d', strtotime($_POST['sendDate']));
                }

                $manager->update($data, $id, false);

                $this->redirectToRoute('archive');
            } else {

                $this->searchBar();

                $this->show('mail/editNewsletter', ['newsletter'=>$newsletter, 'errors'=>$errors, 'categories' => BlogController::categoriesMenu()]);
            }
        }

        $this->searchBar();

        $this->show('mail/editNewsletter', ['newsletter'=>$newsletter, 'categories' => BlogController::categoriesMenu()]);
    }

    public function contact()
    {
        if(isset($_POST['contact'])){

            $errors = [];

            if (strlen($_POST['title']) < 3) {
                $errors['title'] = 'Le titre renseigné est trop court (minimum 3 caractères)';
            }
            if (strlen($_POST['content']) < 3) {
                $errors['content'] = 'Le contenu renseigné est insuffisant (minimum 3 caractères)';
            }
            if (empty($_POST['email'])) {
                $errors['email'] = 'L\'email doit être renseigné';
            }
            if (empty($_POST['senderName'])) {
                $errors['senderName'] = 'Le nom de l\'expéditeur doit être renseigné';
            }
            
            // Si aucune erreur
            if(count($errors) == 0) {
            
                $this->sendMail('marielle010495@gmail.com', $_POST['title'], $_POST['content'], $_POST['email'], $_POST['senderName']);
                $_SESSION['flash'] = 'Message envoyé';
            }
        }

        $this->searchBar();

        $this->show('blog/contact', ['categories' => BlogController::categoriesMenu()]);
    }
    
    private function searchBar()
    {
        if (isset($_GET['search'])) {
            $searchManager = new\Manager\BlogManager();
            $find = $searchManager->searchByKeyWord($keyword = $_GET['toSearch']);

            $this->show('blog/search', ['find'=>$find, 'categories' => BlogController::categoriesMenu()]);
        }
    }
}