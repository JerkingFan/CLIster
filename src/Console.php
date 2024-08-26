<?php

class Console
{
    public static function writeLine($text, $color = null)
    {
        $coloredText = $color ? "\033[" . $color . "m" . $text . "\033[0m" : $text;
        echo $coloredText . "\n";
    }
}

?>