# CLIster 
"Unlike the clitoris, we are easy to find"

**CLIster** is a simple PHP framework for creating and executing commands on the command line. It provides a convenient way to manage tasks and execute various commands from the console.

## Features

- Easy registration and execution of commands.
- Support for creating new teams on the fly.
- Intuitive interface for working with teams.
- The ability to expand and add new commands.

## Installation

1. **Clone the repository:**

   ```
   git clone https://github.com/yourusername/cli-framework.git
   ```
2. Go to the project directory:

```
cd cli-framework
```
3. Make sure PHP is installed and available on the command line.

## Usage

Commands are executed using a PHP script cli.php . Command format:

```
php cli.php <command> [arguments]
```
### Examples of commands

`hello`
: Displays a welcome message.
```
php cli.php hello
```

`list'
: Displays a list of all passed arguments.

```
php cli.php list arg1 arg2 arg3
```
`help`
: Displays a list of available commands and their description.
```
php cli.php help
```

`make:command <name>`
:Creates a new command file with the specified name in the src/Commands folder.

```
php cli.php make:command NewCommand
```

`migrate`
: Starts database migrations.

```
php cli.php migrate
```

`greet'
: Displays a greeting depending on the time of day.
```
php cli.php greet
```

`config [action] [parameters]`
Manages configuration parameters. Supports view, set, and remove actions.

- view — displays the current configuration parameters.
- set <key> <value> — sets the value for the specified key.
- remove <key> — removes the configuration parameter.

```
php cli.php config view
php cli.php config set key value
php cli.php config remove key
```
`serve [host] [port]`

:Starts the local development server.

```
php cli.php serve 127.0.0.1 8000
```
### Development
#### Adding a new command
1. Create a command file in the src/Commands directory.
2. Implement the command class by extending Command and implementing the execute and getDescription methods.
3. Register the command in the file cli.php using the register method.

### License

This project is licensed under (I don't know yet).

### Contributors
You can contribute to the development of this project by sending a pull request or opening an issue on GitHub.
