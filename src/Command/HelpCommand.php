<?php

class HelpCommand extends Command
{
    private $cli;

    public function __construct($cli)
    {
        $this->cli = $cli;
    }

    public function execute($arguments)
    {
        echo "Available commands:\n";
        foreach ($this->cli->getRegisteredCommands() as $name => $command) {
            echo "  $name - " . $command->getDescription() . "\n";
        }
    }

    public function getDescription()
    {
        return "Displays help information for all commands.";
    }
}


?>