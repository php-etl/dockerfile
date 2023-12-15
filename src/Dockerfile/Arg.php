<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\Dockerfile;

final readonly class Arg implements LayerInterface, \Stringable
{
    public function __construct(
        private string $name,
    ) {
    }

    public function __toString(): string
    {
        return sprintf('ARG %s', $this->name);
    }
}
