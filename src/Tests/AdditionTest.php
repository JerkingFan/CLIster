<?php

class AdditionTest
{
    public function run()
    {
        $result = $this->addition(2, 3);
        if ($result !== 5) {
            throw new Exception('Test failed: Expected 5, got ' . $result);
        }
    }

    private function addition($a, $b)
    {
        return $a + $b;
    }
}
