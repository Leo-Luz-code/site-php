<?php

namespace app\controllers;

use app\core\CoreController as CoreController;
use \acme\classes\Redirect;

class BaseController extends CoreController
{
    private $baseController;
    private $folders = ['admin', 'site'];
    protected $twig;

    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

    public function getController()
    {
        $this->baseController = ucfirst($this->controller()['controller'] . 'Controller');

        foreach ($this->folders as $folder) {
            if (class_exists("\\app\\controllers\\" . $folder . "\\" . $this->baseController)) {
                return "\\app\\controllers\\" . $folder . "\\" . $this->baseController;
            }
        }
        return "\\app\\controllers\\error\\NotFoundController";
    }

    private function methodExists($object, $method)
    {

        if (!method_exists($object, $method)) {
            Redirect::to('notFound');
        }

        return $this->baseController = $method;

    }

    public function getMethod($object)
    {
        if (empty($this->controller()['method'])) {

            return $this->methodExists($object, 'index');

        } else {
            if (method_exists($object, $this->controller()['method'])) {
                return $this->baseController = $this->controller()['method'];
            } else {

                return $this->methodExists($object, 'index');

            }
        }
    }
}
