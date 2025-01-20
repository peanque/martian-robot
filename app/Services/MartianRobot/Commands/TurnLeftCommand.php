<?php

namespace App\Services\MartianRobot\Commands;

use App\Enums\Orientation;
use App\Exceptions\InvalidOrientationException;
use App\Services\Common\Contracts\MovableInterface;

class TurnLeftCommand extends MovementCommand
{
    public function execute(MovableInterface $movable): void
    {
        $currentOrientation = Orientation::tryFrom($movable->getOrientation());

        if (!$currentOrientation) {
            throw new InvalidOrientationException('Invalid orientation for turning left. Expected N, E, S, or W.');
        }

        $movable->setOrientation($currentOrientation->turnLeft()->value);
    }
}