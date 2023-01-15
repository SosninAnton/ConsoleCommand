<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand\Parser;

use SosninAnton\ConsoleCommand\DTO\CommandDTO;

class NameParser
{

    public function parse(CommandDTO $commandDTO):CommandDTO
    {
        $tokens = $commandDTO->getTokens();

        $commandDTO->withName(array_shift($tokens))->withTokens($tokens);

        return $commandDTO;
    }
}
