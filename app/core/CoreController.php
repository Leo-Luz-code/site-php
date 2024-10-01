<?php

namespace app\core;

use acme\classes\AddSlashUrl as slash;

class CoreController
{

    protected $url;

    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * add '/' at the end of url
     */
    private function addSlashUri()
    {
        $urlSlash = new slash();
        return $urlSlash->addSlash();
    }

    /**
     * verify url and get controller method
     */
    private function returnControllerMethod($explodeUrl)
    {
        if (count($explodeUrl) <= 1) {
            return ['controller' => $explodeUrl[1]];
        } else {
            return [
                'controller' => $explodeUrl[1],
                'method' => $explodeUrl[2]
            ];
        }
    }

    public function controller()
    {
        if (isset($this->url)) {
            if (substr_count($this->addSlashUri(), '/') > 1) {

                $explodeUrl = explode('/', $this->url);
                unset($explodeUrl[0]);
                $controller = $this->returnControllerMethod($explodeUrl);

                return $controller;
            } else {
                return ['controller' => DEFAULT_CONTROLLER];
            }
        } else {
            return ['controller' => DEFAULT_CONTROLLER];
        }
    }
}
