<?php

require __DIR__ . '/src/CLI.php';
require __DIR__ . '/src/Command.php';
require __DIR__ . '/src/Console.php';

// Connecting the commands
require __DIR__ . '/src/Commands/HelloCommand.php';
require __DIR__ . '/src/Commands/ListCommand.php';
require __DIR__ . '/src/Commands/HelpCommand.php';
require __DIR__ . '/src/Commands/MakeCommand.php';
require __DIR__ . '/src/Commands/MigrateCommand.php';
require __DIR__ . '/src/Commands/GreetCommand.php';
require __DIR__ . '/src/Commands/ConfigCommand.php';
require __DIR__ . '/src/Commands/ServeCommand.php';
require __DIR__ . '/src/Commands/CacheClearCommand.php';
require __DIR__ . '/src/Commands/TestCommand.php';

// Creating a CLI instance
$cli = new CLI();

// Registering commands
$cli->register('hello', new HelloCommand());
$cli->register('list', new ListCommand());
$cli->register('help', new HelpCommand($cli));
$cli->register('make:command', new MakeCommand());
$cli->register('migrate', new MigrateCommand());
$cli->register('greet', new GreetCommand());
$cli->register('config', new ConfigCommand());
$cli->register('serve', new ServeCommand());
$cli->register('cachear', new CacheClearCommand());
$cli->register('test', new TestCommand());

// Laucnh CLI
$cli->run();

?>