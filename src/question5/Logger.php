<?php
require_once("LoggerInterface.php");

class Logger implements iLogger {

  private string $logFile;

  function __construct(string $file) {
      //We could validate the file path here

      $this->logFile = $file;
  }

  public function log(string $text) {
      //Super ugly but hey! I'm about to run out of time!
      $dump = "\n\n\n";
      $dump .= "--------------------------\n";
      $dump .= "New log: " . date("Y/m/d h:i:sa") . "\n";
      $dump .= "--------------------------\n";
      $dump .= $text;

      file_put_contents($this->logFile, $dump, FILE_APPEND);
  }
}
