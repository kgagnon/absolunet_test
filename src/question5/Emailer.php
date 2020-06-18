<?php
require_once("EmailerInterface.php");

class Emailer implements iEmailer {

  private string $recipient;
  private string $title;
  private string $body;

  function __construct(string $recipient) {
      $this->recipient = $recipient;
  }

  public function setTitle(string $title) {
      $this->title = $title;
  }

  public function setBody(string $body) {
      $this->body = $body;
  }

  public function sendEmail() {
      //would normaly be something like this:
      //mail($this->recipient, $this->title, $this->body);

      print($this->recipient . "<br>");
      print($this->title . "<br>");
      print($this->body . "<br>");
  }
}
