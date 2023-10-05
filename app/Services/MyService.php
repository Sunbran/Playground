<?php

namespace App\Services;

class MyService
{
    /**
     * @param $a
     * @param $b
     * @param $c
     * @return mixed
     */
    public function sum($a, $b, $c)
    {
        return $a + $b + $c;
    }

    /**
     * @return string
     */
    public function calculatorName(): string
    {
        return 'My calculator ' . $this->getRandom();
    }

    /**
     * Get random
     */
    public function getRandom() {
        return rand(1, 1000);
    }
}
