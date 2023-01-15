<?php

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
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
        $this->assertSame($this->commandNameParser->parse($input), $name);
    }

    public function namesProvider()
    {
        return [
            'only name' => ['name', 'name'],
            'usual name' => ['name {arg}', 'name'],
            'name with start spaces' => [' name {arg}', 'name'],
            'real name' => [
                'command_name {verbose,overwrite} [log_file=app.log] {unlimited}
[methods={create,update,delete}] [paginate=50] {log}',
                'command_name'
            ],
        ];
    }


}
