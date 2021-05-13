<?php

class Connection
{
    private $PDO;

    public function __construct()
    {
        $this->PDO = new PDO('mysql:host=127.0.0.1;port=3307;dbname=iniciosesion', 'root', '');

    }

    public function getUser(string $username): array
    {
        $query = $this->PDO->prepare("SELECT * FROM users WHERE username= :username");
        $query->bindParam('username', $username);
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        return (empty($user)) ? $user : $user[0];
    }

    /**
     * @return PDO
     */
    public function getPDO(): PDO
    {
        return $this->PDO;
    }

}