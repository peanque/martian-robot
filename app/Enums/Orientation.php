<?php

namespace App\Enums;

enum Orientation: string
{
    case NORTH = 'N';
    case EAST = 'E';
    case SOUTH = 'S';
    case WEST = 'W';

    public function turnRight(): self
    {
        return match ($this) {
            self::NORTH => self::EAST,
            self::EAST => self::SOUTH,
            self::SOUTH => self::WEST,
            self::WEST => self::NORTH,
        };
    }

    public function turnLeft(): self
    {
        return match ($this) {
            self::NORTH => self::WEST,
            self::WEST => self::SOUTH,
            self::SOUTH => self::EAST,
            self::EAST => self::NORTH,
        };
    }
}
