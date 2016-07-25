<?php 

namespace Manager;

use \W\Manager\Manager;

class SubscriptionManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('subscriptions');
    }
    
    public function deleteMail($email)
	{
		$sql = "DELETE FROM " . $this->table . " WHERE $this->email = :email LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":email", $email);
		return $sth->execute();
	}

}
