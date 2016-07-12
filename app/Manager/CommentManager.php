<?php 

namespace Manager;

use \W\Manager\Manager;

class CommentManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('comments');
    }
    
	
}
