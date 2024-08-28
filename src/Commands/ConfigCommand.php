<?php

// Define a class named ConfigCommand that extends the abstract class Command
class ConfigCommand extends Command
{
    // Define a private property to store the path to the configuration file
    private $configFile = __DIR__ . '/config.json';

    // Implement the abstract method execute from the Command class
    // This method takes an array of arguments and performs actions based on the first argument
    public function execute($arguments)
    {
        // Determine the action to perform, defaulting to 'view' if no action is provided
        $action = $arguments[0] ?? 'view';

        // Use a switch statement to handle different actions
        switch ($action) {
            case 'view':
                // Call the viewConfig method to display the configuration
                $this->viewConfig();
                break;
            case 'set':
                // Call the setConfig method to set a configuration key and value
                $this->setConfig($arguments[1] ?? null, $arguments[2] ?? null);
                break;
            case 'remove':
                // Call the removeConfig method to remove a configuration key
                $this->removeConfig($arguments[1] ?? null);
                break;
            default:
                // Output an error message for invalid actions
                echo "Invalid action. Use 'view', 'set' or 'remove'.\n";
        }
    }

    // Define a private method to view the configuration
    private function viewConfig()
    {
        // Check if the configuration file exists
        if (!file_exists($this->configFile)) {
            echo "No configuration found.\n";
            return;
        }

        // Read and decode the configuration file, then print it
        $config = json_decode(file_get_contents($this->configFile), true);
        print_r($config);
    }

    // Define a private method to set a configuration key and value
    private function setConfig($key, $value)
    {
        // Check if both key and value are provided
        if ($key === null || $value === null) {
            echo "Please provide a key and a value.\n";
            return;
        }

        // Read the existing configuration or initialize an empty array if the file doesn't exist
        $config = file_exists($this->configFile) ? json_decode(file_get_contents($this->configFile), true) : [];
        // Set the configuration key to the provided value
        $config[$key] = $value;
        // Write the updated configuration back to the file
        file_put_contents($this->configFile, json_encode($config, JSON_PRETTY_PRINT));

        echo "Configuration set: $key = $value\n";
    }

    // Define a private method to remove a configuration key
    private function removeConfig($key)
    {
        // Check if a key is provided
        if ($key === null) {
            echo "Please provide a key to remove.\n";
            return;
        }

        // Check if the configuration file exists
        if (!file_exists($this->configFile)) {
            echo "No configuration found.\n";
            return;
        }

        // Read and decode the configuration file
        $config = json_decode(file_get_contents($this->configFile), true);

        // Check if the key exists in the configuration
        if (isset($config[$key])) {
            // Remove the key from the configuration
            unset($config[$key]);
            // Write the updated configuration back to the file
            file_put_contents($this->configFile, json_encode($config, JSON_PRETTY_PRINT));
            echo "Configuration key '$key' removed.\n";
        } else {
            echo "Key '$key' not found.\n";
        }
    }

    // Implement the abstract method getDescription from the Command class
    // This method returns a description of the command
    public function getDescription()
    {
        return "Manages framework configuration settings.";
    }
}

?>
