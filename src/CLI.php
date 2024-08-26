<?php

class CLI
{
    private $commands = [];

    public function register($name, Command $command)
    {
        $this->commands[$name] = $command;
    }

    public function run()
    {
        global $argv;
        array_shift($argv); // Убираем имя скрипта из аргументов

        if (empty($argv)) {
            echo "No command provided. Use 'help' for a list of commands.\n";
            return;
        }

        $commandName = $argv[0];
        $commandArgs = array_slice($argv, 1);

        if (!isset($this->commands[$commandName])) {
            echo "Command not found. Use 'help' for a list of commands.\n";
            return;
        }

        $command = $this->commands[$commandName];
        $command->execute($commandArgs);
    }

    public function getRegisteredCommands()
    {
        return $this->commands;
    }
}

?>