<?php

namespace App\Services\Common\Contracts;

use App\Services\Common\Position;

interface MovableInterface {
    public function getOrientation(): string;
    public function setOrientation(string $orientation): void;
    public function getPosition(): Position;
    public function setPosition(Position $position): void;
}
