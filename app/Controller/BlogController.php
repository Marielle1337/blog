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

		$caterogyManager = new \Manager\BlogManager();
    	$caterogyManager->setTable('categories');
    	$categories = $caterogyManager->findAll();

		$this->show('blog/home', ['articles'=>$articles, 'categories'=>$categories]);
	}

    //ajouter un article  
    public function add()
    {
    // Autorisation
    
        $data = array(
            
        );

        if(!empty($_POST)) {
            foreach($_POST as $key => $value){
                $_POST[$key] = strip_tags(trim($value));
            }
        }
    
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

            // Ajout en DB
            if(count($errors) === 0) {
                // Si j'ai pas d'erreur
                $name = htmlentities($_POST['name']);
                $importance = $_POST['importance'];
                $dateEnd = $_POST['date-end'];

                $manager = new \Manager\TaskManager();
                $manager->insert([
                    'name' => $name,
                    'degree_of_importance' => $importance,
                    'date_end' => $dateEnd,
                ]);

                if(isset($_POST['add-task'])) {
                    // Ajout et redirection
                    $this->redirectToRoute('task_list');
                } else { // Facultatif
                    // Si j'ai clique sur 'rester'
                    $this->redirectToRoute('task_add');
                }
            }
            // Si j'ai une erreur
            // J'affiche le template, avec un tableau d'erreurs
            $this->show('task/add', $errors);
        }
    
    $this->show('task/add');
    }

    public function connect()
    {

    }

    public function category()
    {
    	
    }


}