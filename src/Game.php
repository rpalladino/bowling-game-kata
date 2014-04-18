<?php

namespace BowlingGame;

class Game
{
    private $rolls = array();
    private $currentRoll = 0;

    /**
     * Called each time a player rolls a ball. 
     * 
     * @param  int $pins The number of pins knocked down.
     * @return void
     */
    public function roll($pins)
    {
        $this->rolls[$this->currentRoll++] = $pins;
    }

    /**
     * Called only at the very end of the game.
     * @return int Total score for the game.
     */
    public function score()
    {
        $score = 0;
        $frameIndex = 0;
        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->isStrike($frameIndex))
            {
                $score += 10 + $this->strikeBonus($frameIndex);
                $frameIndex++;
            } else if ($this->isSpare($frameIndex)) {
                $score += 10 + $this->spareBonus($frameIndex);
                $frameIndex += 2;
            } else {
                $score += $this->sumOfBallsInFrame($frameIndex);
                $frameIndex += 2;
            }
        }
        return $score;
    }

    private function sumOfBallsInFrame($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
    }

    private function spareBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 2];
    }

    private function strikeBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 1] + $this->rolls[$frameIndex + 2];
    }

    private function isSpare($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] == 10;
    }

    private function isStrike($frameIndex)
    {
        return $this->rolls[$frameIndex] == 10;
    }
}
