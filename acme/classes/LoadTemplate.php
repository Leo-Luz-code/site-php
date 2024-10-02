<?php

namespace acme\classes;

class LoadTemplate
{
    private $twig;
    private $loader;

    private function loader()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(ROOT . '/app/views');
        return $this->loader;
    }

    public function init()
    {
        $this->twig = new \Twig\Environment($this->loader(), [
            'debug' => true,
            'cache' => ROOT . '/cache',
            'auto_reload' => true
        ]);

        return $this->twig;
    }
}
