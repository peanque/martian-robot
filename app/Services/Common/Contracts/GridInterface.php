<?php

namespace App\Services\Common\Contracts;

use App\Services\Common\Position;

interface GridInterface {
    public function setDimensions(int $width, int $height): void;
    public function getWidth(): int;
    public function getHeight(): int;
    public function isValidPosition(Position $position): bool;
    public function isOutOfBounds(Position $position): bool;
}
