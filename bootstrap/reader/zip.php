<?php
/**
 * Kelas Zip
 * 
 * Membaca file dari file zip
 * 
 * @author wadahkode
 * @since version v1.0.0
 */
class Zip extends \ZipArchive
{
  protected $extension = "";
  
  /**
   * Read content from zip
   * 
   * @param string $entryName
   */
  public function read($entryName)
  {
    $entry = !empty($this->extension)
      ? $entryName . $this->extension
      : "";
        
    return $this->getFromName($entry);
  }
  
  public function setExtension($ext = "php")
  {
    return $this->extension = "." . $ext;
  }
  
  public function writeTo($path, $content)
  {
    $path = $path . $this->extension;
    
    // opening...
    $handler = fopen($path, "w");
    fwrite($handler, $content);
    fclose($handler);
  }
  
  public function __desctruct()
  {
    //
  }
}