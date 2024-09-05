<?php

namespace ServiceContainer\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use ServiceContainer\Implementation\Container;
use ServiceContainer\Implementation\ContainerExceptions;

class ContainerTest extends TestCase
{

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function test_service_can_be_retrieved_from_the_container()
    {

        $container = new Container();

        $container->add("dependant-class", DependantClass::class);


        $this->assertInstanceOf(DependantClass::class, $container->get("dependant-class"));

    }

    public function test_exceptions_work_when_service_cannot_be_found()
    {
        $container = new Container();

        $this->expectException(ContainerExceptions::class);

        $container->add("dependant-class");

    }


    public function test_has_method_is_working_good()
    {
        $container = new Container();

        $container->add("dependant-class", DependantClass::class);

        $this->assertTrue($container->has("dependant-class"));

        $this->assertFalse($container->has("non-existing-class"));

    }
}