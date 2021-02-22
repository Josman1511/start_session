<?php

class Connection
{
    private $PDO;

    public function __construct()
    {
        $this->PDO = new PDO('mysql:host=127.0.0.1;port=3307;dbname=iniciosesion', 'root', '');

    }

    public function getUser(string $userName): array
    {
        $query = $this->PDO->query("SELECT * FROM usuarios WHERE username='" . $userName . "'");
        $usuario = $query->fetchAll(PDO::FETCH_ASSOC);
        return (empty($usuario)) ? $usuario : $usuario[0];
    }

    /**
     * @return PDO
     */
    public function getPDO(): PDO
    {
        return $this->PDO;
    }

}