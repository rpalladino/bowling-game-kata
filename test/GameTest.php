<?php

namespace BowlingGame;

require __DIR__ . '/../src/Game.php';

class GameTest extends \PHPUnit_Framework_TestCase
{
	function testGutterGame()
	{
		$g = new Game();
		for ($i=0; $i<20; $i++) {
			$g->roll(0);
		}
		$this->assertEquals(0, $g->score());
	}
}