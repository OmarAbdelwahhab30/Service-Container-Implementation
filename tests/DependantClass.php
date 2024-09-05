<?php

namespace ServiceContainer\Tests;

class DependantClass
{

    public function __construct(private DependancyClass $dependancy)
    {

    }

    public function getDependancy()
    {
        return $this->dependancy;
    }
}