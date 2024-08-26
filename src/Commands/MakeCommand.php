<?php

class MakeCommand extends Command
{
    public function execute($arguments)
    {
        $name = $arguments[0] ?? null;

        if ($name === null) {
            echo "Please provide a name for the new command.\n";
            return;
        }

        $commandFile = __DIR__ . "/../Commands/{$name}Command.php";
        $directory = dirname($commandFile);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        if (file_exists($commandFile)) {
            echo "Command {$name} already exists.\n";
            return;
        }

        $template = "<?php\n\nclass {$name}Command extends Command\n{\n    public function execute(\$arguments)\n    {\n        // Your code here\n    }\n\n    public function getDescription()\n    {\n        return \"Description for {$name} command.\";\n    }\n}\n";

        file_put_contents($commandFile, $template);

        echo "Command {$name} created successfully at {$commandFile}.\n";
    }

    public function getDescription()
    {
        return "Generates a new command file.";
    }
}

?>