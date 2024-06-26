<?php

declare(strict_types=1);

namespace Kiboko\Component\Dockerfile\PHP;

use Kiboko\Component\Dockerfile\Dockerfile;

final readonly class ComposerGithubOauthAuthentication implements Dockerfile\LayerInterface, \Stringable
{
    public function __construct(
        private string $token,
    ) {
    }

    public function __toString(): string
    {
        return (string) new Dockerfile\Run(sprintf(<<<'RUN'
            set -ex \
                && composer config --auth github-oauth.github.com %s
            RUN, $this->token));
    }
}
