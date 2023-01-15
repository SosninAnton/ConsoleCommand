<?php

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
use sosninanton\consolecommand\Exceptions\CommandExecuteException;
use SosninAnton\ConsoleCommand\Exceptions\CommandRegisterException;
use SosninAnton\ConsoleCommand\Parser\ArgumentParser;
use SosninAnton\ConsoleCommand\Parser\CommandParser;
use SosninAnton\ConsoleCommand\Parser\NameParser;
use SosninAnton\ConsoleCommand\Parser\OptionsParser;

class CommandParserTest extends \PHPUnit\Framework\TestCase
{


    public function testParseCommand()
    {
        $commandParser = new CommandParser();

        $dto = $commandParser->parse(['command_name','{verbose}','[paginate=50]']);

        $this->assertEquals('command_name', $dto->getName());
        $this->assertEquals(['verbose'], $dto->getArguments());
        $this->assertEquals(['paginate' => ['50']], $dto->getOptions());
    }

    public function testParseCommandWithoutOptions()
    {
        $commandParser = new CommandParser();

        $dto = $commandParser->parse(['command_name','{verbose}']);

        $this->assertEquals('command_name', $dto->getName());
        $this->assertEquals(['verbose'], $dto->getArguments());
        $this->assertEquals([], $dto->getOptions());
    }

    public function testParseCommandWithoutArguments()
    {
        $commandParser = new CommandParser();

        $dto = $commandParser->parse(['command_name']);

        $this->assertEquals('command_name', $dto->getName());
        $this->assertEquals([], $dto->getArguments());
        $this->assertEquals([], $dto->getOptions());
    }
}
