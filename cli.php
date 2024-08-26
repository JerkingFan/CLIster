<?php

require __DIR__ . '/src/CLI.php';
require __DIR__ . '/src/Command.php';
require __DIR__ . '/src/Console.php';

// Подключаем команды
require __DIR__ . '/src/Commands/HelloCommand.php';
require __DIR__ . '/src/Commands/ListCommand.php';
require __DIR__ . '/src/Commands/HelpCommand.php';
require __DIR__ . '/src/Commands/MakeCommand.php';
require __DIR__ . '/src/Commands/MigrateCommand.php';
require __DIR__ . '/src/Commands/GreetCommand.php';
require __DIR__ . '/src/Commands/ConfigCommand.php';
require __DIR__ . '/src/Commands/ServeCommand.php';

// Создаем экземпляр CLI
$cli = new CLI();

// Регистрируем команды
$cli->register('hello', new HelloCommand());
$cli->register('list', new ListCommand());
$cli->register('help', new HelpCommand($cli));
$cli->register('make:command', new MakeCommand());
$cli->register('migrate', new MigrateCommand());
$cli->register('greet', new GreetCommand());
$cli->register('config', new ConfigCommand());
$cli->register('serve', new ServeCommand());

// Запускаем CLI
$cli->run();
