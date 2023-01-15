<?php

namespace SosninAnton\ConsoleCommand\Contracts;

interface Command
{
    public function getName():string;

    public function getDescription():string;

    public function handle(array $arguments, array $options):string;
}
