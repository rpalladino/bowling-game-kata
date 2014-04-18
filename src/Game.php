<?php

namespace BowlingGame;

class Game
{
	private $score = 0;

	/**
	 * Called each time a player rolls a ball. 
	 * 
	 * @param  int $pins The number of pins knocked down.
	 * @return void
	 */
	public function roll($pins)
	{
		$this->score += $pins;
	}

	/**
	 * Called only at the very end of the game.
	 * @return int Total score for the game.
	 */
	public function score()
	{
		return $this->score;
	}
}
