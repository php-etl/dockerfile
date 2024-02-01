<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;
use Kiboko\Component\Dockerfile\Variable;

final readonly class ComposerGlobalGithubAuthentication implements Dockerfile\LayerInterface, \Stringable
{
    public function __construct(
        private Variable $tokenArgument,
        private string $host = 'github.com',
    ) {
    }

    public function __toString(): string
    {
        return (string) new Dockerfile\Run(<<<"RUN"
            composer config --global github-oauth.{$this->host} {$this->tokenArgument}
            RUN,
        );
    }
}
