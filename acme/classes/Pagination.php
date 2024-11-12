<?php

namespace acme\classes;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Pagerfanta\View\DefaultView;
use PagerFanta\View\TwitterBootstrap3View;
use Pagerfanta\View\OptionableView;

class Pagination
{

    private $pagerfanta;
    private $routeGenerator;
    private $view;
    private $query;


    public function __construct($data)
    {
        $adapter = new ArrayAdapter($data);
        $this->pagerfanta = new Pagerfanta($adapter);
        $this->query = Url::getAllUri();
    }

    public function perPage($perPage)
    {
        $this->pagerfanta->setMaxPerPage($perPage);
        $this->pagerfanta->getMaxPerPage();
    }

    public function curretPage($page)
    {
        $this->pagerfanta->setCurrentPage($page);
        $this->pagerfanta->getCurrentPage();
    }

    public function route()
    {
    }

    public function view($type)
    {
        $this->view = match ($type) {
            'Default' => new DefaultView(),
            'Bootstrap' => new TwitterBootstrap3View(),
            default => throw new \InvalidArgumentException("Unknown view type: $type")
        };

        $options = ['proximity' => 3];
        $links = $this->view->render($this->pagerfanta, $this->routeGenerator, $options);

        return $links;
    }

    public function paginate()
    {
        return $this->pagerfanta->getCurrentPage();
    }

}