<?php

namespace acme\traits;
use acme\classes\Redirect;

trait LoginTrait
{
    private $fields;
    private $field;
    private $queryClass;

    public function setQueryClass($queryClass)
    {
        $this->queryClass = $queryClass;
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function loginSystem($email, $password)
    {

        if (!class_exists($this->queryClass)) {
            throw new \Exception("Class $this->queryClass does not exist.");
        }

        $dataLoggedUser = $this->queryClass::create()
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