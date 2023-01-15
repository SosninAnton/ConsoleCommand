<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
use sosninanton\consolecommand\Exceptions\CommandExecuteException;
use SosninAnton\ConsoleCommand\Exceptions\CommandRegisterException;

class ArgvCommandHandlerTest extends \PHPUnit\Framework\TestCase
{
    public function testRegisterAndExecuteArgvCommand()
    {
        $command = $this->createMock(Command::class);
        $command->method('getName')
            ->willReturn('command_name');

        $command->method('handle')
            ->willReturn('result');

        $command->expects($this->once())
            ->method('handle')
            ->with(
                $this->equalTo(['verbose','overwrite']),
                $this->equalTo(['log_file' => ['app.log']])
            );

        $argv = [
            'app.php',
            'command_name',
            'verbose',
            'overwrite',
            '[log_file=app.log]'
        ];

        $argvCommandHandler = new ArgvCommandHandler();

        $this->assertEquals('result', $argvCommandHandler->registerCommand($command)->handle($argv));
    }

    public function testGetAllCommandsDescription()
    {
        $command = $this->createMock(Command::class);
        $command->method('getName')
            ->willReturn('command_name');

        $command->method('getDescription')
            ->willReturn('description');


        $secondCommand = $this->createMock(Command::class);
        $secondCommand->method('getName')
            ->willReturn('command_name2');

        $secondCommand->method('getDescription')
            ->willReturn('description2');



        $argv = [
            'app.php',
        ];

        $argvCommandHandler = new ArgvCommandHandler();

        $this->assertEquals(
            '[command_name] - description'.PHP_EOL.'[command_name2] - description2',
            $argvCommandHandler->registerCommand($command)->registerCommand($secondCommand)->handle($argv)
        );
    }
}
