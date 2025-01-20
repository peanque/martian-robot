<?php

namespace Tests\Unit\MartianRobot\MovementCommand;

use App\Exceptions\InvalidOrientationException;
use App\Services\Common\Contracts\MovableInterface;
use App\Services\MartianRobot\Commands\TurnRightCommand;
use PHPUnit\Framework\TestCase;

class TurnRightCommandTest extends TestCase
{

    /**
     * Test that your turn right command works correctly based on the current orientations.
     * @return void
     */
    public function test_executes_turns_right_correctly(): void
    {
        $movable = $this->createMock(MovableInterface::class);

        $orientations = ['N', 'E', 'S', 'W']; // Set of initial orientations
        $expectedOrientations = ['E', 'S', 'W', 'N']; // expected orientations after turning right based from the initial orientations

        $movable->expects($this->exactly(count($orientations)))
            ->method('getOrientation')
            ->willReturnOnConsecutiveCalls(...$orientations);

        $movable->expects($this->exactly(count($expectedOrientations)))
            ->method('setOrientation')
            ->willReturnCallback(function ($orientation) use (&$expectedOrientations) {
                $expected = array_shift($expectedOrientations); 
                $this->assertEquals($expected, $orientation); 
            });

        $turnRightCommand = new TurnRightCommand();

        foreach ($orientations as $orientation) {
            $turnRightCommand->execute($movable);
        }
    }

    public function test_executes_throws_exception_on_invalid_orientation(): void
    {
        $movable = $this->createMock(MovableInterface::class);

        $movable->method('getOrientation')->willReturn('InvalidOrientation');

        $command = new TurnRightCommand();
        $this->expectException(InvalidOrientationException::class);

        $command->execute($movable);
    }

    public function test_executes_turns_right_when_facing_north(): void
    {
        $movable = $this->createMock(MovableInterface::class);

        $movable->expects($this->once())
            ->method('getOrientation')
            ->willReturn('N');

        $movable->expects($this->once())
        ->method('setOrientation')
        ->with('E');


        $turnRightCommand = new TurnRightCommand();
        $turnRightCommand->execute($movable);
    }

}
