<?php 

namespace Manager;

use \W\Manager\Manager;

class BlogManager extends Manager
{
	public function search($name='', $date='', $content='')
	{
		$sql = 'SELECT * WHERE '.$name.' AND '.$date.' AND '.$content;
		$name = 'name LIKE %:name%';
		$date = 'dateCreated LIKE %:date%';
		$content = 'content LIKE %:content%';

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':content', $content);
		$stmt->execute();

		return $stmt->fetchAll();
	}
}
