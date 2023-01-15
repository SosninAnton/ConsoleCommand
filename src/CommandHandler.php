<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
use SosninAnton\ConsoleCommand\Exceptions\CommandExecuteException;
use SosninAnton\ConsoleCommand\Exceptions\CommandRegisterException;

class CommandHandler
{
    private array $commands = [];

    public const HELP_ARGUMENT = 'help';

    public function registerCommand(Command $command): CommandHandler
    {
        if (array_key_exists($command->getName(), $this->commands)) {
            throw new CommandRegisterException(
                'Command with name ' . $command->getName() . ' already registered'
            );
        }

        $this->commands[$command->getName()] = $command;

        return $this;
    }

    public function handle(string $name, array $arguments = [], array $options = []): string
    {
        if (!array_key_exists($name, $this->commands)) {
            throw new CommandExecuteException('Command with name ' . $name . ' not registered');
        }

        /**
         * @var Command $command
         */

        $command = $this->commands[$name];

        if (in_array(self::HELP_ARGUMENT, $arguments)) {
            return $command->getDescription();
        }

        return $command->handle($arguments, $options);
    }

    public function getAvailableCommands():array
    {
        $result = [];
        foreach ($this->commands as $command) {
            /**
             * @var Command $command
             */
            $result[$command->getName()] = $command->getDescription();
        }

        return $result;
    }
}
