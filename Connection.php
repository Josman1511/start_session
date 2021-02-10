<?php
class Connection
{
    public $PDO;
public function __construct()
{
   $this->PDO = new PDO( 'mysql:host=127.0.0.1;port=3307;dbname=iniciosesion', 'root', '');
}
}