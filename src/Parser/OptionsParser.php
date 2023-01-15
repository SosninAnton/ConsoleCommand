<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand\Parser;

use SosninAnton\ConsoleCommand\DTO\CommandDTO;

class OptionsParser
{
    private const START_WITH = '[';

    private const END_WITH = ']';

    private const NAME_VALUE_SEPARATOR = '=';

    public function parse(CommandDTO $commandDTO):CommandDTO
    {
        $options = [];

        $tokens = [];


        foreach ($commandDTO->getTokens() as $token) {
            if (str_starts_with($token, self::START_WITH) &&
                str_ends_with($token, self::END_WITH)) {
                $token = substr($token, 1, -1);
                list($name, $value) = explode(self::NAME_VALUE_SEPARATOR, $token);
                if (!isset($options[$name])) {
                    $options[$name] = [];
                }
                $options[$name][] = $value;
            } else {
                $tokens[] = $token;
            }
        }

        return $commandDTO->withOptions($options)->withTokens($tokens);
    }
}
