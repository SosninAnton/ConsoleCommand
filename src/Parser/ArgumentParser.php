<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand\Parser;

use SosninAnton\ConsoleCommand\Exceptions\CommandParseException;

class ArgumentParser
{
    private const START_WITH = '{';

    private const END_WITH = '}';

    private const SEPARATOR = ',';

    public function parse(string $input):array
    {
        $arguments = [];

        $input = trim($input);

        foreach (explode(' ', $input) as $token) {
            if (str_starts_with($token, self::START_WITH) &&
            str_ends_with($token, self::END_WITH)) {
                $token = substr($token, 1, -1);
                $arguments = array_merge($arguments, explode(self::SEPARATOR, $token));
            }
        }
        return array_unique($arguments);
    }
}
