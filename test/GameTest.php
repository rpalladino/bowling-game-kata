<?php

namespace BowlingGame;

require __DIR__ . '/../src/Game.php';

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var [Game
     */
    private $g;

    public function setUp()
    {
        $this->g = new Game;
    }

    private function rollMany($n, $pins)
    {
        for ($i=0; $i<$n; $i++) {
            $this->g->roll($pins);
        }
    }

    private function rollSpare()
    {
        $this->g->roll(5);
        $this->g->roll(5);
    }

    public function testGutterGame()
    {
        $n = 20;
        $pins = 0;
        $this->rollMany(20, 0);
        $this->assertEquals(0, $this->g->score());
    }

    public function testAllOnes()
    {
        $this->rollMany(20, 1);
        $this->assertEquals(20, $this->g->score());
    }

    public function testOneSpare()
    {
        $this->rollSpare();
        $this->g->roll(3);
        $this->rollMany(17,0);
        $this->assertEquals(16, $this->g->score());
    }

}