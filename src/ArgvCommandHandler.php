<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
use SosninAnton\ConsoleCommand\Exceptions\CommandExecuteException;
use SosninAnton\ConsoleCommand\Exceptions\CommandRegisterException;
use SosninAnton\ConsoleCommand\Parser\CommandParser;

class ArgvCommandHandler
{
    private CommandHandler $commandHandler;
    private CommandParser $commandParser;

    public function __construct()
    {
        $this->commandHandler = new CommandHandler();
        $this->commandParser = new CommandParser();
    }

    public function registerCommand(Command $command): ArgvCommandHandler
    {
        $this->commandHandler->registerCommand($command);
        return $this;
    }

    public function handle(array $argv = null): string
    {
        $argv ??= $_SERVER['argv'] ?? [];

        array_shift($argv);

        if (count($argv) === 0) {
            $result = [];
            foreach ($this->commandHandler->getAvailableCommands() as $commandName => $commandDescription) {
                $result[] = '['.$commandName.'] - '.$commandDescription;
            }
            return implode(PHP_EOL, $result);
        }


        $commandDTO = $this->commandParser->parse($argv);

        return $this->commandHandler->handle(
            $commandDTO->getName(),
            $commandDTO->getArguments(),
            $commandDTO->getOptions(),
        );
    }
}
