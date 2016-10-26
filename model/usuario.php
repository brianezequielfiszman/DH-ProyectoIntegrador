<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

  class Usuario implements JsonSerializable
  {
    private $id;
    private $nombre;
    private $fechaNacimiento;
    private $mail;
    private $edad;
    private $password;
    private $passwordConfirm;

    public function __construct($id, $nombre, $fechaNacimiento, $mail, $edad, $password, $passwordConfirm)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setFechaNacimiento($fechaNacimiento);
        $this->setEmail($mail);
        $this->setEdad($edad);
        $this->setPassword($password);
        $this->setPasswordConfirm($passwordConfirm);
    }

    public static function loginConstruct($nombre, $password){ return new self(null, $nombre, null, null, null, $password, null); }
    
    public function getId() { return $this->id;  }
    public function getNombre() { return $this->nombre; }
    public function getFechaNacimiento() { return $this->fechaNacimiento; }
    public function getEmail() { return $this->mail; }
    public function getEdad() { return $this->edad; }
    public function getPassword() { return $this->password; }
    public function getPasswordConfirm() { return $this->passwordConfirm; }
    public function setId($id)  { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setFechaNacimiento($fechaNacimiento) { $this->fechaNacimiento = $fechaNacimiento; }
    public function setEmail($mail) { $this->mail = $mail; }
    public function setEdad($edad) { $this->edad = $edad; }
    public function setPassword($password) { $this->password = $password; }
    public function setPasswordConfirm($passwordConfirm) { $this->passwordConfirm = $passwordConfirm; }

    public function JsonSerialize(){
      return [
          'id'              => $this->getId(),
          'name'            => $this->getNombre(),
          'fechaNacimiento' => $this->getFechaNacimiento(),
          'email'           => $this->getEmail(),
          'edad'            => $this->getEdad(),
          'password'        => $this->getPassword(),
      ];
    }
  }
