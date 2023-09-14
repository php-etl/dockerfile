<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\Dockerfile;

final readonly class From implements LayerInterface, \Stringable
{
    public function __construct(private string $source) {}

    public function __toString(): string
    {
        return sprintf('FROM %s', $this->source);
    }
}
