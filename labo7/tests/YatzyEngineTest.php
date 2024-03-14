<?php
namespace Yatzy\Test;

use Yatzy\YatzyEngine;
use PHPUnit\Framework\TestCase;

class YatzyEngineTest extends TestCase
{

    public function testConstructor()
    {
        $yatzyEngine = new YatzyEngine();
        $this->assertInstanceOf(YatzyEngine::class, $yatzyEngine);
    }
}