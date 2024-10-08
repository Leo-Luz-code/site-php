<?php

namespace acme\traits;
use Redirect;

trait LoginTrait
{
    private $fields;
    private $field;
    private $sqlField;

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function login($email, $password)
    {
        foreach ($this->fields as $field) {
            $this->field .= $field . '=? and ';
        }

        $this->sqlField = rtrim($this->field, 'and ');
        $dataLoggedUser = parent::find('first', ['conditions' => [$this->sqlField, $email, $password]]);

        return $dataLoggedUser;
    }

    public static function disconnect($session)
    {
        if (isset($_SESSION[$session])) {
            unset($_SESSION[$session]);
            session_regenerate_id();
        }
    }

    public static function isLoggedIn($session)
    {
        if (!isset($_SESSION[$session])) {
            Redirect::to('admin');
        }
    }

}