<?php

// Define a class named GreetCommand that extends the abstract class Command
class GreetCommand extends Command
{
    // Implement the abstract method execute from the Command class
    // This method takes an array of arguments (not used in this case)
    public function execute($arguments)
    {
        // Get the current hour in 24-hour format
        $hour = date('H');
        
        // Determine the appropriate greeting based on the current hour
        if ($hour < 12) {
            // If the hour is before 12 PM, print "Good Morning!" in green color
            Console::writeLine("Good Morning!", '32');
        } elseif ($hour < 18) {
            // If the hour is before 6 PM, print "Good Afternoon!" in yellow color
            Console::writeLine("Good Afternoon!", '33');
        } else {
            // If the hour is 6 PM or later, print "Good Evening!" in blue color
            Console::writeLine("Good Evening!", '34');
        }
    }

    // Implement the abstract method getDescription from the Command class
    // This method returns a description of the command
    public function getDescription()
    {
        return "Greets the user depending on the time of day.";
    }
}

?>
