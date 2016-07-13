<?php
	
	$w_routes = array(

		['GET', '/blog', 'Blog#home', 'home'],

		// Affichage en liste ou en grille
                ['GET', '/blog/liste', 'Blog#liste', 'liste'],
                ['GET', '/blog/grid', 'Blog#grid', 'grid'],

                // Gestion des articles
                ['GET|POST', '/blog/article/[:id]', 'Blog#article', 'article'],
                ['GET|POST', '/blog/add', 'Blog#add', 'add'],
		['GET|POST', '/blog/delete/[:id]', 'Blog#delete', 'delete'],

                // Gestion des commentaires
                //['GET|POST', '/blog/addComment', 'Blog#addComment', 'addComment'],
            
		// Recherches spécifiques
		['GET|POST', '/blog/category/[:id]', 'Blog#category', 'category'],
		['GET', '/blog/search', 'Blog#search', 'search'],

		// Connexion
		['GET|POST', '/blog/login', 'User#login', 'login'],

	);
