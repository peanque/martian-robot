<?php

namespace App\Services\MartianRobot\Commands;

use App\Services\MartianRobot\Contracts\MovableInterface;

class TurnRightCommand extends MovementCommand
{
    public function execute(MovableInterface $movable): void
    {
        $movable->setOrientation(match ($movable->getOrientation()) {
            'N' => 'E',
            'E' => 'S',
            'S' => 'W',
            'W' => 'N',
            default => throw new \InvalidArgumentException('Invalid orientation'),
        });
    }
}
