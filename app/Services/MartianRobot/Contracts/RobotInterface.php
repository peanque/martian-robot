<?php

namespace App\Services\MartianRobot\Contracts;

interface RobotInterface {
    public function moveForward();
    public function moveBackward();
    public function turnLeft();
    public function turnRight();
    public function reportPosition();
    public function placeRobot($x, $y, $direction);
    public function processInstructions($instructions);
}
