<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final class ComposerConfig implements Dockerfile\LayerInterface, \Stringable
{
    public function __construct(
        private string $host,
        private string $token,
    )
    {
    }

    public function __toString(): string
    {
        return (string) new Dockerfile\Run(sprintf(
            <<<'RUN'
                composer config --global %s %s
                RUN,
            $this->host,
            $this->token,
        ));
    }
}
