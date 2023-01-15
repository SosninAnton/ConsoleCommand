<?php

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
use SosninAnton\ConsoleCommand\DTO\CommandDTO;
use sosninanton\consolecommand\Exceptions\CommandExecuteException;
use SosninAnton\ConsoleCommand\Exceptions\CommandRegisterException;
use SosninAnton\ConsoleCommand\Parser\ArgumentParser;
use SosninAnton\ConsoleCommand\Parser\NameParser;

class CommandArgumentsParserTest extends \PHPUnit\Framework\TestCase
{
    private ArgumentParser $argumentsParser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->argumentsParser = new ArgumentParser();
    }


    /**
     * @dataProvider argumentsProvider
     */
    public function testGetArguments($input, $arguments)
    {
        $this->assertSame($this->argumentsParser->parse(new CommandDTO($input))->getArguments(), $arguments);
    }

    public function argumentsProvider()
    {
        return [
            'one argument' => [['{arg}'], ['arg']],
            'many arguments' => [['{arg}','{arg2}','arg3'],
                ['arg','arg2','arg3']
            ]
        ];
    }
}
