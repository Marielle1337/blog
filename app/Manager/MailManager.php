<?php 

namespace Manager;

use \W\Manager\Manager;

class MailManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('newsletters');
    }
    

}
