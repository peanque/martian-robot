<?php

namespace Tests\Unit\MartianRobot\MovementCommand;

use App\Services\Common\Contracts\MovableInterface;
use App\Services\MartianRobot\Commands\TurnLeftCommand;
use PHPUnit\Framework\TestCase;

class TurnLeftCommandTest extends TestCase
{
    public function test_executes_turns_left_correctly(): void
    {
        $movable = $this->createMock(MovableInterface::class);   

        $orientations = ['N', 'E', 'S', 'W'];
        $expectedOrientations = ['W', 'N', 'E', 'S'];

        $movable->expects($this->exactly(count($orientations)))
            ->method('getOrientation')
            ->willReturnOnConsecutiveCalls(...$orientations);
        
        $movable->expects($this->exactly(count($expectedOrientations)))
            ->method('setOrientation')
            ->willReturnCallback(function ($orientation) use (&$expectedOrientations) {
                $expected = array_shift($expectedOrientations); 
                $this->assertEquals($expected, $orientation);
            });
        
        $turnLeftCommand = new TurnLeftCommand();

        foreach ($orientations as $orientation) {
            $turnLeftCommand->execute($movable);
        }
    }
}
