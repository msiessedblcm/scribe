<?php

namespace Knuckles\Scribe\Tools;

use Illuminate\Routing\Route;
use ReflectionClass;

class RouteDecorator {
    private $route;

    public function __construct(Route $route) {
        $this->route = $route;
    }

    public function getContainer() {
        $reflector = new ReflectionClass($this->route);
        $property = $reflector->getProperty('container');
        $property->setAccessible(true);
        return $property->getValue($this->route);
    }
}
