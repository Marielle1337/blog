<?php 

namespace Manager;

use \W\Manager\Manager;

class BlogManager extends Manager
{
	public function search 
	{
		$sql = 'SELECT * WHERE '.$name.' AND '.$date.' AND '.$content;
		$name = 'name LIKE %:name%';
	}
}
