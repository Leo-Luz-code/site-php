<?php

namespace acme\traits;
use acme\classes\Redirect;

trait LoginTrait
{
    private $fields;
    private $field;

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function login($queryClass, $email, $password)
    {

        if (!class_exists($queryClass)) {
            throw new \Exception("Class $queryClass does not exist.");
        }

        $dataLoggedUser = $queryClass::create()
            ->filterByEmail($email)
            ->filterByPassword($password)
            ->findOne();

        return $dataLoggedUser;
    }

    public static function disconnect($session)
    {
        if (isset($_SESSION[$session])) {
            unset($_SESSION[$session]);
            session_regenerate_id();
        }
    }

    public static function isLoggedIn($session, $redirect)
    {
        if (!isset($_SESSION[$session])) {
            Redirect::to($redirect);
        }
    }

}