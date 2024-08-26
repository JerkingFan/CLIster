<?php

class HelloCommand extends Command
{
    public function execute($arguments)
    {
        $name = $arguments[0] ?? 'World';
        Console::writeLine("Hello, $name!", '32'); // Зеленый цвет
    }

    public function getDescription()
    {
        return "Prints 'Hello, World!' or a specified name.";
    }
}

?>