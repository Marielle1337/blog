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
		$manager = new \Manager\BlogManager();
		$articles = $manager->findAll();

		$this->show('default/home');
	}

}