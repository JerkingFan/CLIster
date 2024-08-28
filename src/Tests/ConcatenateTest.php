<?php

class ConcatenateTest
{
    public function run()
    {
        $result = $this->concatenate('Hello', 'World');
        if ($result !== 'HelloWorld') {
            throw new Exception('Test failed: Expected "HelloWorld", got ' . $result);
        }
    }

    private function concatenate($a, $b)
    {
        return $a . $b;
    }
}
