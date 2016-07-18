<?php 

namespace Manager;

use \W\Manager\Manager;

class BlogManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('articles');
    }
    
	public function search($title='', $content='', $dateCreated='')
	{

		$options = [];
		if(!empty($title)) {
			$options['title']= $title;
		}
		if(!empty($content)) {
			$options['content']= $content;
		}
		if(!empty($dateCreated)) {
			$options['dateCreated']= $dateCreated;
		}

		$nbOptions = count($options);
		// Si j'ai au moins un champ
		if($nbOptions) {
		    $sql = 'SELECT * FROM articles WHERE ';
		    $i = 0;
		    foreach($options as $optionName => $value) {
		        $sql .= $optionName . ' LIKE "%' . $value.'%"';
		        if ($nbOptions > $i + 1) {
		            $sql .= ' AND ';
		        }
		        $i++;
		    }
		
			$stmt = $this->dbh->prepare($sql);

			if(!empty($title)){
				$stmt->bindParam(':title', $title);
			}
			if(!empty($dateCreated)){
				$stmt->bindParam(':dateCreated', $dateCreated);
			}
			if(!empty($content)){
				$stmt->bindParam(':content', $content);
			}

			$stmt->execute();

			return $stmt->fetchAll();
		}

	}

	public function searchByKeyWord($keyword='')
	{
		$sql = 'SELECT * FROM articles WHERE title OR content LIKE "%'.$keyword.'%"';

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(':keyword', $keyword);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function category($id)
	{
		$sql = 'SELECT * FROM articles WHERE idCategory = :id';

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function comments($id)
	{
		$sql = 'SELECT * FROM comments WHERE idArticle = :id';

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt->fetchAll();
	}
        
        public function doEdition($title, $author, $dateCreated, $content, $picture, $id){
        $pdo = $this->dbh;
        $sql = "UPDATE articles 
                SET title='$newTitle',picture='$newPicture',content='$newContent',dateCreated='$newDateCreated',author='$newAthor'
                WHERE id = '$id'";
        $pdo->exec($sql);
        }
}
