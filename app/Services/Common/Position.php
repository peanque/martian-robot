<?php

namespace App\Services\Common;

/**
 * This class for the position of object
 *
 */
class Position {
    public function __construct(
        private readonly int $xCoord,
        private readonly int $yCoord
    ) {}

    public function getXCoordinate(): int {
        return $this->xCoord;
    }

    public function getYCoordinate(): int {
        return $this->yCoord;
    }
}
