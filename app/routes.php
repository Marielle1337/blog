<?php
	
	$w_routes = array(
		['GET',         '/blog',                    'blog#home',        'home'],
		['GET|POST',    '/blog/add',                'blog#add',         'add'],
		['GET|POST',    '/blog/delete/[:id]',       'blog#delete',      'delete'],
	);
