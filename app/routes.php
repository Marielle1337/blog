<?php
	
	$w_routes = array(

		['GET', '/blog', 'Blog#home', 'home'],
		['GET', '/qui-suis-je', 'User#aboutMe', 'aboutMe'],

		// Affichage en liste ou en grille
        ['GET', '/blog/liste', 'Blog#liste', 'liste'],

        // Gestion des articles
        ['GET|POST', '/blog/article/[:id]', 'Blog#article', 'article'],
        ['GET|POST', '/blog/add', 'Blog#add', 'add'],
		['GET|POST', '/blog/delete/[:id]', 'Blog#delete', 'delete'],
        ['GET|POST', '/blog/editArticle/[:id]', 'Blog#editArticle', 'editArticle'],
            
		// Recherches spécifiques
		['GET|POST', '/blog/category/[:id]', 'Blog#category', 'category'],
		['GET', '/blog/search', 'Blog#search', 'search'],

		// Connexion
		['GET|POST', '/blog/login', 'User#login', 'login'],
		['GET|POST', '/blog/logout', 'User#logout', 'logout'],
		['GET|POST', '/blog/contact', 'Mail#contact', 'contact'],
		['GET|POST', '/blog/lostPassword', 'User#lostPassword', 'lostPassword'],
        ['GET|POST', '/blog/resetPassword/[:tk]', 'User#resetPassword', 'resetPassword'],

        // NewsLetter
		['GET|POST', '/mail/newsletter', 'Mail#newsletters', 'newsletter'],
        ['GET|POST', '/subscription', 'Subscription#subscriptions', 'subscription'],
        ['GET', '/mail/archive', 'Mail#archive', 'archive'],
        ['GET|POST', '/mail/editNewsletter/[:id]', 'Mail#edit', 'editNewsletter'],
        ['GET', '/mail/unsubscribe/[*:email]', 'Subscription#unsubscribe', 'unsubscribe'],

	);
