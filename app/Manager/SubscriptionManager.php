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
    

}
