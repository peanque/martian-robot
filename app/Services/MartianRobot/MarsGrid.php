<?php

namespace App\Services\MartianRobot;

use App\Services\Common\Contracts\GridInterface;
use App\Services\Common\Position;

class MarsGrid implements GridInterface
{
    private int $width;
    private int $height;
    private array $scents = [];

    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function setDimensions(int $width, int $height): void
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function addScent(Position $position): void
    {
        $this->scents[$position->getXCoordinate()][$position->getYCoordinate()] = true;
    }

    public function hasScent(Position $position): bool
    {
        $xCoord = $position->getXCoordinate();
        $yCoord = $position->getYCoordinate();

        return isset($this->scents[$xCoord][$yCoord]) && $this->scents[$xCoord][$yCoord] === true;
    }

    public function isOutOfBounds(Position $position): bool
    {
        return $position->getXCoordinate() < 0 || $position->getXCoordinate() >= $this->width || $position->getYCoordinate() < 0 || $position->getYCoordinate() >= $this->height;
    }

    public function isValidPosition(Position $position): bool
    {
        return $position->getXCoordinate() >= 0 && $position->getXCoordinate() <= $this->width - 1 && $position->getYCoordinate() >= 0 && $position->getYCoordinate() <= $this->height - 1;
    }
}
