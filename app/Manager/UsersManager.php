<?php
namespace Model;

class UsersModel extends \W\Manager\UsersManager
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('users');
    }
    
    /**
     * Retourne l'ID d'un utilisateur en fonction de son mail
     * @param   $pdo Connexion PDO à la DB
     * @param   $mail Le mail
     * @return 	int : L'ID de l'utilisateur
     */
    public function getIdForMail($email) {
        $pdo= $this->dbh;
        $sql = 'SELECT id FROM ' . $this->getTable() . ' WHERE email LIKE :email LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $idUser = $result['id'];
        return (int) $idUsers;
        
    }

    /**
     * Retourne l'ID d'un utilisateur, en fonction du token enregistré en base
     * @param   $pdo Connexion PDO à la DB
     * @param   $token Le token créé pour l'utilisateur
     * @return 	int | false : L'ID de l'utilisateur ou false si aucun utilisateur n'a été trouvé
     */
    function getUserIdByToken ($token) {
        $pdo= $this->dbh;
        $sql = 'SELECT id_user FROM '. $this->getTable() .' WHERE token LIKE :token LIMIT 1';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $idUser = $result['id_user'];
        if ($idUser) {
            return (int) $idUser;
        }
        return false;
    }
    
    
}