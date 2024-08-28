<?php

class PalindromeTest
{
    public function run()
    {
        $result = $this->isPalindrome('racecar');
        if ($result !== true) {
            throw new Exception('Test failed: Expected true, got ' . $result);
        }

        $result = $this->isPalindrome('hello');
        if ($result !== false) {
            throw new Exception('Test failed: Expected false, got ' . $result);
        }
    }

    private function isPalindrome($string)
    {
        $reversed = strrev($string);
        return $string === $reversed;
    }
}
