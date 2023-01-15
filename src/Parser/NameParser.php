<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand\Parser;

use SosninAnton\ConsoleCommand\Exceptions\CommandParseException;

class NameParser
{

    public function parse(string $input):string
    {
        $input = ltrim($input);
        $pos = mb_strpos($input, ' ');

        if ($pos === false) {
            return $input;
        }

        return mb_substr($input, 0, $pos);
    }
}
