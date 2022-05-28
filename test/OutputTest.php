<?php

namespace Main;

require_once __DIR__.'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Controller\MainController;

final class OutputTest extends TestCase
{
    public function testExpectWordActualReverseWord(): void
    {
        $library = new MainController();
        $this->expectOutputString('index');

        print $library->index();
    }
}