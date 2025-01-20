<?php

namespace Tests\Unit\MartianRobot;

use App\Services\Common\Position;
use App\Services\MartianRobot\MarsGrid;
use PHPUnit\Framework\TestCase;

class MarsGridTest extends TestCase
{

    private MarsGrid $grid;

    protected function setUp(): void
    {
        parent::setUp();
        $this->grid = new MarsGrid(5, 5);
    }
    /**
     * A basic unit test example.
     */
    public function test_valid_position(): void
    {
        $position = new Position(2, 2);
        $this->assertTrue($this->grid->isValidPosition($position));
    }

    public function test_invalid_position(): void
    {
        $position = new Position(6, 6);
        $this->assertFalse($this->grid->isValidPosition($position));
    }

    public function test_mars_grid_dimension(): void
    {
        $this->assertEquals(5, $this->grid->getWidth());
        $this->assertEquals(5, $this->grid->getHeight());
    }

    public function test_is_out_of_bounds()
    {
        $position = new Position(-1, 0);
        $this->assertTrue($this->grid->isOutOfBounds($position));
    }

    public function test_add_scent()
    {
        $position = new Position(2, 2);
        $this->grid->addScent($position);
        $this->assertTrue($this->grid->hasScent($position));
    }

}
