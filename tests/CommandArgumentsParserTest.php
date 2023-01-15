<?php

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
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
        $this->assertSame($arguments, $this->argumentsParser->parse($input));
    }

    public function argumentsProvider()
    {
        return [
            'one argument' => ['name {arg}', ['arg']],
            'many arguments' => ['name {arg} {arg2} {arg3} {arg4,arg5,arg6}',
                ['arg','arg2','arg3','arg4','arg5','arg6']
            ],
            'real example' => [
                'command_name {verbose,overwrite} [log_file=app.log] {unlimited} [methods={create,update,delete}] [paginate=50] {log}',
                ['verbose','overwrite','unlimited','log']
            ],
        ];
    }
}
