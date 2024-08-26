<?php

// Define a class named CLI
class CLI
{
    // Private property to store registered commands
    private $commands = [];

    // Method to register a command with a given name
    public function register($name, Command $command)
    {
        // Store the command in the commands array with the given name as the key
        $this->commands[$name] = $command;
    }

    // Method to run the CLI application
    public function run()
    {
        // Access the global $argv array which contains command-line arguments
        global $argv;
        // Remove the first element from the $argv array (the script name)
        array_shift($argv); 
        // Check if any command is provided
        if (empty($argv)) {
            // Print a message if no command is provided
            echo "No command provided. Use 'help' for a list of commands.\n";
            return;
        }

        // Get the command name from the first argument
        $commandName = $argv[0];
        // Get the remaining arguments as command arguments
        $commandArgs = array_slice($argv, 1);

        // Check if the command is registered
        if (!isset($this->commands[$commandName])) {
            // Print a message if the command is not found
            echo "Command not found. Use 'help' for a list of commands.\n";
            return;
        }

        // Get the command object from the commands array
        $command = $this->commands[$commandName];
        // Execute the command with the provided arguments
        $command->execute($commandArgs);
    }

    // Method to get the list of registered commands
    public function getRegisteredCommands()
    {
        // Return the commands array
        return $this->commands;
    }
}

?>
