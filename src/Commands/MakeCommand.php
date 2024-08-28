<?php

// Define a class named MakeCommand that extends the abstract class Command
class MakeCommand extends Command
{
    // Implement the abstract method execute from the Command class
    // This method takes an array of arguments
    public function execute($arguments)
    {
        // Get the first argument or default to null if no argument is provided
        $name = $arguments[0] ?? null;

        // Check if a name is provided
        if ($name === null) {
            echo "Please provide a name for the new command.\n";
            return;
        }

        // Define the path to the new command file
        $commandFile = __DIR__ . "/../Commands/{$name}Command.php";
        // Get the directory of the command file
        $directory = dirname($commandFile);

        // Check if the directory exists, if not, create it with the specified permissions
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        // Check if the command file already exists
        if (file_exists($commandFile)) {
            echo "Command {$name} already exists.\n";
            return;
        }

        // Define the template for the new command class
        $template = "<?php\n\nclass {$name}Command extends Command\n{\n    public function execute(\$arguments)\n    {\n        // Your code here\n    }\n\n    public function getDescription()\n    {\n        return \"Description for {$name} command.\";\n    }\n}\n";

        // Write the template to the new command file
        file_put_contents($commandFile, $template);

        echo "Command {$name} created successfully at {$commandFile}.\n";
    }

    // Implement the abstract method getDescription from the Command class
    // This method returns a description of the command
    public function getDescription()
    {
        return "Generates a new command file.";
    }
}

?>
