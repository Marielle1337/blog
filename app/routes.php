<?php
	
	$w_routes = array(
		['GET', '/tasks', 'Task#home', 'home'],
		['GET|POST', '/tasks/add', 'Task#add', 'add'],
		['GET', '/accounts/delete/[:id]', 'Task#delete', 'delete']
	);
