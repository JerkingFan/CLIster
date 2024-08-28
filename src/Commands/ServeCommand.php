<?php

// Define a class named ServeCommand that extends the abstract class Command
class ServeCommand extends Command
{
    // Implement the abstract method execute from the Command class
    // This method takes an array of arguments
    public function execute($arguments)
    {
        // Get the host from the first argument or default to '127.0.0.1' if not provided
        $host = $arguments[0] ?? '127.0.0.1';
        // Get the port from the second argument or default to '8000' if not provided
        $port = $arguments[1] ?? '8000';
        // Construct the command to start the PHP built-in server
        $command = "php -S $host:$port";

        // Output a message indicating the server is starting
        echo "Starting server at http://$host:$port...\n";
        // Execute the command to start the server
        shell_exec($command);
    }

    // Implement the abstract method getDescription from the Command class
    // This method returns a description of the command
    public function getDescription()
    {
        return "Starts a local development server.";
    }
}

?>
