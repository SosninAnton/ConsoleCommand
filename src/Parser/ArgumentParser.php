<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand\Parser;

use SosninAnton\ConsoleCommand\DTO\CommandDTO;
use SosninAnton\ConsoleCommand\Exceptions\CommandParseException;

class ArgumentParser
{
    private const START_WITH = '{';

    private const END_WITH = '}';


    public function parse(CommandDTO $commandDTO):CommandDTO
    {
        $arguments = [];

        foreach ($commandDTO->getTokens() as $token) {
            if (str_starts_with($token, self::START_WITH) &&
            str_ends_with($token, self::END_WITH)) {
                $token = substr($token, 1, -1);
            }
            $arguments[] = $token;
        }

        return $commandDTO->withArguments($arguments)->withTokens([]);
    }
}
