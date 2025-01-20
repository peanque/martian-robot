<?php

namespace App\Services\MartianRobot\Commands;

use App\Enums\Orientation;
use App\Exceptions\InvalidOrientationException;
use App\Services\Common\Contracts\MovableInterface;

class TurnRightCommand extends MovementCommand
{
    public function execute(MovableInterface $movable): void
    {
        $currentOrientation = Orientation::tryFrom($movable->getOrientation());

        if (!$currentOrientation) {
            throw new InvalidOrientationException('Invalid orientation for turning right. Expected N, E, S, or W.');
        }

        $movable->setOrientation($currentOrientation->turnRight()->value);
    }
}
