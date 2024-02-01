<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final readonly class ComposerConfigGlobal implements Dockerfile\LayerInterface, \Stringable
{
    public function __construct(
        private string $host,
        private string $tokenArgument,
    ) {
    }

    public function __toString(): string
    {
        return (string) new Dockerfile\Run(<<<"RUN"
            composer config --global {$this->host} \${{$this->tokenArgument}}
            RUN,
        );
    }
}
