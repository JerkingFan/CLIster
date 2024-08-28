<?php

// Define an abstract class named Command
abstract class Command
{
    // Define an abstract method named execute that takes one parameter: $arguments
    // This method must be implemented by any subclass of Command
    abstract public function execute($arguments);

    // Define an abstract method named getDescription
    // This method must be implemented by any subclass of Command
    abstract public function getDescription();
}

?>
