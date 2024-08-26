<?php

class ConfigCommand extends Command
{
    private $configFile = __DIR__ . '/config.json';

    public function execute($arguments)
    {
        $action = $arguments[0] ?? 'view';

        switch ($action) {
            case 'view':
                $this->viewConfig();
                break;
            case 'set':
                $this->setConfig($arguments[1] ?? null, $arguments[2] ?? null);
                break;
            case 'remove':
                $this->removeConfig($arguments[1] ?? null);
                break;
            default:
                echo "Invalid action. Use 'view', 'set' or 'remove'.\n";
        }
    }

    private function viewConfig()
    {
        if (!file_exists($this->configFile)) {
            echo "No configuration found.\n";
            return;
        }

        $config = json_decode(file_get_contents($this->configFile), true);
        print_r($config);
    }

    private function setConfig($key, $value)
    {
        if ($key === null || $value === null) {
            echo "Please provide a key and a value.\n";
            return;
        }

        $config = file_exists($this->configFile) ? json_decode(file_get_contents($this->configFile), true) : [];
        $config[$key] = $value;
        file_put_contents($this->configFile, json_encode($config, JSON_PRETTY_PRINT));

        echo "Configuration set: $key = $value\n";
    }

    private function removeConfig($key)
    {
        if ($key === null) {
            echo "Please provide a key to remove.\n";
            return;
        }

        if (!file_exists($this->configFile)) {
            echo "No configuration found.\n";
            return;
        }

        $config = json_decode(file_get_contents($this->configFile), true);

        if (isset($config[$key])) {
            unset($config[$key]);
            file_put_contents($this->configFile, json_encode($config, JSON_PRETTY_PRINT));
            echo "Configuration key '$key' removed.\n";
        } else {
            echo "Key '$key' not found.\n";
        }
    }

    public function getDescription()
    {
        return "Manages framework configuration settings.";
    }
}

?>