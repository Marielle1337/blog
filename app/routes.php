<?php
	
	$w_routes = array(

		['GET', '/blog', 'Blog#home', 'home'],
		['GET', '/qui-suis-je', 'User#aboutMe', 'aboutMe'],

		// Affichage en liste ou en grille
        ['GET', '/blog/liste', 'Blog#liste', 'liste'],
        ['GET', '/blog/grid', 'Blog#grid', 'grid'],

        // Gestion des articles
        ['GET', '/blog/article/[:id]', 'Blog#article', 'article'],
        ['GET|POST', '/blog/add', 'Blog#add', 'add'],
		['GET|POST', '/blog/delete/[:id]', 'Blog#delete', 'delete'],

		// Recherches spécifiques
		['GET|POST', '/blog/category/[:id]', 'Blog#category', 'category'],
		['GET', '/blog/search', 'Blog#search', 'search'],

		// Connexion
		['GET|POST', '/blog/login', 'User#login', 'login'],
		['GET|POST', '/blog/contact', 'User#contact', 'contact'],

	);
