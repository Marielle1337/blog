<?php

namespace Controller;

use \W\Controller\Controller;

class BlogController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$managerArticles = new \Manager\BlogManager();
		$managerArticles->setTable('articles');
		$articles = $managerArticles->findAll($orderBy = 'dateCreated', $orderDir = 'DESC', $limit=5);

		$this->show('blog/home', ['articles'=>$articles]);
	}

        //ajouter un article
        

        public function add()
        {
            var_dump($_FILES); //etat des lieux mettre en com a la fin ou supprimer la ligne
        // Autorisation
       
        
        
            // Je verifie si j'ai une soumission de formulaire
            if(isset($_POST['addArticle']) || isset($_POST['addArticleAndStay'])) {
                $errors = [];

                // Verifications
                if(empty($_POST['title'])) {
                    $errors['title']['empty'] = true;
                }
                if(empty($_POST['dateCreated'])) {
                    $errors['dateCreated']['empty'] = true;
                }
                if(empty($_POST['content'])) {
                    $errors['content']['empty'] = true;
                }
                if(empty($_FILES['picture'])) {
                    $errors['content']['empty'] = true;
                }

                // Ajout en DB
                if(count($errors) === 0) {
                    // Si j'ai pas d'erreur
                    $name = $_POST['title'];
                    $dateCreated = $_POST['dateCreated'];
                    $content = $_POST['content'];
                    $picture = $_FILES['picture']

                    $manager = new \Manager\TaskManager();
                    $manager->insert([
                        'title' => $title,
                        'dateCreated' => $dateCreated,
                        'content' => $content,
                        'picture' => $picture,
                    ]);

                    if(isset($_POST['addArticle'])) {
                        // Ajout et redirection
                        $this->redirectToRoute('home');
                    } else { // Facultatif
                        // Si j'ai clique sur 'rester'
                        $this->redirectToRoute('home');
                    }
                    
                    // traitement du medias
                    // Vérifier si le téléchargement du fichier n'a pas été interrompu
                    if ($_FILES['picture']['error'] != UPLOAD_ERR_OK) {
                        echo 'Erreur lors du téléchargement.';
                    } else {
                        // Objet FileInfo
                        $finfo = new finfo(FILEINFO_MIME_TYPE);

                        // Récupération du Mime
                        $mimeType = $finfo->file($_FILES['picture']['tmp_name']);

                        $extFoundInArray = array_search(
                            $mimeType, array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                            )
                        );
                        if ($extFoundInArray === false) {
                            echo 'Le fichier n\'est pas une image';
                        } else {
                            // Si on a bien recu l'image, mais qu'elle fait moins de 50x50 px
                            $size = getimagesize($_FILES['picture']['tmp_name']);
                            // $size[0] contient la largeur
                            // $size[1] contient la hauteur
                            if ($size[0] < 50 || $size[1] < 50) {
                                $errors['imageTooSmall'] = true;
                            } else {

                                // Renommer nom du fichier
                                $fileName = sha1_file($_FILES['picture']['tmp_name']) . time() . '.' . $extFoundInArray;
                                $path = './uploads/' . $fileName;
                                $moved = move_uploaded_file($_FILES['picture']['tmp_name'], $path);
                                if (!$moved) {
                                    echo 'Erreur lors de l\'enregistrement';
                                } else {
                                    // On a bien uploadé le fichier
                                    addPic($pdo, $_POST['name'], $fileName, $_POST['legend']);
                                }
                            } // End Move File
                        } // End File Is Image
                    } // End Upload Success
                }
                // Si j'ai une erreur
                // J'affiche le template, avec un tableau d'erreurs
                $this->show('blog/add', $errors);
            }
        
        $this->show('blog/add');
        }
}