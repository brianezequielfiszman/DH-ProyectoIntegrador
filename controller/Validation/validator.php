<?php
namespace Validation;
  abstract class Validator {
    abstract protected function validate($object, $database);
  }
