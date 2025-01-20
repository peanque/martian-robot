<?php

namespace App\Services\MartianRobot;

use App\Services\Common\Contracts\MovableInterface;
use App\Services\Common\Position;

class Robot implements MovableInterface
{
    private string $orientation;
    private Position $position;

    public function __construct(Position $position, string $orientation)
    {
        $this->position = $position;
        $this->orientation = $orientation;
    }

    public function getOrientation(): string
    {
        return $this->orientation;
    }

    public function setOrientation(string $orientation): void
    {
        $this->orientation = $orientation;
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function setPosition(Position $position): void
    {
        $this->position = $position;
    }
}
