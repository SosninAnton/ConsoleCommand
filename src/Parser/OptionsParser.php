<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand\Parser;

class OptionsParser
{
    private const START_WITH = '[';

    private const END_WITH = ']';

    private const MANY_VALUES_START_WITH = '{';

    private const MANY_VALUES_END_WITH = '}';

    private const MANY_VALUES_SEPARATOR = ',';

    private const NAME_VALUE_SEPARATOR = '=';

    public function parse(string $input):array
    {
        $options = [];

        $input = trim($input);

        foreach (explode(' ', $input) as $token) {
            if (str_starts_with($token, self::START_WITH) &&
            str_ends_with($token, self::END_WITH)) {
                $token = substr($token, 1, -1);
                list($name,$value) = explode(self::NAME_VALUE_SEPARATOR, $token);
                $options[$name] = $this->parseValue($value);
            }
        }
        return $options;
    }

    private function parseValue($value):string|array
    {
        if (!str_starts_with($value, self::MANY_VALUES_START_WITH) ||
            !str_ends_with($value, self::MANY_VALUES_END_WITH)) {
            return $value;
        }

        $value = substr($value, 1, -1);

        return explode(self::MANY_VALUES_SEPARATOR, $value);
    }
}
