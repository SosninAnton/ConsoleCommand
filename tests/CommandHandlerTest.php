<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
use sosninanton\consolecommand\Exceptions\CommandExecuteException;
use SosninAnton\ConsoleCommand\Exceptions\CommandRegisterException;

class CommandHandlerTest extends \PHPUnit\Framework\TestCase
{
    public function testRegisterAndExecuteCommand()
    {
        $command = $this->createMock(Command::class);
        $command->method('getName')
            ->willReturn('test');

        $command->method('handle')
            ->willReturn('result');

        $consoleCommandHandler = new CommandHandler();
        $this->assertEquals('result', $consoleCommandHandler->registerCommand($command)->handle('test'));
    }

    public function testCannotRegisterCommandWithSameName()
    {
        $command = $this->createMock(Command::class);
        $command->method('getName')
            ->willReturn('test');

        $secondCommand = $this->createMock(Command::class);
        $secondCommand->method('getName')
            ->willReturn('test');


        $consoleCommandHandler = new CommandHandler();

        $this->expectException(CommandRegisterException::class);

        $consoleCommandHandler
            ->registerCommand($command)
            ->registerCommand($secondCommand);
    }

    public function testCannotExecuteNotRegisteredCommand()
    {
        $command = $this->createMock(Command::class);
        $command->method('getName')
            ->willReturn('test');


        $consoleCommandHandler = new CommandHandler();

        $this->expectException(CommandExecuteException::class);

        $consoleCommandHandler
            ->registerCommand($command)
            ->handle('notRegisteredCommandName');
    }

    public function testReturnDescriptionOfCommandWhenHasHelpArgument()
    {
        $command = $this->createMock(Command::class);
        $command->method('getName')
            ->willReturn('test');

        $command->method('getDescription')
            ->willReturn('description');


        $consoleCommandHandler = new CommandHandler();

        $this->assertEquals('description', $consoleCommandHandler
            ->registerCommand($command)
            ->handle('test', [CommandHandler::HELP_ARGUMENT]));
    }
}
