<?php

// Define a class named HelpCommand that extends the abstract class Command
class HelpCommand extends Command
{
    // Define a private property to store the CLI instance
    private $cli;

    // Constructor method to initialize the CLI instance
    public function __construct($cli)
    {
        $this->cli = $cli;
    }

    // Implement the abstract method execute from the Command class
    // This method takes an array of arguments (not used in this case)
    public function execute($arguments)
    {
        // Output a header for the list of available commands
        echo "Available commands:\n";
        // Iterate over the registered commands and output their names and descriptions
        foreach ($this->cli->getRegisteredCommands() as $name => $command) {
            echo "  $name - " . $command->getDescription() . "\n";
        }
    }

    // Implement the abstract method getDescription from the Command class
    // This method returns a description of the command
    public function getDescription()
    {
        return "Displays help information for all commands.";
    }
}

?>
