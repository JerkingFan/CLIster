<?php

class CacheClearCommand extends Command
{
    public function execute($arguments)
    {
        Console::writeLine("Listing arguments:", '34'); 
        foreach ($arguments as $index => $arg) {
            Console::writeLine("$index: $arg");
        }
    }

    public function getDescription()
    {
        return "The cache is being cleared.";
    }
}

?>