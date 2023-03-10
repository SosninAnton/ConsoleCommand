<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand\Parser;

use SosninAnton\ConsoleCommand\DTO\CommandDTO;

class CommandParser
{
    private NameParser $nameParser;
    private ArgumentParser $argumentParser;
    private OptionsParser $optionsParser;

    public function __construct()
    {
        $this->nameParser = new NameParser();
        $this->argumentParser = new ArgumentParser();
        $this->optionsParser = new OptionsParser();
    }

    public function parse(array $tokens):CommandDTO
    {
        return  (new Pipeline())
            ->pipe($this->nameParser)
            ->pipe($this->optionsParser)
            ->pipe($this->argumentParser)
            ->via('parse')
            ->send(new CommandDTO(tokens: $tokens))
            ->thenReturn();
    }
}
