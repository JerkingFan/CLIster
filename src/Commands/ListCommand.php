<?php

// Define a class named ListCommand that extends the Command class
class ListCommand extends Command
{
    // Method to execute the command with given arguments
    public function execute($arguments)
    {
        // Write a line to the console with the text "Listing arguments:" in blue color
        Console::writeLine("Listing arguments:", '34'); // Blue color
        // Iterate over each argument and its index
        foreach ($arguments as $index => $arg) {
            // Write each argument with its index to the console
            Console::writeLine("$index: $arg");
        }
    }

    // Method to get the description of the command
    public function getDescription()
    {
        // Return a description of what the command does
        return "Lists all arguments passed to the command.";
    }
}

?>
