<?php

namespace Controller;

use \W\Controller\Controller;

class TaskController extends Controller 
{
	public function home()
	{
		$manager = new \Manager\TaskManager();
		$allTasks = $manager->findAll();
		$this->show('tasks/home', ['allTasks'=>$allTasks]);
	}

	public function add()
	{
		$manager = new \Manager\TaskManager();

		if(isset($_POST['add']) | isset($_POST['add_and_rest'])){

			$errors = [];

			if(strlen($_POST['name']) < 3) {
				$errors['name'] = 'L\'intitulé est trop court';
			}
			if($_POST['pririty'] =! '1' | $_POST['pririty'] =! '2'){
				$errors['priority'] = 'La priorité est mal renseignée';
			}
			
			if(count($errors) == 0){

				$data = [
					'id' => NULL,
					'name' => $_POST['name'],
					'date' => $_POST['date'],
					'priority' => $_POST['priority']
				];

				$manager->insert($data);
				
				if(isset($_POST['add'])) { 
					$this->redirectToRoute('home'); 
				} else if(isset($_POST['add_and_rest'])){
					 $this->show('tasks/add.php');
				}

			} else {
				$this->show('tasks/add.php', ['errors' => $errors]);
			}

		} else {
            $this->show('tasks/add.php');
		}
	}
}