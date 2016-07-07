<?php 

namespace Manager;

use \W\Manager\Manager;

class BlogManager extends Manager
{
	public function findAllArticles()
	{
		$sth = $this->dbh->query('SELECT * FROM articles ORDER BY dateCreated');

		return $sth->fetchAll();
	}
}
