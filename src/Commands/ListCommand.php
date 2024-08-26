<?php

class ListCommand extends Command
{
    public function execute($arguments)
    {
        Console::writeLine("Listing arguments:", '34'); // Синий цвет
        foreach ($arguments as $index => $arg) {
            Console::writeLine("$index: $arg");
        }
    }

    public function getDescription()
    {
        return "Lists all arguments passed to the command.";
    }
}

?>