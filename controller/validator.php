<?php

  abstract class Validator
  {
    protected $errorOutput;

    public function __construct($errorOutput) { $this->errorOutput = $errorOutput; }
    
    abstract protected function validate($object);
  }

?>
