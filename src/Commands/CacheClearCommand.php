<?php

// Define a class named CacheClearCommand that extends the Command class
class CacheClearCommand extends Command
{
    // Method to execute the command with given arguments
    public function execute($arguments)
    {
        // Set the Expires header to a past date to ensure the content is not cached
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        // Set the Last-Modified header to the current date and time in GMT
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        // Set Cache-Control headers to prevent caching
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        // Additional Cache-Control headers for older HTTP/1.0 clients
        header("Cache-Control: post-check=0, pre-check=0", false);
        // Set the Pragma header to no-cache to prevent caching
        header("Pragma: no-cache");
    }

    // Method to get the description of the command
    public function getDescription()
    {
        // Return a description of what the command does
        return "Lists all arguments passed to the command.";
    }
}

?>
