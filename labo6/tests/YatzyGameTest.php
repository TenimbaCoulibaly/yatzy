<?php
namespace Yatzy\Test;

use Yatzy\YatzyGame;
use PHPUnit\Framework\TestCase;

class YatzyGameTest extends TestCase
{

    public function testConstructor()
    {
        $yatzyGame = new YatzyGame();
        $this->assertInstanceOf(YatzyGame::class, $yatzyGame);
    }
}