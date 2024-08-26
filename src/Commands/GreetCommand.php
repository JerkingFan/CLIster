<?php

class GreetCommand extends Command
{
    public function execute($arguments)
    {
        $hour = date('H');
        if ($hour < 12) {
            Console::writeLine("Good Morning!", '32');
        } elseif ($hour < 18) {
            Console::writeLine("Good Afternoon!", '33');
        } else {
            Console::writeLine("Good Evening!", '34');
        }
    }

    public function getDescription()
    {
        return "Greets the user depending on the time of day.";
    }
}

?>