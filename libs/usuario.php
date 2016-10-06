<?php
  include 'validable.php';

  class Usuario implements Validable, JsonSerializable
  {
    private $nombre;
    private $fechaNacimiento;
    private $mail;
    private $edad;
    private $password;

    public function __construct($nombre, $fechaNacimiento, $mail, $edad, $password)
    {
        $this->setNombre($nombre);
        $this->setFechaNacimiento($fechaNacimiento);
        $this->setMail($mail);
        $this->setEdad($edad);
        $this->setPassword($password);
    }

    public function saludar() { echo 'Hola'.' '.$this->getNombre(); }
    public function getNombre() { return $this->nombre; }
    public function getFechaNacimiento() { return $this->fechaNacimiento; }
    public function getMail() { return $this->mail; }
    public function getEdad() { return $this->edad; }
    public function getPassword() { return $this->password; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setFechaNacimiento($fechaNacimiento) { $this->fechaNacimiento = $fechaNacimiento; }
    public function setMail($mail) { if(self::validate(self::MAIL_REGEXP, $mail)):  $this->mail = $mail; endif; }
    public function setEdad($edad) { if(is_numeric($edad)): $this->edad = $edad; endif; }
    public function setPassword($password) { $this->password = self::encriptarPassword($password); }
    public function validate($regExp, $input) { return preg_match($regExp, $input); }
    public static function encriptarPassword($password) { return password_hash($password, PASSWORD_DEFAULT); }

    public function JsonSerialize(){
      return [
          'nombre' => $this->getNombre(),
          'fechaNacimiento' => $this->getFechaNacimiento(),
          'mail' => $this->getMail(),
          'edad' => $this->getEdad(),
          'password' => $this->getPassword(),
      ];
    }
  }
