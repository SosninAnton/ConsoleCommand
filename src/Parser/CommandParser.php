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

    public function parse(string $input):CommandDTO
    {
        $commandDTO = new CommandDTO();
        $commandDTO
            ->withName($this->nameParser->parse($input))
            ->withArguments($this->argumentParser->parse($input))
            ->withOptions($this->optionsParser->parse($input));

        return $commandDTO;
    }

}
