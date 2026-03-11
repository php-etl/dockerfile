<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\Dockerfile;

final class Cmd implements LayerInterface, \Stringable
{
    /** @var array<int, string> */
    private readonly array $command;

    public function __construct(string ...$command)
    {
        $this->command = array_values($command);
    }

    public function __toString(): string
    {
        return sprintf('CMD [%s]', implode(', ', $this->command));
    }
}
