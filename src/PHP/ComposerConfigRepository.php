<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;
use Kiboko\Component\Dockerfile\Variable;

final readonly class ComposerConfigRepository implements Dockerfile\LayerInterface, \Stringable
{
    public function __construct(
        private string $name,
        private string $type,
        private string $url,
    ) {
    }

    public function __toString(): string
    {
        return (string) new Dockerfile\Run(<<<RUN
            composer config repositories.{$this->name} {$this->type} {$this->url}
            RUN
        );
    }
}
