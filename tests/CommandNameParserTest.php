<?php

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
use SosninAnton\ConsoleCommand\DTO\CommandDTO;
use sosninanton\consolecommand\Exceptions\CommandExecuteException;
use SosninAnton\ConsoleCommand\Exceptions\CommandRegisterException;
use SosninAnton\ConsoleCommand\Parser\NameParser;

class CommandNameParserTest extends \PHPUnit\Framework\TestCase
{
    private NameParser $commandNameParser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->commandNameParser = new NameParser();
    }


    /**
     * @dataProvider namesProvider
     */
    public function testGetName($input, $name)
    {
        $this->assertSame($this->commandNameParser->parse(new CommandDTO($input))->getName(), $name);
    }

    public function namesProvider()
    {
        return [
            'only name' => [['name'], 'name'],
            'usual name' => [['name','{arg}'], 'name']
        ];
    }
}
