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
        $commandDTO = new CommandDTO(tokens: $tokens);

        //TODO использовать Pipeline

        $commandDTO = $this->nameParser->parse($commandDTO);
        $commandDTO = $this->optionsParser->parse($commandDTO);
        return $this->argumentParser->parse($commandDTO);
    }

}
