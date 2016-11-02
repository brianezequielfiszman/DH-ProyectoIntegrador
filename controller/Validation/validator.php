<?php
  abstract class Validator {
    abstract protected function validate($object, $database);
  }
