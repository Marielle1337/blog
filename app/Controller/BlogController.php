<?php

namespace Controller;

use \W\Controller\Controller;

class BlogController extends Controller
{

    /**
     * Page d'accueil par défaut
     */
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->searchBar();
    // }

    private function searchBar()
    {
        if (isset($_GET['search'])) {
            $searchManager = new\Manager\BlogManager();
            $find = $searchManager->searchByKeyWord($keyword = $_GET['toSearch']);

            $this->show('blog/search', ['find'=>$find, 'categories' => BlogController::categoriesMenu()]);
        }
    }

    private function addComment($id)
    {
        // Autorisation
        if (!empty($_POST)) {
            if ($_POST['content']) {
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = trim($value);
                }
            } else {
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = strip_tags(trim($value));
                }
            }
        }

        if (isset($_POST['addComment'])) {

            $errors = [];


                if (strlen($_POST['author']) < 3) {
                    $errors['author'] = 'Le nom renseigné est trop court (minimum 3 caractères)';
                }
                if (strlen($_POST['content']) < 3) {
                    $errors['content'] = 'Le contenu renseigné est insuffisant (minimum 3 caractères)';
                }
            
                // Si aucune erreur
                if(count($errors) == 0) {

                    $email = $_POST['email'];
                    $author = $_POST['author'];
                    $content = $_POST['content'];
                    $idArticle = $id;
                
                    $managerComments = new \Manager\BlogManager();
                    $managerComments->setTable('comments');
                    
                    $data =[
                        'author'=>$author,
                        'content'=>$content,
                        'idArticle'=>$idArticle,
                    ];

                    if(isset($email)) {
                        $data['email'] = $email;
                    }

                    if (strlen($_POST['author']) < 3) {
                        $errors['author'] = 'Le nom renseigné est trop court (minimum 3 caractères)';
                    }
                    if (strlen($_POST['content']) < 3) {
                        $errors['content'] = 'Le contenu renseigné est insuffisant (minimum 3 caractères)';
                    }
                    
                    $managerComments->insert($data);
                    
                
                    $this->redirectToRoute('article', ['id'=>$id]);
                    
               
                } else {
                    // Si j'ai des erreurs

                        $this->show('blog/article', ['errors' => $errors, 'article'=>$article, 'author'=>$author, 'comments'=>$comments, 'categories' => BlogController::categoriesMenu()]);
                }
            
            } 

    }

    private function showComment($id)// affichage du commentaire
    {
        $managerComments = new \Manager\BlogManager();
        $managerComments->setTable('comments');
        return $managerComments->comments($id);
    }

    public static function categoriesMenu()
    {
        $categoryManager = new \Manager\BlogManager();
        $categoryManager->setTable('categories');
        return $categoryManager->findAll();
    }


    public function home()
    {
        // Liste les articles
        $managerArticles = new \Manager\BlogManager();
        $managerArticles->setTable('articles');

        // On met dans une variable le nombre de messages qu'on veut par page
        $nombreDArticlesParPage = 5; // Essayez de changer ce nombre pour voir :o)
        // On récupère le nombre total de messages
        $totalDesArticles = $managerArticles->pagination();
        // On calcule le nombre de pages à créer
        $nombreDePages  = ceil($totalDesArticles / $nombreDArticlesParPage);
        // Puis on fait une boucle pour écrire les liens vers chacune des pages
                 
        if (isset($_GET['page'])) {
            $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse
        } else {
            // La variable n'existe pas, c'est la première fois qu'on charge la page
            $page = 1; // On se met sur la page 1 (par défaut)
        }
          
        // On calcule le numéro du premier message qu'on prend pour le LIMIT de MySQL
        $premierArticleAafficher = ($page - 1) * $nombreDArticlesParPage;
    
        $articles = $managerArticles->findAll($orderBy = 'dateCreated', $orderDir = 'DESC', $limit = $premierArticleAafficher, $offset = $nombreDArticlesParPage);
		
        // Recherche par mot clé
        $this->searchBar(); 
        
        $this->show('blog/home', ['articles'=>$articles, 'categories' => BlogController::categoriesMenu(), 'pages'=>$nombreDePages]);
    }

    public function add()// ajouter un article
    {
        //si tu es admin 
        //$this->allowTo('admin');
        //var_dump($_FILES); etat des lieux mettre en com a la fin ou supprimer la ligne
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

        $categoryManager = new \Manager\BlogManager;
        $categoryManager->setTable('categories');
        $categories = $categoryManager->findAll();

        // Je verifie si j'ai une soumission de formulaire
        if (isset($_POST['addArticle']) || isset($_POST['addArticleAndStay'])) {
            $errors = [];

            // Verifications
            if (strlen($_POST['title']) < 3) {
                $errors['title'] = 'Le titre renseigné est trop court (minimum 3 caractères)';
            }
            if (!empty($_POST['author']) && strlen($_POST['author']) < 3) {
                $errors['author'] = 'Le nom renseigné est trop court (minimum 3 caractères)';
            }
            if (strlen($_POST['content']) < 3) {
                $errors['content'] = 'Le contenu renseigné est insuffisant (minimum 3 caractères)';
            }
           if(!is_numeric($_POST['category'])) {
               $errors['categoryNumber'] = 'La catégorie est mal renseignée';
           }
           if(!isset($_POST['category'])){
               $errors['categoryEmpty'] = 'Aucune catégorie n\'a été renseignée';
           }
            // Ajout en DB
            if (count($errors) === 0) {
                // Si j'ai pas d'erreur
                $title = $_POST['title'];
                $content = $_POST['content'];
                $picture = $_FILES['picture'];
                $author = $_POST['author'];

                $managerArticles = new \Manager\BlogManager();


                if (isset($_FILES['picture']) && UPLOAD_ERR_NO_FILE != $_FILES['picture']['error']) {
                    // traitement du medias
                    // Vérifier si le téléchargement du fichier n'a pas été interrompu
                    if ($_FILES['picture']['error'] != UPLOAD_ERR_OK) {
                        echo 'Erreur lors du téléchargement.';
                    } else {
                        // Objet FileInfo
                        $finfo = new \finfo(FILEINFO_MIME_TYPE);

                        // Récupération du Mime
                        $mimeType = $finfo->file($_FILES['picture']['tmp_name']);

                        $extFoundInArray = array_search(
                            $mimeType, array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                                //'mpeg' => 'video/mpeg',
                                //'mp4' => 'video/mp4',
                            )
                        );
                        if ($extFoundInArray === false) {
                            echo 'Le fichier n\'est pas une image';
                        } else {

                            // Renommer nom du fichier
                            $fileName = sha1_file($_FILES['picture']['tmp_name']) . time() . '.' . $extFoundInArray;
                            $path = __DIR__ . '/../../public/assets/uploads/' . $fileName;
                            //echo $path;die();
                            $moved = move_uploaded_file($_FILES['picture']['tmp_name'], $path);
                            if (!$moved) {
                                echo 'Erreur lors de l\'enregistrement';
                            } else {
                                //on redimensionne le medias
                                //si je suis jpg ou png ou gif
                                if ($extFoundInArray == 'gif' || $extFoundInArray == 'png' || $extFoundInArray == 'jpg') {
                                    //resize
                                    $resize = $this->resize($path, null, 800, 180, $path);
                                }

                                // On upload le fichier
                            }
                        } // End File Is Image
                    } // End Upload Success
                }
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'idCategory'=>$_POST['category']
                ];

                if (!empty($author)) {
                    $data['author'] = $author;
                } else {
                    $data['author'] = 5;
                }
                if (!empty($fileName)) {
                    $data['picture'] = $fileName;
                }
                $managerArticles->insert($data, false);
                if (isset($_POST['addArticle'])) {
                    // Ajout et redirection
                    $this->redirectToRoute('home');
                } else { // Facultatif
                    // Si j'ai clique sur 'rester'
                    $this->redirectToRoute('add');
                }

            } else {


            // Si j'ai une erreur
            // J'affiche le template, avec un tableau d'erreurs
            $this->show('blog/add', ['errors' => $errors, 'categories' => BlogController::categoriesMenu()]);
            }
        } else {
            // premier acces a la page
            $this->show('blog/add', ['categories' => BlogController::categoriesMenu()]);
        }
    }

    public function delete($id)// effacer un article
    {
        //si tu es admin 
        //$this->allowTo('admin');

        $managerArticles = new \Manager\BlogManager();
        $managerArticles->setTable('articles');
        $managerArticles->delete($id);
        $this->redirectToRoute('liste');
    }

    public function liste()// liste de tous les articles
    {
        //si tu es admin 
        //$this->allowTo('admin');

        $managerArticles = new \Manager\BlogManager();
        $managerArticles->setTable('articles');
        $articles = $managerArticles->findAll($orderBy='dateCreated', $orderDir='DESC');
        $this->searchBar();

        $this->show('blog/liste', ['articles'=>$articles, 'categories' => BlogController::categoriesMenu()]);
    }

    public function grid()//grille des X derniers articles
    {
        //si tu es admin 
        //$this->allowTo('admin');

        $managerArticles = new \Manager\BlogManager();
        $managerArticles->setTable('articles');
        $articles = $managerArticles->findAll($orderBy = "dateCreated", $orderDir = "DESC", $limit = 5);
        $this->searchBar();

        $this->show('blog/grid', ['articles'=>$articles,'categories' => BlogController::categoriesMenu()]);
    }

    //redimensioner un media
    private function resize($file, $string = null, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100)
    {
        if ($height <= 0 && $width <= 0)
            return false;

        if ($file === null && $string === null)
            return false;

        # Setting defaults and meta

        $info = $file !== null ? getimagesize($file) : getimagesizefromstring($string);

        $image = '';

        $final_width = 0;

        $final_height = 0;

        list($width_old, $height_old) = $info;

        $cropHeight = $cropWidth = 0;

        # Calculating proportionality

        if ($proportional) {

            if ($width == 0)
                $factor = $height / $height_old;

            elseif ($height == 0)
                $factor = $width / $width_old;
            else
                $factor = min($width / $width_old, $height / $height_old);

            $final_width = round($width_old * $factor);

            $final_height = round($height_old * $factor);
        }

        else {

            $final_width = ( $width <= 0 ) ? $width_old : $width;

            $final_height = ( $height <= 0 ) ? $height_old : $height;

            $widthX = $width_old / $width;

            $heightX = $height_old / $height;

            $x = min($widthX, $heightX);

            $cropWidth = ($width_old - $width * $x) / 2;

            $cropHeight = ($height_old - $height * $x) / 2;
        }

        # Loading image to memory according to type

        switch ($info[2]) {

            case IMAGETYPE_JPEG: $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);

                break;

            case IMAGETYPE_GIF: $file !== null ? $image = imagecreatefromgif($file) : $image = imagecreatefromstring($string);

                break;

            case IMAGETYPE_PNG: $file !== null ? $image = imagecreatefrompng($file) : $image = imagecreatefromstring($string);

                break;

            default: return false;
        }

        # This is the resizing/resampling/transparency-preserving magic

        $image_resized = imagecreatetruecolor($final_width, $final_height);

        if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) {

            $transparency = imagecolortransparent($image);

            $palletsize = imagecolorstotal($image);

            if ($transparency >= 0 && $transparency < $palletsize) {

                $transparent_color = imagecolorsforindex($image, $transparency);

                $transparency = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);

                imagefill($image_resized, 0, 0, $transparency);

                imagecolortransparent($image_resized, $transparency);
            } elseif ($info[2] == IMAGETYPE_PNG) {

                imagealphablending($image_resized, false);

                $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);

                imagefill($image_resized, 0, 0, $color);

                imagesavealpha($image_resized, true);
            }
        }


        imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);

        # Taking care of original, if needed

        if ($delete_original) {

            if ($use_linux_commands)
                exec('rm ' . $file);
            else
                @unlink($file);
        }

        # Preparing a method of providing result

        switch (strtolower($output)) {

            case 'browser':

                $mime = image_type_to_mime_type($info[2]);

                header("Content-type: $mime");

                $output = NULL;

                break;

            case 'file':

                $output = $file;

                break;

            case 'return':

                return $image_resized;

                break;

            default:

                break;
        }

        # Writing image according to type to the output destination and image quality

        switch ($info[2]) {

            case IMAGETYPE_GIF: imagegif($image_resized, $output);

                break;

            case IMAGETYPE_JPEG: imagejpeg($image_resized, $output, $quality);

                break;

            case IMAGETYPE_PNG:

                $quality = 9 - (int) ((0.9 * $quality) / 10.0);

                imagepng($image_resized, $output, $quality);

                break;

            default: return false;
        }

        return true;
    }

    public function search() // Recherche avancée
    {
        if (isset($_GET['advanced_search'])) {
            $searchManager = new\Manager\BlogManager();
            $find = $searchManager->search($title = $_GET['title'], $content = $_GET['content'], $dateCreated = $_GET['date']);

            $this->show('blog/search', ['find'=>$find, 'categories' => BlogController::categoriesMenu()]);
        }   
        $this->searchBar();
        $this->show('blog/advanced_search', ['categories' => BlogController::categoriesMenu()]);
    }

    public function article($id)// page d'affichage de l'article
    {
        $managerArticles = new \Manager\BlogManager();
        $managerArticles->setTable('articles');
        $article = $managerArticles->find($id);

        $authorManager = new \Manager\BlogManager();
        $authorManager->setTable('users');
        $author = $authorManager->find($article['author']);

        $this->searchBar();

        $this->addComment($article['id']);

        $comments = $this->showComment($article['id']);
        
        $this->show('blog/article', ['article'=>$article, 'author'=>$author, 'comments'=>$comments, 'categories' => BlogController::categoriesMenu()]);

    }

    public function category($id)
    {
        $managerArticles = new \Manager\BlogManager();
        $managerArticles->setTable('articles');
        $articles = $managerArticles->category($id);
        $this->searchBar();

        $this->show('blog/category', ['articles'=>$articles, 'categories' => BlogController::categoriesMenu()]);
    }

    public function archive()//liste de toute les newsletters 
    {
        //si tu es admin 
        //$this->allowTo('admin');

        $managerNewsletters = new \Manager\BlogManager();
        $managerNewsletters->setTable('newsletters');
        $newsletters = $managerNewsletters -> findAll($orderBy = "sendDate", $orderDir = "DESC");
        $this->searchBar();// je te garde quand meme ta searchbar ???
        $this->show('mail/archive', ['newsletters'=>$newsletters, 'categories' => BlogController::categoriesMenu()]);
    }

    public function editArticle($id)
    {
        $manager = new \Manager\BlogManager();
        $article = $manager->find($id);


        if (!empty($_POST)) {
            if ($_POST['content']) {
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = trim($value);
                }
            } else {
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = strip_tags(trim($value));
                }
            }
        }

        if (isset($_POST['editArticle'])) {

            $errors = [];

            // Verifications
            if (strlen($_POST['title']) < 3) {
                $errors['title'] = 'Le titre renseigné est trop court (minimum 3 caractères)';
            }
//            if (strlen($_POST['author']) < 3) {
//                $errors['author'] = 'Le nom renseigné est trop court (minimum 3 caractères)';
//            }
            if (strlen($_POST['content']) < 3) {
                $errors['content'] = 'Le contenu renseigné est insuffisant (minimum 3 caractères)';
            }

            if (count($errors) === 0) {

                $data = [
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'edited' => date("Y-m-d"),
                ];

                // traitement du medias
                // Vérifier si le téléchargement du fichier n'a pas été interrompu
                if ($_FILES['picture']['error'] != UPLOAD_ERR_OK) {
                    echo 'Erreur lors du téléchargement.' . $_FILES['picture']['error'];
                } else {
                    // Objet FileInfo
                    $finfo = new \finfo(FILEINFO_MIME_TYPE);

                    // Récupération du Mime
                    $mimeType = $finfo->file($_FILES['picture']['tmp_name']);

                    $extFoundInArray = array_search(
                        $mimeType, array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                            //'mpeg' => 'video/mpeg',
                            //'mp4' => 'video/mp4',
                        )
                    );

                    if ($extFoundInArray === false) {
                        echo 'Le fichier n\'est pas une image';
                    } else {
                        // Renommer nom du fichier
                        $fileName = sha1_file($_FILES['picture']['tmp_name']) . time() . '.' . $extFoundInArray;
                        $path = __DIR__ . '/../../public/assets/uploads/' . $fileName;
                        $moved = move_uploaded_file($_FILES['picture']['tmp_name'], $path);

                        if (!$moved) {
                            echo 'Erreur lors de l\'enregistrement';
                        } else {
                            //on redimensionne le medias
                            //si je suis jpg ou png ou gif
                            if ($extFoundInArray == 'gif' || $extFoundInArray == 'png' || $extFoundInArray == 'jpg') {
                                //resize
                                $resize = $this->resize($path, null, 800, 180, $path);
                            }

                            // suppression ancienne
                            unlink(__DIR__ . '/../../public/assets/uploads/' . $article['picture']);

                            // maj db
                            $data['picture'] = $fileName;
                        }
                    }
                }
            
                $manager->update($data, $id, false);
                $this->redirectToRoute('editArticle',['id'=>$id]);
            } else {
                $this->show('blog/editArticle', ['article'=>$article, 'errors'=>$errors, 'categories' => BlogController::categoriesMenu()]);
            }
        }

        $this->show('blog/editArticle', ['article'=>$article, 'categories' => BlogController::categoriesMenu()]);
    }
    
        
    

}
