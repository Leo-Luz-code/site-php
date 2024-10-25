<?php

namespace app\controllers\site;
use app\controllers\BaseController;
use \acme\classes\Email as Email;

class ContactController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Contact'];
        $template = $this->twig->load('site/contact.html');
        $template->display($data);
    }

    public function send()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // using htmlspecialchars for sanitizing string
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');


            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // email validation succesfull
                $sendEmail = new Email();
                $sendEmail->setSubject('Contact from site');
                $sendEmail->setSender($name);

                /**
                 * should we use this?
                 * $sendEmail->setFrom($_POST['email'], $_POST['name']);
                 * 
                 * update:
                 * not in this case. Name is set by setSender and 
                 * sender adress is set by the setFrom in Email.php
                 */

                $sendEmail->setRecipient("");
                $messageEmail = "<h2>Message sent by mvc site project</h2>";
                $messageEmail .= "Message sent at date: " . date("d/m/Y H:i:s") . " and the message is: " . $_POST['message'];

                $sendEmail->setBody($message);

                $data = $sendEmail->sendEmail() ?
                    ['message' => 'E-mail was successfully sent'] :
                    ['message' => 'E-mail was not sent. An error has occurred'];


            } else {
                $data = ['message' => 'Invalid e-mail'];
            }

            $template = $this->twig->load('site/contact.html');
            $template->display($data);
        } else {
            $this->index();
        }
    }

    public function test($query)
    {
    }

}