<?php

namespace Tests\Service\Unit;

use App\Services\MyService;
use PHPUnit\Framework\TestCase;

class MyServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @dataProvider dataSum
     * @return void
     */
    public function test_sum($first_number, $second_number, $third_number, $expected)
    {
        $service = app(MyService::class);
        $result = $service->sum($first_number, $second_number, $third_number);

        $this->assertEquals($expected, $result);
    }

    /**
     * @return array[]
     */
    public function dataSum() {
        return [
            'first_case' => [
                'first_number' => 1,
                'second_number' => 2,
                'third_number' => 0,
                'expected' => 3,
            ],
            'second_case' => [
                'first_number' => 100,
                'second_number' => 50,
                'third_number' => 0,
                'expected' => 150,
            ],
            'third_case' => [
                'first_number' => 30,
                'second_number' => 20,
                'third_number' => 0,
                'expected' => 50,
            ],
        ];
    }

    /**
     * Test content.
     *
     * @return void
     */
    public function test_calculator_name()
    {
        $service = $this->createPartialMock(MyService::class, ['getRandom']);
        $service->method('getRandom')->willReturn(1);

        $name = $service->calculatorName();

        $this->assertEquals('My calculator 1', $name);
    }
}
