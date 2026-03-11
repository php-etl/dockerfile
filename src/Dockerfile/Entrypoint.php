<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\Dockerfile;

final class Entrypoint implements LayerInterface, \Stringable
{
    /** @var array<int, string> */
    private readonly array $entrypoint;

    public function __construct(string ...$entrypoint)
    {
        $this->entrypoint = array_values($entrypoint);
    }

    public function __toString(): string
    {
        return sprintf('ENTRYPOINT [%s]', implode(', ', $this->entrypoint));
    }
}
