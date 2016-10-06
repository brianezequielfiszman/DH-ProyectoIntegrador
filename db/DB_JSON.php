<?php

include 'DB.php';

/**
 *
 */
class DB_JSON extends DB implements JsonSerializable
{
  private $arrObj;
  private $filePath;
  private $offset;

  function __construct($filePath, string $offset){
    $this->filePath = $filePath;
    $this->offset   = $offset;
    ($this->arrObj  = $this->parseFile($filePath)) ?: $this->arrObj = [ $this->offset => [] ] ;
  }

/**
 * This method parse a JSON file and returns its decoded contents
 *
 * Extending the summary, if the file doesnt exists it creates a new one.
 *
 * @param $filePath
 * @return json_decode(file_get_contents($filePath), true);
 */
  private function parseFile($filePath){
    if(file_exists($filePath)):
      return json_decode(file_get_contents($filePath), true);
    else:
      fclose(fopen($filePath, 'w+'));
      return json_decode(file_get_contents($filePath), true);
    endif;
  }


  /**
  * Submit submited object into JSON file.
  *
  * @param $arrObj
  * @return amount of bytes written into the file or FALSE in case of error.
  */
  public function submitObject($arrObj){
    array_push($this->arrObj[$this->offset], $arrObj);
    return file_put_contents($this->filePath, json_encode($this->getArrObj(), JSON_PRETTY_PRINT));
  }

  public function jsonSerialize() { return [ $this->offset => [] ]; }
  public function getArrObj() { return $this->arrObj; }
  public function setArrObj($arrObj) { $this->arrObj = $arrObj; }
}
