<?php

require 'src/CLI.php';
require 'src/Command.php';
require 'src/Console.php';

// Подключаем команды
require 'src/Command/HelloCommand.php';
require 'src/Command/ListCommand.php';
require 'src/Command/HelpCommand';

// Создаем экземпляр CLI
$cli = new CLI();

// Регистрируем команды
$cli->register('help', new HelpCommand($cli));
$cli->register('hello', new HelloCommand());
$cli->register('list', new ListCommand());

// Запускаем CLI
$cli->run();

?>