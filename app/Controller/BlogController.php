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

}