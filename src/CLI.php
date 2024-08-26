<?php

class CLI
{
    private $commands = [];

    public function register($commandName, $commandInstance)
    {
        $this->commands[$commandName] = $commandInstance;
    }

    public function run()
    {
        global $argv;

        $commandName = $argv[1] ?? null;

        if ($commandName === null) {
            $this->printHelp();
            return;
        }

        if (isset($this->commands[$commandName])) {
            $command = $this->commands[$commandName];
            $command->execute(array_slice($argv, 2));
        } else {
            echo "Command not found: $commandName\n";
            $this->printHelp();
        }
    }

    private function printHelp()
    {
        echo "Available commands:\n";
        foreach ($this->commands as $name => $command) {
            echo "  $name - " . $command->getDescription() . "\n";
        }
    }
}

?>