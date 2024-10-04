<?php

namespace acme\classes;

class Email extends \PHPMailer\PHPMailer\PHPMailer
{
    private $email;
    private $body;
    private $sender;
    private $to;
    private $copy;
    private $subject;
    private $message;


    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function setCopy($copy)
    {
        $this->copy = $copy;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function sendEmail()
    {
        $this->CharSet = "UTF-8";
        $this->SMTPSecure = "ssl";
        $this->isSMTP();
        $this->Host = "";
        $this->Port = "";
        $this->SMTPAuth = true;
        $this->Username = "";
        $this->Password = "";
        $this->isHTML();
        $this->setFrom("");
        $this->FromName = $this->sender;
        $this->addAddress($this->to);
        $copy = $this->copy;

        if (!empty(($copy))) {
            $this->addAddress($copy);
        }

        $this->Subject = $this->subject;
        $this->AltBody = "To see this email you must use a program that accepts html";
        $this->msgHTML($this->body);

        if (!$this->send()) {
            return false;
        }

        return true;
    }

}