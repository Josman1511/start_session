<?php
class Person{
    private $age; //propiedad
    private $nombre;
    public function __construct(string $name, int $edad)
    {
        $this->nombre = $name;
        $this->age = $edad;
    }
    public function getNombre():string{
        return strtoupper($this->nombre);
    }
    public function getAge(): int
    {
        return $this->age;
    }
    public function speak(): string{
        return $mensaje = "Hola ". $this->getNombre(). "! tienes ". $this->getAge(). " años";
    }
}
//destrcutor, extends, interface, implements, abstract
?>