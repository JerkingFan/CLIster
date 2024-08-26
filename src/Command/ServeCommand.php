<?php

class ServeCommand extends Command
{
    public function execute($arguments)
    {
        $host = $arguments[0] ?? '127.0.0.1';
        $port = $arguments[1] ?? '8000';
        $command = "php -S $host:$port";

        echo "Starting server at http://$host:$port...\n";
        shell_exec($command);
    }

    public function getDescription()
    {
        return "Starts a local development server.";
    }
}

?>