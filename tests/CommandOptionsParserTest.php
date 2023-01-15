<?php

namespace SosninAnton\ConsoleCommand;

use SosninAnton\ConsoleCommand\Contracts\Command;
use sosninanton\consolecommand\Exceptions\CommandExecuteException;
use SosninAnton\ConsoleCommand\Exceptions\CommandRegisterException;
use SosninAnton\ConsoleCommand\Parser\ArgumentParser;
use SosninAnton\ConsoleCommand\Parser\NameParser;
use SosninAnton\ConsoleCommand\Parser\OptionsParser;

class CommandOptionsParserTest extends \PHPUnit\Framework\TestCase
{
    private OptionsParser $optionsParser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->optionsParser = new OptionsParser();
    }


    /**
     * @dataProvider optionsProvider
     */
    public function testGetArguments($input, $arguments)
    {
        $this->assertSame($arguments, $this->optionsParser->parse($input));
    }

    public function optionsProvider()
    {
        return [
            'one option' => ['name [name=value]', ['name' => 'value']],
            'two options' => ['name [name=value] [another_name=another_value]',
                ['name' => 'value','another_name' => 'another_value']
            ],
            'option with two values' => ['name [name={value,another_value}]',
                ['name' => ['value','another_value']]
            ],
            'real example' => [
                'command_name {verbose,overwrite} [log_file=app.log] {unlimited} [methods={create,update,delete}] [paginate=50] {log}',
                ['log_file' => 'app.log','methods' => ['create','update','delete'],'paginate' => '50']
            ],
        ];
    }
}
