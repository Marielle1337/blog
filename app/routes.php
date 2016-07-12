<?php
	
	$w_routes = array(

		['GET', '/blog', 'Blog#home', 'home'],
                ['GET', '/blog/liste', 'Blog#liste', 'liste'],
                ['GET', '/blog/grid', 'Blog#grid', 'grid'],
                ['GET', '/blog/article/[:id]', 'Blog#article', 'article'],
                ['GET|POST', '/blog/add', 'Blog#add', 'add'],
                ['GET|POST', '/blog/addComment', 'Blog#addComment', 'addComment'],
		['GET|POST', '/blog/delete/[:id]', 'Blog#delete', 'delete'],
		['GET|POST', '/blog/category/[:id]', 'Blog#category', 'category'],
		['GET|POST', '/blog/login', 'User#login', 'login'],
		['GET', '/blog/search', 'Blog#search', 'search'],

	);
