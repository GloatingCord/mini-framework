<?php

namespace Framework\Testing;

require_once __DIR__.'/../vendor/autoload.php';

use App\Controlling\MainController;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class OutputTest extends TestCase
{
    public function testExpectWordActualReverseWord(): void
    {
        $library = new MainController();
        $this->expectOutputString('index');

        echo $library->index();
    }
}
