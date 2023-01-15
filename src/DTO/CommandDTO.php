<?php

declare(strict_types=1);

namespace SosninAnton\ConsoleCommand\DTO;

class CommandDTO
{

    public function __construct(
        private array $tokens = [],
        private string $name = '',
        private array $arguments = [],
        private array $options = []
    ) {
    }


    public function withName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function withArguments(array $argument): self
    {
        $this->arguments = $argument;
        return $this;
    }

    public function withOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function withTokens(array $tokens): self
    {
        $this->tokens = $tokens;
        return $this;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getArguments():array
    {
        return $this->arguments;
    }

    public function getOptions():array
    {
        return $this->options;
    }

    public function getTokens():array
    {
        return $this->tokens;
    }




}
