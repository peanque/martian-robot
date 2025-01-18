<?php

namespace App\Services\MartianRobot\Commands;

use App\Services\Common\Contracts\MovableInterface;

abstract class MovementCommand {
    abstract public function execute(MovableInterface $robot): void;
}
