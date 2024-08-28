<?php

// Define a class named HelloCommand that extends the abstract class Command
class HelloCommand extends Command
{
    // Implement the abstract method execute from the Command class
    // This method takes an array of arguments
    public function execute($arguments)
    {
        // Get the first argument or default to 'World' if no argument is provided
        $name = $arguments[0] ?? 'World';
        // Print "Hello, [name]!" in green color
        Console::writeLine("Hello, $name!", '32');
    }

    // Implement the abstract method getDescription from the Command class
    // This method returns a description of the command
    public function getDescription()
    {
        return "Prints 'Hello, World!' or a specified name.";
    }
}

?>
