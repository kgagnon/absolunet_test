<?php

interface iEmailer
{
    public function setTitle(string $title);
    public function setBody(string $body);
    public function sendEmail();
}
