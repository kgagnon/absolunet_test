<?php

require_once("EmailerInterface.php");
require_once("LoggerInterface.php");


class ErrorHandler {
  private $emailer;
  private $logger;

  function __construct(iEmailer $emailer, iLogger $logger) {
      $this->emailer = $emailer;
      $this->logger = $logger;
  }

  public function handleError(string $error) {
      $this->emailer->setTitle("Project had unexpected error oh no!");
      $this->emailer->setBody($error);
      $this->emailer->sendEmail();

      $this->logger->log($error);
  }
}
