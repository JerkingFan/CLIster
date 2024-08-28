<?php

// Define a class named Console
class Console
{
    // Define a static method named writeLine that takes two parameters: $text and $color (optional)
    public static function writeLine($text, $color = null)
    {
        // If $color is provided, format the text with the specified color using ANSI escape codes
        // Otherwise, use the text as is
        $coloredText = $color ? "\033[" . $color . "m" . $text . "\033[0m" : $text;
        
        // Output the (possibly colored) text followed by a newline character
        echo $coloredText . "\n";
    }
}

?>
